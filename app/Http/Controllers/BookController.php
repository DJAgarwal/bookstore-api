<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\Book\{IndexRequest,DetailsRequest};
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

    public function details(DetailsRequest $request)
    {
        $data = Book::find($request->id);
        return response()->json(['data' => $data]);
    }
}
