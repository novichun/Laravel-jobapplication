<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Company;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function new()
    {
        return view("companies.new");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'taxnumber' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        
        Company::create($request->post());

        return redirect()->route('home')->with('success','Company has been created successfully.');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view("companies.show", compact("company"));
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        
        return redirect()->route('home')->with('success','Company has been deleted successfully.');
    }
}
