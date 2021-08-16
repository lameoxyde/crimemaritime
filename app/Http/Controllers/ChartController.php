<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thematique;
use App\Models\Page;

class ChartController extends Controller
{
    public function thematiquechart()
    {


        // $charts = Thematique::get();
        // return view('charts', [
        //     'charts' => $charts
        // ]);

        $charts = Thematique::with("page")->get();
        // La vue "diagram" avec les catégories
        return view("charts", compact('charts'));
    }


   
        
}
