<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booksTable;
use App\Http\Resources\Booksource;
use Yajra\DataTables\Facades\DataTables;

class bookcontroller extends Controller
{

public function datatable()
{
    $books = BooksTable::query();

    return DataTables::of($books)->make(true);
}
  public function index(Request $request)
{
    $perPage = $request->per_page ?? 10;

    $books = BooksTable::with('images')->paginate($perPage);

    return Booksource::collection($books)->additional([
        'success' => true,
        'message' => 'Books fetched successfully'
    ]);
}

    public function show($id)
    {
        $book = BooksTable::with('images')->find($id);

        if(!$book)
            {
                 return response()->json(
          ['success'=>false,
          'message'=>'book not found',
          'data'=>null]
          );

            }
        return response()->json([
          'success'=>true,
          'message'=>'book fetched successfully',
          'data'=>new Booksource($book)

        ]);
    }
    public function update(Request $request,$id)
    {
        $book=booksTable::find($id);

        if(!$book)
            {
                return response()->json([
                    'success'=>false,
                    'message'=>'book not found',
                     'data'=>null               ]);
            }

                     $book->update([
                        'name'=>$request->bookname,
                        'description'=>$request->bookdescription,
                        'author'=>$request->bookauthor,
                        'price'=>$request->bookprice

                     ]);
                     return response()->json([
                         'success' => true,
                         'message' => 'Book updated successfully',
                          'data' => $book
                                             ]);

            }

            public function storebook(Request $request)
            {
                $validated=$request->validate([
                    'bookname'=>'required',
                    'bookdescription'=>'required',
                    'bookauthor'=>'required',
                    'bookprice'=>'required|numeric'
                ]);
                $book= booksTable::create([
                    'name'=>$request->bookname,
                    'description'=>$request->bookdescription,
                    'author'=>$request->bookauthor,
                    'price'=>$request->bookprice,

                ]);
                
                return response()->json([
                    'success'=>true,
                    'message'=>'book created',
                    'data'=>$book
                ]);

            }
            public function restore($id)
{
    $book = BooksTable::withTrashed()->find($id);

    if (!$book) {
        return response()->json([
            'success' => false,
            'message' => 'Book not found',
            'data' => null
        ], 404);
    }

    $book->restore();

    return response()->json([
        'success' => true,
        'message' => 'Book restored successfully',
        'data' => $book
    ]);
}
public function trash()
{
    $books = BooksTable::withTrashed()->get();

    return response()->json([
        'success' => true,
        'message' => 'All books including deleted books',
        'data' => $books
    ]);
}
public function forceDelete($id)
{
    $book = BooksTable::withTrashed()->find($id);

    if (!$book) {
        return response()->json([
            'success' => false,
            'message' => 'Book not found',
            'data' => null
        ], 404);
    }

    $book->forceDelete();

    return response()->json([
        'success' => true,
        'message' => 'Book permanently deleted',
        'data' => null
    ]);
}

    }
