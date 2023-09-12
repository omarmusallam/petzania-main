@extends('layout.master')
@section('title', 'Stores')
@section('content')

    {!! breadcrumb([
        'title' => @$data['title'],
        route('dashboard') => __('common.Dashboard'),
        '#' =>'Stores',
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
                                <a href="{{ route('store.create') }}" type="button" class="btn btn-primary btn-icon ms-2">
                                    <i data-feather="check-square"></i>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Store Name') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Phone') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Created At') }}</th>
                                        <th>{{ __('Stauts') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($stores as $store)
                                        <tr class="align-middle">
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    @if ($store->image)
                                                        <img class="img-xs rounded-circle"
                                                            src="{{ asset('storage/' . $store->image) }}">
                                                    @else
                                                        <img class="img-xs rounded-circle"
                                                            src="{{ asset('public/static/blank_small.png') }}">
                                                    @endif


                                                    <div class="ms-2">
                                                        <p> {{ $store->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $store->email }}</td>
                                            <td>{{ $store->phone }}</td>
                                            <td class="text-truncate" style="max-width: 300px">{!! $store->description !!}
                                            </td>
                                            <td>{{ $store->created_at }}</td>
                                            <td>
                                                @if ($store->status == 1)
                                                    Active
                                                @else
                                                    InActive
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('store.edit', [$store->id]) }}"
                                                    class="btn btn btn-link btn-icon">
                                                    <i data-feather="check-square"></i>
                                                </a>
                                                <form action="{{ route('store.destroy', $store->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link btn-icon"
                                                        onclick="return confirm('Are you sure you want to delete this store?')">
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
