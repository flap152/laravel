<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

/**
 * Class CompaniesController
 * @package App\Http\Controllers
 */
class CompaniesController extends Controller
{
    //
    public function index()
    {
    	//return 'get all companies';
    	$companies = Company::all();

    	return view('companies.index', compact('companies'));
    }

    public function show($id)
    {
    	$company = Company::findOrFail($id);
		
		//dd($company);

    	return  view('companies.show', compact ('company'));
    }





    public function create()
    {
    	return view ('companies.create');
    }

public function store(CompanyRequest $request)
{
	Company::create($request->all());
	return redirect ('companies');
}

}
