<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $events = [];

        $events[] = \Calendar::event(
          'Event one',
          true,
          '2017-06-02T0900',
          '2017-06-06T0800',
          0

      );

        $calendar = \Calendar::addEvents($events)
                    ->setOptions([
                      'firstDay' => 1,
                    ])->setCallbacks([

                    ]);

        return view('adminlte::home', ['calendar' => $calendar]);
    }
}
