<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function new()
    {
        return view("companies.new");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'taxnumber' => 'required|numeric|digits_between:1,20',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:1,20',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
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
    
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view("companies.edit", compact("company"));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'taxnumber' => 'required|numeric|digits_between:1,20',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:1,20',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

      $company = Company::findOrFail($id);
      $company->update($request->all());
        
      return redirect()->route('home')->with('success','Company has been updated successfully.');
    }
}
