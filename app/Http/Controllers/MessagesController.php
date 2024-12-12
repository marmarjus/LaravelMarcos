<?php
/**
 * Controlador de tabla Messages
 *
 * Este archivo maneja los métodos CRUD de la tabla Messages
 * de la BD.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Messages::latest()->get();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        $message = new Messages();
        $message->name = $request->get('name');
        $message->subject = $request->get('subject');
        $message->text = $request->get('text');
        $message->save();

        return view('messages.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Messages $message)
    {
        if (!$message->read) {
            $message->read = true;
            $message->save();
        }

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MessageRequest $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Messages $message)
    {
        $message->delete();
        return redirect()->route('messages.index');
    }

}
