@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
<h3>Edit book</h3>
<form action="#" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control w-100" name="title" id="title" value="{{ $book->title }}" autofocus>
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
                    placeholder="YYYY" value="{{ $book->year_published }}">
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
                    <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="cover-photo" class="form-label">Cover Photo <span class="fst-italic">(optional)</span></label>
        <div class="row justify-content-center">
            <div class="col">
                <input type="file" name="cover_photo" id="cover-photo" class="form-control" aria-describedby="cover-info">
                <div id="cover-info" class="form-text">
                    Acceptable formats: jpeg, jpg, png, gif only
                    <br>
                    Maximum file size: 1048kb
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-save me-1"></i>Save</button>
            </div>
        </div>
        {{-- Error --}}
        @error('cover_photo')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</form>

@endsection
