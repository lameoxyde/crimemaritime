<?php

namespace App\Http\Controllers;

use App\Models\Thematique;
use Illuminate\Http\Request;
use App\Imports\ThematiqueImport;
use Excel;


class ThematiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thematiques = Thematique::get();
        return view('thematique.list', [
            'thematiques' => $thematiques 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thematique.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required'
        ]);
        Thematique::create($request->all());

        return redirect()->route('thematique.index')->with('status-add', 'La création du thématique est réussie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thematique  $thematique
     * @return \Illuminate\Http\Response
     */
    public function show(Thematique $thematique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thematique  $thematique
     * @return \Illuminate\Http\Response
     */
    public function edit(Thematique $thematique)
    {


        return view('thematique.edit', [
            'thematique' =>  $thematique
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thematique  $thematique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thematique $thematique)
    {
        $request->validate([
            'nom' => 'required'
        ]);

        $thematique->update($request->all());

        return redirect()->route('thematique.index')->with('status-edit', 'La modification du thématique est réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thematique  $thematique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thematique $thematique)
    {
        
        $thematique->delete();
        return redirect()->route('thematique.index')->with('status-delete', 'Thématique supprimé avec Succès');
    }

  
}
