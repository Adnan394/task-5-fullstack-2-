@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <a href="{{ route('article.create') }}" class="btn btn-primary me-3">Create Article</a>
            <a href="{{ route('category.index') }}" class="btn btn-primary">Category</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Creator</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $d->title }}</td>
                            <td>{{ $d->content }}</td>
                            <td><img src="{{ asset('storage') }}/{{ $d->image }}" alt="" width="50px"></td>
                            <td>{{ $d->user->name }}</td>
                            <td>{{ $d->category->name }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('article.show', $d->id) }}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                    <a href="{{ route('article.edit', $d->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('article.destroy', $d->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-x-square-fill"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>

</div>
@endsection
