<?php

namespace App\Http\Controllers;

use App\Brand_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Brand_ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            // Ignores notices and reports all other kinds... and warnings
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
            // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
        }
    }

    public function index()
    {
        $start = microtime(true);

        $result = Cache::remember('brand_models', 10, function () {
            return Brand_Model::all();
        });
        $brand_models = Brand_model::paginate(5);

        $duration = (microtime(true) - $start) * 1000;

        \Log::info('With cache: '.$duration.' ms.');

        return view('manteniments/brand_model/index', ['brand_models' => $brand_models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manteniments/brand_model/create');
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
        Brand_model::create([
         'name'        => $request['name'],
         'description' => $request['description'],
           ]);

        return redirect()->intended('mnt/brand_model');
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
        $brand_model = Brand_model::find($id);
        if ($brand_model == null || count($brand_model) == 0) {
            return redirect()->intended('/mnt/brand_model');
        }

        return view('manteniments/brand_model/edit', ['brand_model' => $brand_model]);
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
        $brand_model = Brand_model::findOrFail($id);
        $input = [
        'name'        => $request['name'],
        'description' => $request['description'],
      ];
        $this->validate($request, [
      'name' => 'required|max:60',
      ]);
        Brand_model::where('id', $id)
          ->update($input);

        return redirect()->intended('mnt/brand_model');
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
        Brand_model::where('id', $id)->delete();

        return redirect()->intended('mnt/brand_model');
    }

    public function search(Request $request)
    {
        $constraints = [
            'name' => $request['name'],
            ];
        $brand_models = $this->doSearchingQuery($constraints);

        return view('manteniments/brand_model/index', ['brand_models' => $brand_models, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = brand_model::query();
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

    private function validateInput($request)
    {
        $this->validate($request, [
        'name' => 'required|max:60|unique:provider',
    ]);
    }
}
