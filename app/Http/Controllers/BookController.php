<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        $all_books = $this->book->latest()->get();
        return view('books.index')
            ->with('all_books', $all_books);
    }
}
