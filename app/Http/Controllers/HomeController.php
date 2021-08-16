<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use App\Models\Thematique;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     // return view('home');
       
    //         return view('home');
        
    // }


    public function index()
    {
        $user = User::select("*")
                  ->whereNotNull('seen')
                  ->orderBy('seen', 'DESC')->get();
            
        $users = User::count();
        $pages = Page::count();
        $thematiques = Thematique::count();
        return view('home',[
            'user' => $user,
            'users' => $users,
            'pages' => $pages,
            'thematiques' => $thematiques,
        ]);
    }

    
}
