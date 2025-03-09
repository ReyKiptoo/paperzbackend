<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicDashboardController extends Controller
{
    /**
     * Show the public dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('public-dashboard');
    }
}
