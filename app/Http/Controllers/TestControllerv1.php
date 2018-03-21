<?php
namespace App\Http\Controllers\Api\V1;

use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index()
    {
        return Test::all();
    }

    public function show($id)
    {
        return Test::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $company = Test::findOrFail($id);
        $company->update($request->all());

        return $company;
    }

    public function store(Request $request)
    {
        $company = Test::create($request->all());
        return $company;
    }

    public function destroy($id)
    {
        $company = Test::findOrFail($id);
        $company->delete();
        return '';
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
}
