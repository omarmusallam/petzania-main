@extends('layout.master')
@section('title', 'Settings')
@section('content')

    {!! breadcrumb([
        'title' => 'Update Media',
        route('dashboard') => __('common.Dashboard'),
        '#' => 'update',
    ]) !!}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('setting.update', $setting->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('petcare::app_settings._form', [
                                'button_label' => 'Update',
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
