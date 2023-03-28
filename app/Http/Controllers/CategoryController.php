<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function __construct()
    {
        $this->middleware(['auth:api','isAdmin'],['except'=>'index']);
    }
    
    
public function index(){
    $category = Category::all();
    return  response()->json(['request'=>'success','all categories'=>$category],200);
}

public function store (Request $request){

    $data = Category::create($request->all());
    return response()->json(['data'=>'created successfuly', 'category'=>$data], 201);
}

public function update( Request $request, $id){   

    $category_to_update = Category::findOrFail($id);
    $category_to_update->update($request->all());
    
    return $category_to_update;
}

public function destroy( Category $category){
    $category->delete();
        
    return response()->json([
        'status' => true,
        'message' => 'Category deleted successfully'
    ], 200);
}
}
