<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $per_page = $request->per_page ?: 10;

        $books = Book::where('user_id', Auth::id())
            ->paginate($per_page);

        return response()->json([
            'books' => $books
        ], 200);
    }

    public function store(Request $request)
    {
        $book = Book::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json([
            'book' => $book
        ], 201);
    }

    public function show($id)
    {
        $book = Book::where('user_id', Auth::id())->findOrFail($id);

        return response()->json([
            'book' => $book
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $book = Book::where('user_id', Auth::id())->findOrFail($id);
        $book->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json([
            'book' => $book
        ], 200);
    }

    public function destroy($id)
    {
        $book = Book::where('user_id', Auth::id())->findOrFail($id);
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully'
        ], 200);
    }

    public function search(Request $request)
    {
        $query = Book::where('user_id', Auth::id());
    
        if ($request->has('q')) {
            $query->where('title', 'like', '%'.$request->q.'%')
                ->orWhere('description', 'like', '%'.$request->q.'%');
        }
    
        $books = $query->paginate(10);
    
        return response()->json([
            'books' => $books
        ], 200);
    
    }
}