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

public function store (){

}
public function update(){

}
public function destroy(){

}
}
