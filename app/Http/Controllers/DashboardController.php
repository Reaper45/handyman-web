<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
    public function index()
    {
        $stats = [
            "handymen" => User::where('type', 'HANDYMAN')->count(),
            "clients"  => User::where('type', 'CLIENT')->count(),
            "ongoing"  => Job::where('status', 'ONGOING')->count(),
            "complete" => Job::where('status', 'COMPLETE')->count(),
        ];

        return view('dashboard')->with(["stats" => $stats]);
    }
}
