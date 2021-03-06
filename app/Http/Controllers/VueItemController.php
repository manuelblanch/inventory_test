<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageVue()
    {
        return view('manage-vue');
    }

    public function index(Request $request)
    {
        $items = Item::latest()->paginate(5);

        $response = [
           'pagination' => [
               'total'        => $items->total(),
               'per_page'     => $items->perPage(),
               'current_page' => $items->currentPage(),
               'last_page'    => $items->lastPage(),
               'from'         => $items->firstItem(),
               'to'           => $items->lastItem(),
           ],
           'data' => $items,
       ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request, [
             'title'       => 'required',
             'description' => 'required',
         ]);

        $create = Item::create($request->all());

        return response()->json($create);
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
        //

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            // Ignores notices and reports all other kinds... and warnings
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
            // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
        }
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
        $this->validate($request, [
             'title'         => 'required',
             'description'   => 'required',
             'name'          => 'required',
             'shortName'     => 'required',
             'date_entrance' => 'required',
             'last_update'   => 'required',
         ]);

        $edit = Item::find($id)->update($request->all());

        return response()->json($edit);
    }

    public function destroy($id)
    {
        Item::find($id)->delete();

        return response()->json(['done']);
    }
}
