<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Response;

class BlogController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function vueCrud()
     {
         return view('/vuejscrud/index');
     }

    public function index()
    {
        $items = Blog::latest()->paginate(5);
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

    public function store(Request $request)
    {
        $this->validate($request, [
          'title'       => 'required',
          'description' => 'required',

        ]);

        $create = Blog::create($request->all());

        return response()->json($create);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'title'       => 'required',
        'description' => 'required',

      ]);

        $edit = Blog::find($id)->update($request->all());

        return response()->json($edit);
    }

    public function destroy($id)
    {
        Blog::find($id)->delete();

        return response()->json(['done']);
    }
}
