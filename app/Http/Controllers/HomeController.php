<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;
use MaddHatter\LaravelFullcalendar\Facades;

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
          "Event one",
          true,
          '2017-06-02T0900',
          '2017-06-06T0800',
          0

      );

      $calendar = \Calendar::addEvents($events)
                    ->setOptions([
                      'firstDay' => 1
                    ])->setCallbacks([

                    ]);
        return view('adminlte::home', array('calendar' => $calendar));
    }
}
