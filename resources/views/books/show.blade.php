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
                {{-- authorがnullの場合、著者名にはANONYMOUSを表示 --}}
                @if ($book->author)
                    <p class="h6 fw-bold">by {{ $book->author->name }}</p>
                @else
                    <p class="h6 fw-bold text-muted">by ANONYMOUS</p>
                @endif
                <p class="text-muted">Published in {{ $book->year_published }}</p>
            </div>
        </div>
    </div>
@endsection
