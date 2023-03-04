@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Create Article</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Name</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="formGroupExampleInput" name="name" placeholder="Input Name">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('category.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection