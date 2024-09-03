@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')

            <h3>Edit author</h3>
            <form action="{{ route('author.update', $author->id) }}" method="post">
                @csrf
                @method('PATCH')
                <input type="text" class="form-control" name="name" placeholder="Edit author"
                    value="{{ $author->name }}" autofocus>
                    {{-- Error --}}
                    
                <div class="row justify-content-center mt-4">
                    <div class="col">
                        <a href="{{ route('index') }}" class="btn btn-outline-warning w-100">Cancel</a>
                    </div>
                    <div class="col">
                        
                        <button type="submit" class="btn btn-warning w-100">Update</button>
                    </div>
                </div>
            </form>

@endsection
