<?php

namespace App\Http\Controllers;

use App\MoneySource;
use Illuminate\Http\Request;

class MoneySourceController extends Controller
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
        $moneySources = MoneySource::paginate(5);

        return view('manteniments/moneySource/index', ['moneySources' => $moneySources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manteniments/moneySource/create');
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
        MoneySource::create([
         'name'          => $request['name'],
         'shortName'     => $request['shortName'],
         'description'   => $request['description'],
         'date_entrance' => $request['date_entrance'],
         'last_update'   => $request['last_update'],
           ]);

        return redirect()->intended('mnt/moneySource');
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
        $moneySource = MoneySource::find($id);
      // Redirect to country list if updating country wasn't existed
      if ($moneySource == null || count($moneySource) == 0) {
          return redirect()->intended('/mnt/moneySource');
      }

        return view('manteniments/moneySource/edit', ['moneySource' => $moneySource]);
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
        $moneySource = MoneySource::findOrFail($id);
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
        MoneySource::where('id', $id)
          ->update($input);

        return redirect()->intended('mnt/moneySource');
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
        MoneySource::where('id', $id)->delete();

        return redirect()->intended('mnt/moneySource');
    }

    public function search(Request $request)
    {
        $constraints = [
            'name'      => $request['name'],
            'shortName' => $request['shortName'],
            ];
        $moneySources = $this->doSearchingQuery($constraints);

        return view('manteniments/moneySource/index', ['moneySources' => $moneySources, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints)
    {
        $query = MoneySource::query();
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
        'shortName' => 'required|max:6|unique:provider',
    ]);
    }
}
