<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            // Ignores notices and reports all other kinds... and warnings
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
            // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
        }

        //$news = News::all();

        // using paginate function to show 3 news items per page
        $itemsPerPage = 3;
        $news = News::orderBy('created_at', 'desc')->paginate($itemsPerPage);

        return view('news.index', ['news' => $news, 'title' => 'News Display']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create', ['title' => 'Add News']);
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
                                'title'             => 'required',
                                'slug'              => 'required',
                                'short_description' => 'required',
                                'full_content'      => 'required',
                            ]
                        );

        $input = $request->all();
        //dd($input); // dd() helper function is print_r alternative

        News::create($input);

        Session::flash('flash_message', 'News added successfully!');

        //return redirect()->back();
        //return redirect('news');
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();

        return view('news.show', ['news' => $news]);
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
        $news = News::findOrFail($id);

        return view('news.edit', ['news' => $news, 'title' => 'Edit News']);
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
        $news = News::findOrFail($id);

        $this->validate($request, [
                                'title'             => 'required',
                                'slug'              => 'required',
                                'short_description' => 'required',
                                'full_content'      => 'required',
                            ]
                        );

        $input = $request->all();

        $news->fill($input)->save();

        Session::flash('flash_message', 'News updated successfully!');

        return redirect()->back();
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
        $news = News::findOrFail($id);

        $news->delete();

        Session::flash('flash_message', 'News deleted successfully!');

        return redirect()->route('news.index');
    }
}
