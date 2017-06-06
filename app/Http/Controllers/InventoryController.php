<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Brand_Model;
use App\Inventory;
use App\Location;
use App\Material_Type;
use App\MoneySource;
use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class InventoryController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = DB::table('inventories')
        ->leftJoin('brand', 'inventories.brand_id', '=', 'brand.id')
        ->leftJoin('material_type', 'inventories.material_type_id', '=', 'material_type.id')
        ->leftJoin('brand_model', 'inventories.model_id', '=', 'brand_model.id')
        ->leftJoin('moneySource', 'inventories.moneySourceId', '=', 'moneySource.id')
        ->leftJoin('location', 'inventories.location_id', '=', 'location.id')
        ->leftJoin('provider', 'inventories.provider_id', '=', 'provider.id')
        ->select('inventories.*', 'material_type.name as material_type_name', 'material_type.id as material_type_id', 'brand.name as brand_name', 'brand.id as brand_id', 'brand_model.name as brand_model_name', 'brand_model.id as model_id', 'location.name as location_name', 'location.id as location_id', 'moneySource.name as moneySource_name', 'moneySource.id as moneySourceId',
        'provider.name as provider_name', 'provider.id as provider_id')
        ->paginate(5);

        return view('inventory/index', ['inventories' => $inventories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $material_types = Material_Type::all();
        $brands = Brand::all();
        $brand_models = Brand_Model::all();
        $moneySources = MoneySource::all();
        $locations = Location::all();
        $providers = Provider::all();

        return view('inventory/create', ['material_types' => $material_types, 'brands' => $brands, 'brand_models' => $brand_models,
      'moneySources'                                      => $moneySources, 'locations' => $locations, 'providers' => $providers, ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
        // Upload image
        $path = $request->file('picture')->store('avatars');
        $keys = ['name', 'description', 'material_type_id', 'brand_id', 'model_id', 'location_id', 'quantity', 'price',
        'moneysourceId', 'provider_id', 'date_entrance', 'last_update', ];
        $input = $this->createQueryInput($keys, $request);
        $input['picture'] = $path;

        Inventory::create($input);

        return redirect()->intended('/inventory-mnt');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($inventory == null || count($inventory) == 0) {
            return redirect()->intended('/inventory-mnt');
        }

        $material_types = Material_type::all();
        $brands = Brand::all();
        $brand_models = Brand_model::all();
        $moneySources = MoneySource::all();
        $locations = Location::all();
        $providers = Provider::all();

        return view('inventory/edit', ['inventory' => $inventory, 'material_types' => $material_types, 'brands' => $brands,  'brand_models' => $brand_models, 'moneySources' => $moneySources,
        'locations'                                => $locations, 'providers' => $providers, ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);
        $this->validateInput($request);
        // Upload image
        $keys = ['name', 'description', 'material_type_id', 'brand_id', 'model_id', 'location_id', 'quantity',
        'price', 'moneysourceId', 'provider_id', 'date_entrance', 'last_update', ];
        $input = $this->createQueryInput($keys, $request);
        if ($request->file('picture')) {
            $path = $request->file('picture')->store('public');
            $input['picture'] = $path;
        }
        Inventory::where('id', $id)
            ->update($input);

        return redirect()->intended('/inventory-mnt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventory::where('id', $id)->delete();

        return redirect()->intended('/inventory-mnt');
    }

    /**
     * Search state from database base on some specific constraints.
     *
     * @param \Illuminate\Http\Request $request
     *
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $constraints = [
            'name' => $request['name'],
            ];
        $inventories = $this->doSearchingQuery($constraints);

        return view('inventory/index', ['inventories' => $inventories, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = inventory::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%'.$constraint.'%');
            }
            $index++;
        }

        return $query->paginate(5);
    }

     /**
      * Load image resource.
      *
      * @param  string  $name
      *
      * @return \Illuminate\Http\Response
      */
     public function load($name)
     {
         $path = storage_path().'/app/public/'.$name;
         if (file_exists($path)) {
             return Response::download($path);
         }
     }

    private function validateInput($request)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
        ]);
    }

    private function createQueryInput($keys, $request)
    {
        $queryInput = [];
        for ($i = 0; $i < count($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}
