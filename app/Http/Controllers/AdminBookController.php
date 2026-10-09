<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booksTable;
use App\Models\booksImageTable;

class AdminBookController extends Controller
{
    
    public function index()
    {
          if (!session()->has('admin_id'))
     {
        return redirect()->route('admin.login');
    }
    $books=BooksTable::with('images')->get();
    return view('admin.index',compact('books'));
    }

    public function addbook()
    {
         if (!session()->has('admin_id'))
     {
        return redirect()->route('admin.login');
    }
        return view('admin.addbooks');
    }

    public function storebook(Request $request)
    {
         if (!session()->has('admin_id'))
     {
        return redirect()->route('admin.login');
    }
         $book=booksTable::create([
            'name'=>$request->bookname,
            'description'=>$request->bookdescription,
            'author'=>$request->bookauthor,
            'price'=>$request->bookprice,
         ]);

         if($request->hasFile('images'))
            {
                foreach($request->file('images')as $image)
                    {
                        $path= $image->store('books', 'public');
            $book->images()->create([
                'image' => $path,
            ]);
                    }
            }
            return redirect()->route('admin.index');
    }
public function destroy($id)
{
    $book = BooksTable::find($id);

    if (!$book) {
        return response()->json([
            'success' => false,
            'message' => 'Book not found'
        ], 404);
    }

    $book->delete();

    return response()->json([
        'success' => true,
        'message' => 'Book deleted successfully'
    ], 200);
}
    
}
