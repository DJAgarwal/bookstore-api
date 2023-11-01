<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\Book\{IndexRequest,DetailsRequest,DestroyRequest,StoreRequest};
use App\Models\Book;
class BookController extends Controller
{
    public function index(IndexRequest $request)
    {
        $perPage = $request->perPage ?? 10;
        $page = $request->page ?? 1;
        $data = Book::paginate($perPage, ['*'], 'page', $page);
        return response()->json(['data' => $data]);
    }

    public function store(StoreRequest $request)
    {
        $book = Book::find($request->id);
        if(!$book){
            $book = new Book();
        }
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->description = $request->description;
        $book->isbn = $request->isbn;
        $book->published = $request->published;
        $book->publisher = $request->publisher;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $book->image = '/images/' . $imageName;
        }
        $book->save();
        return response()->json(['message' => 'Saved successfully']);
    }

    public function details(DetailsRequest $request, $id)
    {
        $data = Book::find($id);
        return response()->json(['data' => $data]);
    }

    public function destroy(DestroyRequest $request, $id)
    {
        $book = Book::find($id);
        if(!$book){
            return response()->json(['message' => 'Book not found'], 404);
        }
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
