<?php

namespace Crm\Customer\Services;

use Crm\base\Repositories\CustomerRepository;
use Crm\base\requests\CreateRequest;
use Crm\Customer\Models\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerService
{
    public function __construct(private CustomerRepository $customerRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return $this->customerRepository->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateRequest $request)
    {
        return $this->customerRepository->create($request->toArray());
    }
    public function update($id, CreateRequest $request)
    {
        if ($this->customerRepository->update($id,$request->toArray())) {
            return response()->json(["message" => "updated successfully"], Response::HTTP_OK);
        }
        return response()->json(["message" => "not found"], Response::HTTP_NOT_FOUND);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if($this->customerRepository->show($id)){
            return response()->json(["message" => "found","Customer"=>$this->customerRepository->show($id)], Response::HTTP_OK);
        }
        return response()->json(["message" => "customer not found"], Response::HTTP_NOT_FOUND);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = $this->customerRepository->destroy($id);
        if (!$customer) {
            return response()->json(["message" => "not found"], Response::HTTP_NOT_FOUND);
        }
        $this->customerRepository->destroy($id);
        return response()->json(["message" => "customer of id = " . $id . " has been deleted successfully"], Response::HTTP_OK);
    }

}

#0 {main}
