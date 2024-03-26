<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function dailyreport()
    {
        return view('report.dailyreport');
    }

    public function monthlyreport()
    {
        return view('report.monthlyreport');
    }

    public function datewisereport()
    {
        return view('report.datewisereport');
    }
}
