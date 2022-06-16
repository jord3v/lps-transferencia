<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\User;

class HomeController extends Controller
{
    private $landingPage;
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LandingPage $landingPage, User $user)
    {
        $this->landingPage = $landingPage;
        $this->user = $user;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $landingPages = $this->landingPage->count();
        $users = $this->user->count();
        return view('home', compact('landingPages', 'users'));
    }
}
