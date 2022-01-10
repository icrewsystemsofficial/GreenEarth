<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user()->id;
        $events = Event::where('created_by', $user)->get();                      
        return view('pages.events.index', compact('events'));
    }

    public function create()
    {
        return view('pages.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $event = new Event();
        $event->date = $request->date;
        $event->time = $request->time;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->created_by = $request->created_by;
        $event->save();

        smilify('success', 'Event added successfully!');
        return redirect(route('portal.events.index'));
    }

    public function edit($id)
    {
        $event = Event::where('id', $id)->first();
        $user = User::where('id', $event->created_by)->first();
        $created_by = $user->name;
        return view('pages.events.manage', compact('event', 'created_by'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $date = $request->date;
        $time = $request->time;
        $title = $request->title;
        $description = $request->description;

        Event::where('id', $id)->update(['date' => $date, 'time' => $time, 'title' => $title, 'description' => $description]);

        smilify('success', 'Event updated successfully!');
        return redirect(route('portal.events.index'));
    }

    public function destroy($id)
    {
        Event::where('id', $id)->delete();

        smilify('success', 'Event deleted successfully!');
        return redirect(route('portal.events.index'));
    }
}
