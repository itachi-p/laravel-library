<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function index()
    {
        $all_authors = $this->author->latest()->get();
        return view('authors.index')
            ->with('all_authors', $all_authors);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
        ]);

        // save
        $this->author->name = $request->name;
        $this->author->save();

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $author = $this->author->findOrFail($id);

        return view('authors.edit')
            ->with('author', $author);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1|max:50',
        ]);

        $author = $this->author->findOrFail($id);
        $author->name = $request->name;

        $author->save();

        return redirect()->route('index');
    }

    public function delete($id)
    {
        $author = $this->author->findOrFail($id);

        return view('authors.delete')
            ->with('author', $author);
    }

    public function destroy($id)
    {
        $this->author->destroy($id);

        return redirect()->route('index');
    }
}
