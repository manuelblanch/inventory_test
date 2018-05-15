<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Test extends Controller
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

        $result = Cache::remember('tests', 10, function () {
            return Location::all();
        });
        $locations = Location::paginate(5);

        $duration = (microtime(true) - $start) * 1000;

        \Log::info('With cache: '.$duration.' ms.');

        return view('manteniments/test/index', ['tests' => $tests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manteniments/test/create');
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
        self::create([
         'name'          => $request['name'],
         'shortName'     => $request['shortName'],
         'description'   => $request['description'],
         'date_entrance' => $request['date_entrance'],
         'last_update'   => $request['last_update'],
           ]);

        return redirect()->intended('mnt/test');
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
        $test = self::find($id);
        if ($test == null || count($test) == 0) {
            return redirect()->intended('/mnt/test');
        }

        return view('manteniments/test/edit', ['test' => $test]);
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
        $test = self::findOrFail($id);
        $input = [
        'name'          => $request['name'],
        'shortName'     => $request['shortName'],
        'description'   => $request['description'],
        'date_entrance' => $request['date_entrance'],
        'last_update'   => $request['last_update'],
      ];
        $this->validate($request, [
      'name' => 'required|max:60',
      ]);
        self::where('id', $id)
          ->update($input);

        return redirect()->intended('mnt/test');
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
        self::where('id', $id)->delete();

        return redirect()->intended('mnt/test');
    }

    /*public function destroy($id)
    {
        Item::find($id)->delete();
        return response()->json(['done']);
    }*/

    public function search(Request $request)
    {
        $constraints = [
            'name'      => $request['name'],
            'shortName' => $request['shortName'],
            ];
        $locations = $this->doSearchingQuery($constraints);

        return view('manteniments/test/index', ['tests' => $tests, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = self::query();
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
        'name'      => 'required|max:60|unique:provider',
        'shortName' => 'required|max:4|unique:provider',
    ]);
    }
}
