<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\Crm\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        return view('crm.companies.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource. Pass in model for livewire component
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('crm.companies.create', compact('company'));
    }

    // Store, update and delete are handled by Http/Livewire components

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crm\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('crm.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crm\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('crm.companies.edit', compact('company'));
    }
}
