<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showDashboard()
    {
//        $thirtyDays = date("Y-m-d", strtotime("+32 days"));
//        $eventsList = Event::where('user_id', Auth::user()->id)->where('start', '<' ,$thirtyDays)->where('start', '>=' ,date("Y-m-d"))->get();
        return view('home');
    }
}
