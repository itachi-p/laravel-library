@extends('layouts.app')

@section('title','Author')

@section('content')

        <h3>Authors</h3>
        <form action="{{ route('author.store') }}" method="post">
            @csrf
            <div class="row justify-content-center mb-3">
                <div class="col-10">
                    <input type="text" class="form-control" name="name" placeholder="Add new author" value=" {{ old('name') }}" autofocus>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-plus me-1"></i>Add</button>
                </div>
            </div>
            {{-- error --}}

            {{-- Authors --}}
                <main class="rounded">
                    @forelse ($all_authors as $author)
                        <div class="row border border-1 mx-0 ">
                            <div class="col-8 text-start">
                                <h3 class="h5">{{ $author->name }}</h3>
                            </div>
                            <div class="col-4 text-end">
                                <a href="{{ route('author.edit', $author->id) }}" class="btn btn-outline-warning btn-md border-0">
                                    <i class="fa-solid fa-file-pen"></i>
                                </a>
                                <a href="{{ route('author.delete', $author->id) }}" class="btn btn-outline-danger btn-md border-0">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="lead">No Author yet.</p>
                    @endforelse
                </main>
        </form>

        {{-- Display all authors here --}}


@endsection
