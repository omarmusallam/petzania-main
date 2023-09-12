@extends('layout.master')
@section('title', 'Stores')
@section('content')
    @push('style')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @endpush
    <div class="container">
        <h1>Create a New Store</h1>
        <form method="POST" action="{{ route('store.store') }}" enctype="multipart/form-data">
            @csrf
            @include('petcare::stores._form')

        </form>
    </div>
@endsection
