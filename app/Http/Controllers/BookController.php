<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\Book\{IndexRequest,DetailsRequest,DestroyRequest};
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
