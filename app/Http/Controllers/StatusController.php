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
        $status->find($status->id);
        if (!$status) {
            return response()->json(['message' => 'status not found'], 404);
        }
        return response()->json($status, 200);
    }

   
    
   
    public function update( Request $request, $id){
        $status_to_update = Status::findOrFail($id);
        $status_to_update->update($request->all());
        
        return $status_to_update;
    }
    public function destroy( Status $status){
        $status->delete();
            
        return response()->json([
            'status' => true,
            'message' => 'status deleted successfully'
        ], 200);
    }
}
