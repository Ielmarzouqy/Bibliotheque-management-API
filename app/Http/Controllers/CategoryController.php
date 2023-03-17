<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
public function index(){
    $category = Category::all();
    return  response()->json(['request'=>'success','all categories'=>$category],200);
}

public function store (Request $request){

    $data = Category::create($request->all());
    return response()->json(['data'=>'created successfuly', 'category'=>$data], 201);
}
public function update(){

}
public function destroy(){

}
}
