<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    
    public function create()
    {
        return view('companies.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'url',
        ]);

        if($request->hasFile('logo')){
            $logoPath = $request->file('logo')->store('public');
        }

        Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo' => isset($logoPath) ? $logoPath : null,
            'website' => $request->input('website'),
        ]);

        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }


    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }


    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'url',
        ]);

        $company = Company::findOrFail($id);

        if ($request->hasFile('logo')) {
            // Update the logo if a new one is provided
            $logoPath = $request->file('logo')->store('public/logos');
            $logoPath = str_replace('public/', '', $logoPath);
            $company->logo = $logoPath;
        }

        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

 
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
