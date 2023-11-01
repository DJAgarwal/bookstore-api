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

    public function search(Request $request)
    {
        $title = $request->input('title');
        $author = $request->input('author');
        $genre = $request->input('genre');
        $isbn = $request->input('isbn');
        $data = Book::when($title, function ($query) use ($title) {
            return $query->where('title', 'LIKE', '%' . $title . '%');
        })
        ->when($author, function ($query) use ($author) {
            return $query->where('author', 'LIKE', '%' . $author . '%');
        })
        ->when($genre, function ($query) use ($genre) {
            return $query->where('genre', 'LIKE', '%' . $genre . '%');
        })
        ->when($isbn, function ($query) use ($isbn) {
            return $query->where('isbn', 'LIKE', '%' . $isbn . '%');
        })
        ->paginate(10);
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
