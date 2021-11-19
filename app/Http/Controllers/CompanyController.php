<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::all();
        return $companies;
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $company = new Company();
            $company->name = $request->name;
            $company->content = $request->content;
            $company->save();
            return "Company created";
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
