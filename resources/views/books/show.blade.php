@extends('layouts.app')

@section('title', 'Book')

@section('content')
    <div class="container rounded">
        <div class="row">
            <div class="col-3">
                <img src="data:image/jpeg;base64,{{ $book->cover_photo }}" alt="{{ $book->title }} class="">
            </div>
            <div class="col mx-auto">
                <h1>{{ $book->title }}</h1>
                <p class="h6 fw-bold">by {{ $book->author }}</p>
                <p class="text-muted">Published in {{ $book->year_published }}</p>
            </div>
        </div>
    </div>
@endsection
