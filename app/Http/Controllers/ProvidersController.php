<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderCreateRequest;
use App\Http\Requests\ProviderUpdateRequest;
use App\Repositories\ProviderRepository;
use App\Validators\ProviderValidator;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    /**
     * @var ProviderRepository
     */
    protected $repository;

    /**
     * @var ProviderValidator
     */
    protected $validator;

    public function __construct(ProviderRepository $repository, ProviderValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $providers = $this->repository->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $providers,
            ]);
        }

        $providers = Country::paginate(5);

        return view('manteniments/providers/index', ['providers' => $providers]);

        //return view('providers.index', compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProviderCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderCreateRequest $request)
    {
        return view('manteniments/providers/create');
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
        $this->validateInput($request);
        Country::create([
        'name'          => $request['name'],
        'shortName'     => $request['shortName'],
        'description'   => $request['description'],
        'date_entrance' => $request['date_entrance'],
        'last_update'   => $request['last_update'],
          ]);

        return redirect()->intended('manteniments/providers');
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
        $providers = Providers::find($id);
      // Redirect to country list if updating country wasn't existed
      if ($providers == null || count($providers) == 0) {
          return redirect()->intended('/manteniments/providers');
      }

        return view('manteniments/providers/edit', ['providers' => $providers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProviderUpdateRequest $request
     * @param string                $id
     *
     * @return Response
     */
    public function update(ProviderUpdateRequest $request, $id)
    {
        $providers = Providers::findOrFail($id);
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
        Providers::where('id', $id)
          ->update($input);

        return redirect()->intended('manteniments/providers');
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
        Providers::where('id', $id)->delete();

        return redirect()->intended('manteniments/providers');
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
        $query = providers::query();
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
        'name'      => 'required|max:60|unique:providers',
        'shortName' => 'required|max:6|unique:providers',
    ]);
    }
}
