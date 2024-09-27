<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;

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
        $all_authors = Author::all();

        return view('books.index')
            ->with('all_authors', $all_authors)
            ->with('all_books', $all_books);
    }


    // store() - This method will store the data from the form to the database.
    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|min:1|max:50',
            'year_published' => 'required|numeric|digits:4',
            'author_id'      => 'nullable|numeric',
            'cover_photo'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        $this->book->title          = $request->title;
        $this->book->year_published = $request->year_published;
        $this->book->author_id      = $request->author_id;
        $this->book->cover_photo = 'data:image/' . $request->cover_photo->extension() . ';base64,' . base64_encode(file_get_contents($request->cover_photo));
        $this->book->save();

        return redirect()->route('book.index');
            // ->with('success', 'Book has been added successfully.');
    }


      // show() - show detail of the book
    public function show($id)
    {
        $book = $this->book->findOrFail($id);

        return view('books.show')
        ->with('book', $book);
    }
}
