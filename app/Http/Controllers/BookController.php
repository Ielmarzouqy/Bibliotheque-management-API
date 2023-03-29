<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Symfony\Component\VarDumper\Caster\StubCaster;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api','isAdmin'],['except'=>'index']);
    }
    
    public function index()
    {
        $books = Book::all();
        return response()->json([
            'status'=>'success',
            'All books'=>$books]);
    }

    public function store(StoreBookRequest $request)
    {

        $book = Book::create($request->all());
        return response()->json(['sttaus'=>'success', 'book'=>$book],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->findOrFail($book->id);
       
        return response()->json($book, 200);
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $book_to_update = Book::findOrFail($id);
        $book_to_update->update($request->all());

        return response()->json(['statue'=>'update', 'book updated successfully'=>$book_to_update]);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'status'=>'delet',
            'message'=>'deleted seuccessfully'
        ], 200);
    }
}
