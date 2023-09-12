@extends('layout.master')
@section('title', @$data['title'])
@push('plugin-styles')
     <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
     <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
  
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    
@endpush
@section('content')
    {!! breadcrumb([
        'title' => @$data['title'],
        route('dashboard') => __('common.Dashboard'),
        '#' => @$data['title'],
    ]) !!}


    <form id="service-form" method="POST" action="{{ route('services.store')}}"  enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card ot-card">
                    <div class="card-body">

                        <div class="row mb-3">
                            <input type="text" name="name" class="form-control ot-form-control ot-input"
                                id="name" aria-describedby="name" required
                                placeholder="{{ __('common.Service_Name') }}">
                            <span class="validation-msg name text-danger" id="name-error"></span>
                        </div>
                        <div class="row mb-3">
                            <select name="type" required
                                class="select2-input ot-input mb-3 modal_select2 form-control form-control-lg"
                                id="type">
                                <option><span class="text-muted">{{ __('common.Service_Type') }} *</span></option>
                              @foreach ($data['services_type'] as $type)
                                <option value="{{$type}}">{{ __('common.'.$type) }}</option>                                  
                              @endforeach
                            </select>
                        </div>



                        <div class="row mb-3">

                            <label class="form-label">{{ __('common.Service Details') }}</label>
                            <textarea class="form-control h-100 p-0 border-0 rounded-0 ckeditor" id="editor" name="service_details"
                                style="width: 100%"></textarea>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('common.Service Image') }}</label>
                            <input type="file" id="myDropify" data-plugins="dropify" data-default-file="{{ asset('assets/images/placeholder.png') }}"  />
                         </div>


                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" name="code" class="form-control" id="code"
                                placeholder="{{ __('common.Service Code') }}"
                                aria-label="{{ __('common.Service Code') }}" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="service-code"
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="{{ __('common.Generate') }}"> <i data-feather="refresh-ccw"></i>
                            </button>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('common.Additional Services') }}</label>
                            <div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ __('common.No Additional Service') }}
                                    </label>
                                </div>



                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ __('common.Additional Outside play time') }}
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ __('common.Bath after Boarding') }}
                                    </label>
                                </div>


                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ __('common.NO scented cream rinse with bath (FREE)') }}
                                    </label>
                                </div>


                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ __('common.Bath after Boarding') }}
                                    </label>
                                </div>


                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">


                                        {{ __('common.Nail Trim') }}
                                    </label>
                                </div>


                            </div>
                        </div>

                        <div class="mb-3">
                            <select name="tax_id"
                                class="form-select form-select-lg select2-input ot-input mb-3 modal_select2">
                                <option>{{ __('common.Service Tax') }}</option>

                                <option value="">No Tax</option>
                                @foreach ($data['tax_list'] as $tax)
                                    <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="number" name="price" required
                                class="form-control form-control-lg ot-form-control ot-input"
                                placeholder="{{ __('common.Service Price') }}" step="any">
                            <span class="validation-msg price text-danger"></span>

                            <div class="form-group">
                                <input type="hidden" name="qty" value="0.00">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    {{ __('common.Featured') }}
                                </label>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="row mt-3 mx-1">
                    <button type="submit" class="btn btn-primary btn-lg">{{ __('common.Create_Service') }}</button>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}">
    </script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
     <script src="{{ asset('assets/js/dropify.js') }}"></script>
     <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/timepicker.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript">
        CKEDITOR.replace('editor', {
            width: '100%'

        });
    </script>
@endpush


 
