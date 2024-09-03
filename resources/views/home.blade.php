@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card py-5">
                    <div class="card-body">
                        <a href="{{ route('author.index') }}" class="form-control text-decoration-none border border-1">
                            <h2 class="text-primary text-center fw-bold display-4">
                                Authors 
                            </h2>
                        </a>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card py-5">
                    <div class="card-body">
                        <h2 class="text-success text-center fw-bold display-4">
                            Books 
                        </h2>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection