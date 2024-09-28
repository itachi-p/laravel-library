@extends('layouts.app')

@section('title', 'Book')

@section('content')
    <div class="container rounded">
        <div class="row">
            <div class="col-3">
                <img src="{{ $book->cover_photo }}" alt="{{ $book->title }}" class="img-md">
            </div>
            <div class="col-9">
                <h1>{{ $book->title }}</h1>
                <p class="h6 fw-bold">by {{ $book->author->name }}</p>

                <p class="text-muted">Published in {{ $book->year_published }}</p>
            </div>
        </div>
    </div>
@endsection
