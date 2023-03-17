<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function index()
    {
        $status = Status::all();
        return response()->json(['request'=>'success', 'Status'=>$status], 201);
    }

 
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $status = Status::create($request->all());
        return response()->json(['request'=>'created successfuly','status'=>$status], 200);
    }


    public function show(Status $status)
    {
        
    }

    public function edit(Status $status)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        //
    }
}
