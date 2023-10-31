<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\Book\IndexRequest;
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
}
