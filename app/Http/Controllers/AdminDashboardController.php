<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
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
        // Here we would fetch counts and data for the dashboard
        $data = [
            'collegeCount' => 0, // Replace with actual count from database
            'courseCount' => 0,
            'unitCount' => 0,
            'paperCount' => 0,
            'userCount' => 1, // We have at least one admin user
        ];
        
        return view('admin.dashboard', $data);
    }
}
