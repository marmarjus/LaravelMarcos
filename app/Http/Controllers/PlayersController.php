<?php
/**
 * Controlador de tabla Players
 *
 * Este archivo maneja los métodos CRUD de la tabla Players
 * de la BD.
 *
 * @author Marcos Martínez Justicia
 *
 * @version 1.0
 */

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Players;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Players::all();
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerRequest $request)
    {
        $player = new Players();
        $player->name = $request->get('name');
        $player->twitter = $request->get('twitter');
        $player->instagram = $request->get('instagram');
        $player->twitch = $request->get('twitch');
        $player->visible = $request->has('visible') ? 1 : 0;
        $player->title = $request->get('title');
        $player->description = $request->get('desc');
        $request->file('image')->storeAs('public/img/', $player->name . '.png');
        $player->save();

        return view('players.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Players $player)
    {
        return view('players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Players $players)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Players $player)
    {
        $player->visible = $request->has('visible') ? 1 : 0;
        $player->save();

        return view('players.show', compact('player'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Players $players)
    {
        //
    }

}
