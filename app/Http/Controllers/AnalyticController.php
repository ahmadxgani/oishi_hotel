<?php

namespace App\Http\Controllers;

class AnalyticController extends Controller
{
    /**
     * Show the statistic in form of application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.analytic');
    }
}
