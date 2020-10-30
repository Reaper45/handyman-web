<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use Illuminate\Support\Facades\DB;

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

        // Recently updated jobs
        $jobs = Job::all()->take(5);

        return view('dashboard')->with(["stats" => $stats, "jobs" => $jobs]);
    }
}
