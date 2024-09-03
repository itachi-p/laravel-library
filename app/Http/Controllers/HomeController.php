<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $author;
    private $book;

    public function __construct()
    {
        $this->middleware('auth');
        $this->author = new Author;
        $this->book = new Book;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function home()
    {
        $all_authors = $this->author->latest()->get();
        // print_r($all_authors);
        // echo ('<hr>');
        $all_books = $this->book->latest()->get();
        // print_r($all_books);

        return view('home')
            ->with('all_authors', $all_authors)
            ->with('all_books', $all_books);
    }
}
