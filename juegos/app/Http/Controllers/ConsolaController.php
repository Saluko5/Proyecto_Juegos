<?php

namespace App\Http\Controllers;

use App\Models\Consola;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ConsolaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ConsolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $consolas = Consola::paginate();

        return view('consola.index', compact('consolas'))
            ->with('i', ($request->input('page', 1) - 1) * $consolas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $consola = new Consola();

        return view('consola.create', compact('consola'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsolaRequest $request): RedirectResponse
    {
        Consola::create($request->validated());

        return Redirect::route('consolas.index')
            ->with('success', 'Consola created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $consola = Consola::find($id);

        return view('consola.show', compact('consola'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $consola = Consola::find($id);

        return view('consola.edit', compact('consola'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsolaRequest $request, Consola $consola): RedirectResponse
    {
        $consola->update($request->validated());

        return Redirect::route('consolas.index')
            ->with('success', 'Consola updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Consola::find($id)->delete();

        return Redirect::route('consolas.index')
            ->with('success', 'Consola deleted successfully');
    }
}
