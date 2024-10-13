@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.packages'))


@push('css')
    <!-- Latest Select2 CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
@endpush

@section('content')
<form method="POST" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="text-center">
        <img src="{{ asset(setting('logo')) }}" class="rounded mx-auto text-center" id="file"  height="200px">
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
            <label for="old_price">@lang('trans.old_price')</label>
            <input id="old_price" type="number" name="old_price" required placeholder="@lang('trans.old_price')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="price">@lang('trans.price')</label>
            <input id="price" type="number" name="price" required placeholder="@lang('trans.price')" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="d-flex justify-content-between">
                <span>@lang('trans.items')</span>
                <span class="point text-danger" id="select_all_items">@lang('trans.select_all')</span>
            </label>
            <select class="form-control Multi-Select select2" name="items[]" id="items" multiple>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->title() }} </option>
                @endforeach
            </select>
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
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

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