<?php

namespace App\Http\Controllers;

use App\Quark;
use Illuminate\Http\Request;
use Monolog\Utils;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quarks = Quark::with('user')->latest()->get();
        return view('home', ['quarks' => $quarks]);
    }

    public function welcome(){
        return view('welcome');
    }

}
