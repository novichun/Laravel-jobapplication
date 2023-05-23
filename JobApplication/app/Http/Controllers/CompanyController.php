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
        try {
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
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'An error occurred while creating the company: '.$e->getMessage());
        }
    }

    public function show(Company $company)
    {
        try {
            return view("companies.show", compact("company"));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'An error occurred while retrieving the company details: '.$e->getMessage());
        }
    }

    public function delete(Company $company)
    {
        try {
            $company->delete();

            return redirect()->route('home')->with('success','Company has been deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'An error occurred while deleting the company: '.$e->getMessage());
        }
    }

    public function edit(Company $company)
    {
        try {
            return view("companies.edit", compact("company"));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'An error occurred while retrieving the company details for editing: '.$e->getMessage());
        }
    }

    public function update(Request $request, Company $company)
    {
        try {
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

            $company->update($request->all());

            return redirect()->route('home')->with('success','Company has been updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'An error occurred while updating the company: '.$e->getMessage());
        }
    }
}