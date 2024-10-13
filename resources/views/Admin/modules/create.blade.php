@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.theModules'))


@push('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<form method="POST" action="{{ route('admin.modules.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="text-center">
        <img src="{{ asset(setting('logo')) }}" class="rounded mx-auto text-center" id="file"  height="100px">
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="title_ar">@lang('trans.title_ar')</label>
            <input id="title_ar" type="text" name="title_ar" required placeholder="@lang('trans.title_ar')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="title_en">@lang('trans.title_en')</label>
            <input id="title_en" type="text" name="title_en" required placeholder="@lang('trans.title_en')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="title_ar">@lang('trans.desc_ar')</label>
            <input id="title_ar" type="text" name="desc_ar" required placeholder="@lang('trans.desc_ar')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="title_en">@lang('trans.desc_en')</label>
            <input id="title_en" type="text" name="desc_en" required placeholder="@lang('trans.desc_en')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="title_ar">@lang('trans.scope_ar')</label>
            <input id="title_ar" type="text" name="scope_ar" required placeholder="@lang('trans.scope_ar')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="title_en">@lang('trans.scope_en')</label>
            <input id="title_en" type="text" name="scope_en" required placeholder="@lang('trans.scope_en')" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="d-flex justify-content-between">
                <span>@lang('trans.supports')</span>
                <span class="point text-danger" id="select_all_items">@lang('trans.select_all')</span>
            </label>
            <select class="form-control Multi-Select select2" name="supports[]" id="items" multiple>
                @foreach($supports as $support)
                    <option value="{{ $support->id }}">{{ $support->title() }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-12">
            <label for="file">{{ __('trans.file') }}</label>
            <input class="form-control w-100" id="file" type="file" name="image" onchange="document.getElementById('file').src = window.URL.createObjectURL(this.files[0])" required>
        </div>

        <div class="row">
            <div class="col-sm-12 my-4">
                <div class="text-center p-20">
                    <button type="submit" class="main-btn">{{ __('trans.add') }}</button>
                    <button type="reset" class="btn btn-secondary">{{ __('trans.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('js')
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#items').select2({
                placeholder: 'Select items',
                allowClear: true,
                width: '100%'
            });
        });
    </script>

    <script>
        $(document).on('change', '#type', function() {
            $("#branches option:selected").prop("selected", false);
            $('.Multi-Select').trigger('change.select2');
            if($( "#type option:selected" ).val() == 'branch'){
                $( ".branches" ).removeClass('d-none');
            }else{
                $( ".branches" ).addClass('d-none');
            }
        });

        $(document).on('click', '#select_all_items', function() {
            $("#items option").prop("selected", true);
            $('.Multi-Select').trigger('change.select2');
        });
    </script>

@endpush