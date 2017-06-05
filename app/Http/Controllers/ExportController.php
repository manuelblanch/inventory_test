<?php

namespace App\Http\Controllers;

use App\Inventory;
use Auth;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ExportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Europe/Madrid');
        $format = 'Y/m/d';
        $now = date($format);
        $to = date($format, strtotime('+15 days'));
        $constraints = [
          'from' => $now,
          'to'   => $to,
        ];

        $inventories = DB::table('inventories')
        ->leftJoin('brand', 'inventories.brand_id', '=', 'brand.id')
        ->leftJoin('material_type', 'inventories.material_type_id', '=', 'material_type.id')
        ->leftJoin('brand_model', 'inventories.model_id', '=', 'brand_model.id')
        ->leftJoin('moneySource', 'inventories.moneySourceId', '=', 'moneySource.id')
        ->leftJoin('location', 'inventories.location_id', '=', 'location.id')
        ->leftJoin('provider', 'inventories.provider_id', '=', 'provider.id')
        ->select('inventories.*', 'material_type.name as material_type_name', 'material_type.id as material_type_id', 'brand.name as brand_name', 'brand.id as brand_id', 'brand_model.name as brand_model_name', 'brand_model.id as model_id', 'location.name as location_name', 'location.id as location_id', 'moneySource.name as moneySource_name', 'moneySource.id as moneySourceId',
        'provider.name as provider_name', 'provider.id as provider_id')
        ->paginate();

        return view('/export/index', ['inventories' =>$inventories, 'searchingVals' => $constraints]);

        //$inventories = $this->getItemsInventory($constraints);
        //return view('/export/index', ['inventories' =>$inventories, 'searchingVals' => $constraints]);
    }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      *
      * @return \Illuminate\Http\Response
      */
     public function exportExcel(Request $request)
     {
         $this->prepareExportingData($request)->export('csv');
         redirect()->intended('mnt-export');
     }

    public function exportPDF(Request $request)
    {
        $constraints = [
           'from' => $request['from'],
           'to'   => $request['to'],
       ];
        $inventories = $this->getExportingData($constraints);
        $pdf = PDF::loadView('export/exportpdf', ['inventories' => $inventories, 'searchingVals' => $constraints])->setPaper('a4', 'landscape');

        return $pdf->download('Exportat_desde_'.$request['from'].'_a_'.$request['to'].'.pdf');
    }

    private function prepareExportingData($request)
    {
        $inventories = $this->getExportingData(['from'=> $request['from'], 'to' => $request['to']]);

        return Excel::create('Exportat_desde_'.$request['from'].'_a_'.$request['to'], function ($excel) use ($inventories, $request) {
            // Set the title
       $excel->setTitle('Inventari from '.$request['from'].' to '.$request['to']);

       // Call them separately
       $excel->setDescription('Llista');
            $excel->sheet('Items', function ($sheet) use ($inventories) {
                $sheet->fromArray($inventories);
            });
        });
    }

    public function search(Request $request)
    {
        $constraints = [
           'from' => $request['from'],
           'to'   => $request['to'],
       ];
        $inventories = $this->getItemsInventory($constraints);

        return view('export/index', ['inventories' => $inventories, 'searchingVals' => $constraints]);
    }

    private function getItemsInventory($constraints)
    {
        $inventories = Inventory::where('date_entrance', '>=', $constraints['from'])
                       ->where('date_entrance', '<=', $constraints['to'])
                       ->get();

        return $inventories;
    }

    private function getExportingData($constraints)
    {
        return DB::table('inventories')
       ->leftJoin('brand', 'inventories.brand_id', '=', 'brand.id')
       ->leftJoin('material_type', 'inventories.material_type_id', '=', 'material_type.id')
       ->leftJoin('brand_model', 'inventories.model_id', '=', 'brand_model.id')
       ->leftJoin('moneySource', 'inventories.moneySourceId', '=', 'moneySource.id')
       ->leftJoin('location', 'inventories.location_id', '=', 'location.id')
       ->leftJoin('provider', 'inventories.provider_id', '=', 'provider.id')
       ->select('inventories.name as name', 'inventories.description as description', 'material_type.name as material_type_name', 'brand.name as brand_name', 'brand_model.name as brand_model_name',
       'location.name as location_name', 'moneySource.name as moneySource_name', 'provider.name as provider_name', 'inventories.quantity as quantity', 'inventories.price as price', 'inventories.date_entrance as date_entrance', 'inventories.last_update as last_update')

       ->get()
       ->map(function ($item, $key) {
           return (array) $item;
       })
       ->all();
    }
}
