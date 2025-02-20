<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\JuegoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Consola;

class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $juegos = Juego::paginate();

        return view('juego.index', compact('juegos'))
            ->with('i', ($request->input('page', 1) - 1) * $juegos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $juego = new Juego();
        $consolas = Consola::pluck('nombre', 'id');
        return view('juego.create', compact('juego', 'consolas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JuegoRequest $request): RedirectResponse
    {
        Juego::create($request->validated());

        return Redirect::route('juegos.index')
            ->with('success', 'Juego created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $juego = Juego::find($id);

        return view('juego.show', compact('juego'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $juego = Juego::find($id);
        $consolas = Consola::pluck('nombre', 'id');

        return view('juego.edit', compact('juego', 'consolas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JuegoRequest $request, Juego $juego): RedirectResponse
    {
        $juego->update($request->validated());

        return Redirect::route('juegos.index')
            ->with('success', 'Juego updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Juego::find($id)->delete();

        return Redirect::route('juegos.index')
            ->with('success', 'Juego deleted successfully');
    }
}
