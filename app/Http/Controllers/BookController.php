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


    // store() - This method will store the data from the form to the database.
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|min:1|max:50',
            'year_published'      => 'required|numeric|max:4',
            'author_id' => 'required|numeric',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        $this->book->create([
            'title' => $request->title,
            'year_published' => $request->year_published,
            'author_id' => $request->author_id,
            'cover_photo' => $request->cover_photo,
        ]);

        return redirect()->route('book.index');
            // ->with('success', 'Book has been added successfully.');
    }
}
