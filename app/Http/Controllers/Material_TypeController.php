<?php

namespace App\Http\Controllers;

use App\Material_Type;
use Illuminate\Http\Request;

class Material_TypeController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $material_types = Material_type::paginate(5);

        return view('manteniments/material_type/index', ['material_types' => $material_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manteniments/material_type/create');
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
        Material_type::create([
         'name'        => $request['name'],
         'description' => $request['description'],
           ]);

        return redirect()->intended('mnt/material_type');
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
        $material_type = Material_type::find($id);
      // Redirect to country list if updating country wasn't existed
      if ($material_type == null || count($material_type) == 0) {
          return redirect()->intended('/mnt/material_type');
      }

        return view('manteniments/material_type/edit', ['material_type' => $material_type]);
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
        $material_type = Material_type::findOrFail($id);
        $input = [
        'name'        => $request['name'],
        'description' => $request['description'],
      ];
        $this->validate($request, [
      'name' => 'required|max:60',
      ]);
        Material_type::where('id', $id)
          ->update($input);

        return redirect()->intended('mnt/material_type');
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
        Material_type::where('id', $id)->delete();

        return redirect()->intended('mnt/material_type');
    }

    public function search(Request $request)
    {
        $constraints = [
            'name' => $request['name'],
            ];
        $material_types = $this->doSearchingQuery($constraints);

        return view('manteniments/material_type/index', ['material_types' => $material_types, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = material_type::query();
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
