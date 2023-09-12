@extends('layout.master')
@section('title', 'Settings')
@section('content')

    {!! breadcrumb([
        'title' =>'Media Settings',
        route('dashboard') => __('common.Dashboard'),
        '#' => 'Settings',
    ]) !!}
    <div class="container-fluid">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('setting.create') }}" type="button" class="btn btn-primary btn-icon ms-2">
                                    <i data-feather="check-square"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('image') }}</th>
                                        <th>{{ __('type') }}</th>
                                        <th>{{ __('text') }}</th>
                                        <th>{{ __('Created At') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($all as $setting)
                                        <tr class="align-middle">
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    @if ($setting->image_path)
                                                        <img class="img-xs rounded-circle"
                                                            src="{{ asset('storage/' . $setting->image_path) }}">
                                                    @else
                                                        <img class="img-xs rounded-circle"
                                                            src="{{ asset('public/static/blank_small.png') }}">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $setting->type }}</td>
                                            <td>{{ $setting->text }}</td>
                                            <td>{{ $setting->created_at }}</td>
                                            <td>
                                                <a href="{{ route('setting.edit', [$setting->id]) }}"
                                                    class="btn btn btn-link btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a>
                                                <form action="{{ route('setting.destroy', $setting->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-icon"
                                                        onclick="return confirm('Are you sure you want to delete this {{ $setting->type }}?')">
                                                        <i data-feather="trash-2"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
