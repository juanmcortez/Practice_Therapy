<?php

namespace App\Http\Controllers;

use App\Models\Dashboard\Widgets;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.index', ['title' => 'Dashboard']);
    }
}
