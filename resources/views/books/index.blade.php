@extends('layouts.app')

@section('title', 'Book')

@section('content')

<h3>Add new book</h3>
<form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control w-100" name="title" id="title" value="{{ old('title') }}" autofocus>
        {{-- Error --}}
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror

    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <label for="year-published" class="form-label">Year Published</label>
                <input type="number" maxlength="4" class="form-control" name="year_published" id="year-published"
                    placeholder="YYYY" value="{{ old('year_published') }}">
                {{-- Error --}}
                @error('year_published')
                <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="col">
                <label for="author_id" class="form-label">Author</label>
                <select class="form-select" name="author_id" id="author_id">
                    <option value="">ANONYMOUS</option>
                    @foreach($all_authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="cover-photo" class="form-label">Cover Photo <span class="fst-italic">(optional)</span></label>
        <div class="row justify-content-center">
            <div class="col">
                <input type="file" name="cover_photo" id="cover-photo" class="form-control"
                    aria-describedby="cover-info">
                <div id="cover-info" class="form-text">
                    Acceptable formats: jpeg, jpg, png, gif only
                    <br>
                    Maximum file size: 1048kb
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-plus me-1"></i>Add</button>
            </div>
        </div>
        {{-- Error --}}
        @error('cover_photo')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</form>

<hr class="my-5">

<h3>List of books</h3>
@if($all_books->count() > 0)
{{-- List of books --}}
<div class="container rounded border mt-3">
    @foreach ($all_books as $book)
    <div class="row align-items-center border">
        <div class="col-8">
            <a href="{{ route('book.show', $book->id) }}">
                {{ $book->title }}
            </a>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <a href="#" class="btn btn-sm mr-2">
                <i class="fas fa-file-pen text-warning"></i>
            </a>
            <form action="#" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm">
                    <i class="fa-solid fa-trash-can text-danger"></i>
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@else
<p>No books yet.</p>
@endif

@endsection
