<?php

namespace App\Http\Controllers;

use App\Event;
use Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.' +1 day')
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        return view('events', compact('calendar_details'));
    }

    public function addEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'start_date' => 'required',
            'end_date'   => 'required',
        ]);

        if ($validator->fails()) {
            \Session::flash('warnning', 'Si us plau afegeix les dades de forma correcta');

            return Redirect::to('/events')->withInput()->withErrors($validator);
        }

        $event = new Event();
        $event->event_name = $request['event_name'];
        $event->start_date = $request['start_date'];
        $event->end_date = $request['end_date'];
        $event->save();

        \Session::flash('success', 'Event afegit de forma correcta.');

        return Redirect::to('/events');
    }
}
