<?php

namespace App\Http\Controllers;

use App\Crm\customer\Models\Customer;
use App\Http\Requests\ApiRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,$customer_id)
    {
        $customer=new Customer();
        $array=(array)$customer->get("id");
        if(!in_array($customer_id,$array)){
            return  response()->json(["message"=>"bad data entering"],Response::HTTP_BAD_REQUEST);
        }
        $note=Note::create
        ([
            "note"=>$request->note,
            "customer_id"=>$request->customer_id,

        ])->save();
        return  response()->json(["message"=>"record has been created successfully "],Response::HTTP_OK);
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
    public function show(Note $note,$customerid)
    {

        $note=Note::get()->where('customer_id',$customerid);
        return response()->json($note,Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Note $note, $id, ApiRequest $request, $customerid, Customer $customer)
    {
        $note=$note->find($id);
        if(!$note){
            return  response()->json(["message"=>"not found"],Response::HTTP_NOT_FOUND);
        }
        $customerid=(int)$customerid;
//        dd($note->customer_id,$customerid);
        if($note->customer_id !=$customerid){
            return  response()->json(["message"=>"bad data entry"],Response::HTTP_BAD_REQUEST);
        }
        $note->update(            [
            "note"=>$request->note,
        ]);

        return  response()->json([$note,"message"=>"record has been updated successfully "],Response::HTTP_OK);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note,$id,$customerid)
    {
        $note=$note->find($id);
        if(!$note)
        {
            return  response()->json(["message"=>"not found"],Response::HTTP_NOT_FOUND);
        }
        $customerid=(int)$customerid;
//        dd($note->customer_id,$customerid);
        if($note->customer_id !=$customerid){
            return  response()->json(["message"=>"bad data entry"],Response::HTTP_BAD_REQUEST);
        }
        $note->delete();
        return  response()->json(["message"=>"record has been deleted successfully"],Response::HTTP_OK );
    }

}
