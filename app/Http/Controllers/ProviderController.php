<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProviderController extends Controller
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

        $result = Cache::remember('providers', 10, function () {
            return Provider::all();
        });
        $providers = Provider::paginate(5);

        $duration = (microtime(true) - $start) * 1000;

        \Log::info('With cache: '.$duration.' ms.');

        return view('manteniments/providers/index', ['providers' => $providers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manteniments/providers/create');
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
        Provider::create([
         'name'          => $request['name'],
         'shortName'     => $request['shortName'],
         'description'   => $request['description'],
         'date_entrance' => $request['date_entrance'],
         'last_update'   => $request['last_update'],
           ]);

        return redirect()->intended('mnt/provider');
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
        $provider = Provider::find($id);

        if ($provider == null || count($provider) == 0) {
            return redirect()->intended('/mnt/provider');
        }

        return view('manteniments/providers/edit', ['provider' => $provider]);
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
        $provider = Provider::findOrFail($id);
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
        Provider::where('id', $id)
          ->update($input);

        return redirect()->intended('mnt/provider');
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
        Provider::where('id', $id)->delete();

        return redirect()->intended('mnt/provider');
    }

    public function search(Request $request)
    {
        $constraints = [
            'name'      => $request['name'],
            'shortName' => $request['shortName'],
            ];
        $providers = $this->doSearchingQuery($constraints);

        return view('manteniments/providers/index', ['providers' => $providers, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = provider::query();
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
