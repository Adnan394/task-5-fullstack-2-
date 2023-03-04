@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Article</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('article.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="formGroupExampleInput" name="title" value="{{ $data->title }}" placeholder="Input Title">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Content</label>
                <input type="text" class="form-control @error('content') is-invalid @enderror" id="formGroupExampleInput" name="content" value="{{ $data->content }}" placeholder="Input Content">
                @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="formGroupExampleInput" name="image">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Category</label>
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option value="{{ $data->category_id }}" selected>{{ $data->category->name }}</option>
                            @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('article.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection