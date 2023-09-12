@extends('layout.master')
@section('title', 'Settings')
@section('content')

    {!! breadcrumb([
        'title' => 'Create Media',
        route('dashboard') => __('common.Dashboard'),
        '#' => 'Create',
    ]) !!}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('setting.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('petcare::app_settings._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
