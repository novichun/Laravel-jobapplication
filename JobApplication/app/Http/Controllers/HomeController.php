<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        try {
        $companies = Company::all();
        return view('home', compact("companies"));
    } catch (\Exception $e) {
        return redirect()->route('home')->with('error', 'An error occurred while retrieving the company details for editing: '.$e->getMessage());
    }
    }
}
