<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportAndAnalyticsController extends Controller
{
    //
    public function index()
    {
        return view('report_and_analytics.index');
    }
}
