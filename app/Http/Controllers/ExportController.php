<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use Excel;
use Illuminate\Support\Facades\DB;
use Auth;
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
        $to = date($format, strtotime("+30 days"));
        $constraints = [
          'from' => $now,
          'to' => $to
        ];

        $inventories = $this->getItemsInventory($constraints);
        return view('/export/index', ['inventories' =>$inventories, 'searchingVals' => $constraints]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function exportExcel(Request $request) {
       $this->prepareExportingData($request)->export('xlsx');
       redirect()->intended('mnt/export');
   }
   public function exportPDF(Request $request) {
        $constraints = [
           'from' => $request['from'],
           'to' => $request['to']
       ];
       $inventories = $this->getExportingData($constraints);
       $pdf = PDF::loadView('export/exportpdf', ['inventories' => $inventories, 'searchingVals' => $constraints]);
       return $pdf->download('export_from_'. $request['from'].'_to_'.$request['to'].'pdf');
   }

   private function prepareExportingData($request) {
       $inventories = $this->getExportingData(['from'=> $request['from'], 'to' => $request['to']]);
       return Excel::create('report_from_'. $request['from'].'_to_'.$request['to'], function($excel) use($inventories, $request) {
       // Set the title
       $excel->setTitle('Llista de items from '. $request['from'].' to '. $request['to']);

       // Call them separately
       $excel->setDescription('The list ');
       $excel->sheet('Items', function($sheet) use($inventories) {
       $sheet->fromArray($inventories);
           });
       });
   }
   public function search(Request $request) {
       $constraints = [
           'from' => $request['from'],
           'to' => $request['to']
       ];
       $inventories = $this->getItemsInventory($constraints);
       return view('export/index', ['inventories' => $inventories, 'searchingVals' => $constraints]);
   }
   private function getItemsInventory($constraints) {
       $inventories = Inventory::where('date_entrance', '>=', $constraints['from'])
                       ->where('date_entrance', '<=', $constraints['to'])
                       ->get();
       return $inventories;
   }
   private function getExportingData($constraints) {
       return DB::table('inventories')
       ->select('inventories.name', 'inventories.description')
       ->where('date_entrance', '>=', $constraints['from'])
       ->where('date_entrance', '<=', $constraints['to'])
       ->get()
       ->map(function ($item, $key) {
       return (array) $item;
       })
       ->all();
   }
}
