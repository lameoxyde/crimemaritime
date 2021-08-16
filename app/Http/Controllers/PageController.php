<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Thematique;
use App\Imports\PageImport;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use Maatwebsite\Excel\Facades\Excel;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pages = Page::with('thematique')->get();
        // return view('pages.list', [
        //     'pages' => $pages
        // ]);

        $pageQuery = Page::query();
        $pageQuery->where('nom', 'like', '%'.request('q').'%');
        $pages = $pageQuery->get();

        return view('pages.list', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thematiques = Thematique::get();
        return view('pages.add',[
            'thematiques' => $thematiques 
        ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
     
        try{
            Page::create($request->all());
        } catch(\Exception $ex) {
            return back()->withError("Vous n'avez pas encore selectioner le thematique, réessayer");
        }
       

        return redirect()->route('pages.index')->with('status-add', 'Le remplissage du formulaire criminalité maritime est avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $thematiques = Thematique::get();
        return view('pages.edit', [
            'page' =>  $page,
            'thematiques' => $thematiques 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        try{
        $page->update($request->all());
        } catch(\Exception $ex) {
            return back()->withError("Vous n'avez pas encore selectioner le thematique, réessayer");
        }

        return redirect()->route('pages.index')->with('status-edit', 'La modification est réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($page)
    {
        Page::find($page)->delete();
        return redirect()->route('pages.index')->with('status-delete', 'La suppression est réussie');
    }

    public function searchByDate(Request  $request) {
        $pages = Page::where('date', '>=',$request->from)->where('date', '<=',$request->to)->get();
        return view('pages.list', [
            'pages' => $pages
        ]);
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new PageImport($request->delimiter), $request->file);
      
        } catch (\Exception $ex){
            return back()->withError('Il avait une erreur lors de votre imporation. Verifier votre fichier CSV et réessayer');
        }
       
        return redirect()->route('pages.index')->with('status-import', "L'importation est réussie");
    }

    public function upload()
    {
        return view('pages.import');
    }
  
}
