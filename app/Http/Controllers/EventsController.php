<?php
/**
 * Controlador de tabla Events
 *
 * Este archivo maneja los métodos CRUD de la tabla Events
 * de la BD, además de los métodos para poder darle me gusta
 * a un evento y quitarlo.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('date', '>', Carbon::now())->orderBy('date', 'asc')->get();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $event = new Event();
        $event->name = $request->get('name');
        $event->description = $request->get('desc');
        $event->location = $request->get('location');
        $event->date = $request->get('date');
        $event->hour = $request->get('hour');
        $event->type = $request->get('type');
        $event->tags = $request->get('tags');
        $event->visible = $request->has('visible') ? 1 : 0;

        $event->save();

        return view('events.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->name = $request->get('name');
        $event->description = $request->get('desc');
        $event->location = $request->get('location');
        $event->date = $request->get('date');
        $event->hour = $request->get('hour');
        $event->type = $request->get('type');
        $event->tags = $request->get('tags');
        $event->visible = $request->input('visible', 0);
        $event->save();

        return view('events.show', compact('event'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }

    public function toggleLike(Event $event)
    {
        $event->users()->attach(Auth::user()->id);

        return redirect()->route('events.index');
    }

    public function toggleDislike(Event $event)
    {
        $event->users()->detach(Auth::user()->id);

        return redirect()->route('events.index');
    }
}
