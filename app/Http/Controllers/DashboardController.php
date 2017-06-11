<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['labels1'] =  "['January', 'February', 'March', 'April', 'May', 'June', 'July']";
      $data['values1'] =  "[10,42,4,23,43,76]";
      $data['labels2'] =  "['January', 'February', 'March', 'April', 'May', 'June', 'July']";
      $data['values2'] =  "[10,42,4,23,43,76]";
        return view('dashboard', $data);
    }

    public function tasks()
    {
        return Task::all();
    }

    public function tasksNumber()
    {
        // CACHE MISS --> No ho trobo a la cache
        // CACHE HIT --> S'ha trobat valor a la cache
        $value = Cache::remember('tasksNumber',5, function () {
            // Codi a executar si CACHE MISS
            return Task::all()->count();
        });

        return $value;

    }

    public function inventoryNumber()
    {
        return Inventory::all()->count();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
