<?php

namespace Crm\Customer\Controllers;

use Illuminate\Http\Request;
use Crm\customer\Models\Customer;
use App\Http\Controllers\Controller;
use Crm\base\requests\CreateRequest;
use Crm\Customer\Services\ExportServices\CustomerExportService;
use Crm\Customer\Services\CustomerService;

class CustomersController extends Controller
{
    protected CustomerService $CustomerService;
    public function __construct(CustomerService $CustomerService,private CustomerExportService $CustomerExportService)
    {
        $this->CustomerService = $CustomerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->CustomerService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateRequest $request)
    {
        return $this->CustomerService->create($request);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->CustomerService->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, CreateRequest $request)
    {
        return $this->CustomerService->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->CustomerService->destroy($id);

    }
    public function export(Request $request)
    {
        return $this->CustomerExportService->export($request->get("format")??null);
 
    }
}

#0 {main}