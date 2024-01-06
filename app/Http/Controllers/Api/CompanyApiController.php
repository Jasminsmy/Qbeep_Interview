<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyApiController extends Controller
{
    public function show($id)
    {
        try {
            $company = Company::with('employees')->findOrFail($id);
            $company->employee_count = $company->employees->count();

            return response()->json(['company' => $company]);

        } catch (\Exception $e) {
            \Log::error('Error in CompanyApiController: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
