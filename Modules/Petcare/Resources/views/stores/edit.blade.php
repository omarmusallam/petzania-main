@extends('layout.master')
@section('title', $store->name)
@section('content')
    @push('style')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @endpush
    <div class="container">
        <h1>Edit Store</h1>
        <form method="POST" action="{{ route('store.update', ['id' => $store->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('petcare::stores._form', [
                'button_lable' => 'Update Store',
            ])
        </form>
    </div>
@endsection
