<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;

class CollectionController extends Controller
{
    public function index(){
        $collection = Collection::all();
        return  response()->json(['request'=>'success','all collections'=>$collection],200);
    }
    
    public function store (Request $request){
    
        $data = Collection::create($request->all());
        return response()->json(['data'=>'created successfuly', 'collection'=>$data], 201);
    }
    public function update( Request $request, $id){
        $collection_to_update = Collection::findOrFail($id);
        $collection_to_update->update($request->all());
        
        return $collection_to_update;
    }
   
}
