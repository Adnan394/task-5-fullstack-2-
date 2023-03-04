@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">{{ $data->title }}</h1>
    <img src="{{ asset('storage') }}/{{ $data->image }}" alt="" width="100%" class="mb-5">
    <p>{{ $data->content }}</p>
    <div class="">
        <p>Penulis : {{ $data->user->name }}</p>
        <p>category : {{ $data->category->name }}</p>
    </div>
</div>

@endsection