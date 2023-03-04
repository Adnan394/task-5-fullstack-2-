@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Creator</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->user->name }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('category.edit', $d->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('category.destroy', $d->id) }}" method="POST">
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

    <a href="{{ route('article.index') }}" class="btn btn-secondary">Back To Article</a>
</div>
@endsection     