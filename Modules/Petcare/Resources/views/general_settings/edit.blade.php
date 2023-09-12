@extends('layout.master')
@section('title', 'Settings')
@push('style')
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        .toast-success {
            background-color: #28a745;
        }

        .toast-error {
            background-color: #dc3545;
        }

        .toast-title {
            color: #fff;
        }

        .toast-message {
            color: #333;
        }
    </style>
@endpush
@section('content')

    {!! breadcrumb([
        'title' => 'General Settings',
        route('dashboard') => __('common.Dashboard'),
        '#' => 'Update Settings',
    ]) !!}

    <form action="{{ route('general_settings.update') }}" id="update-settings-form" method="POST" enctype="multipart/form-data"
        class="forms-sample">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col">

                                <input type="text" name="name" id="name"
                                    class="form-control mb-4 mb-md-0 @error('name') is-invalid @enderror"
                                    value="{{ old('name', $settings->name) }}" placeholder="{{ __('Site Name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">

                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="{{ __('Contact Email') }}" value="{{ old('email', $settings->email) }}"
                                    required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="phone" id="phone" placeholder="{{ __('Phone') }}"
                                    class="form-control mb-4 mb-md-0 @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $settings->phone) }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="telepoh" id="telepoh" placeholder="{{ __('Telephone') }}"
                                    class="form-control @error('telepoh') is-invalid @enderror"
                                    value="{{ old('telepoh', $settings->telepoh) }}">
                                @error('telepoh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Logo Image') }}</label>

                                <input type="file" bl name="logo_image" class="myDropify" data-plugins="dropify"
                                    @if ($settings->logo_image) data-default-file="{{ asset('storage/' . $settings->logo_image) }}"
                                    @else
                                data-default-file="{{ asset('assets/images/placeholder.png') }}" @endif>
                                @error('logo_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Icon Image') }}</label>
                                <input type="file" name="icon" class="myDropify" data-plugins="dropify"
                                    @if ($settings->icon) data-default-file="{{ asset('storage/' . $settings->icon) }}"
                                @else
                            data-default-file="{{ asset('assets/images/placeholder.png') }}" @endif>
                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="copy_right" id="copy_right"
                                    placeholder="{{ __('Copy Right') }}"
                                    class="form-control @error('copy_right') is-invalid @enderror"
                                    value="{{ old('copy_right', $settings->copy_right) }}">
                                @error('copy_right')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Social Media:</h6>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input type="text" name="facebook" id="facebook" placeholder="{{ __('Facebook') }}"
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        value="{{ old('facebook', $settings->facebook) }}" />
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input type="text" name="tnstagram" id="tnstagram"
                                        placeholder="{{ __('Instagram') }}"
                                        class="form-control @error('tnstagram') is-invalid @enderror"
                                        value="{{ old('tnstagram', $settings->tnstagram) }}" />
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input type="text" name="tnapchat" id="tnapchat"
                                        placeholder="{{ __('Snapchat') }}"
                                        class="form-control @error('tnapchat') is-invalid @enderror"
                                        value="{{ old('tnapchat', $settings->tnapchat) }}" />
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <input type="text" name="twitter" id="twitter"
                                        placeholder="{{ __('Twitter') }}"
                                        class="form-control @error('twitter') is-invalid @enderror"
                                        value="{{ old('twitter', $settings->twitter) }}" />
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 mb-3">Update</button>
    </form>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#update-settings-form').on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: '{{ route('general_settings.update') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.success, 'Success');
                        } else {
                            if (response.errors) {
                                var errorMessages = Object.values(response.errors).join('<br>');
                                toastr.error(errorMessages, 'Error');
                            } else {
                                toastr.error('Error: An unexpected error occurred.', 'Error');
                            }
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
