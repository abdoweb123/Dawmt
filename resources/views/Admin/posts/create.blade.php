@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.posts'))

@push('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush


@section('content')
<form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
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
        <div class="col-md-6 col-sm-12">
            <label for="file">{{ __('trans.image') }}</label>
            <input class="form-control w-100" id="file" type="file" name="image" onchange="document.getElementById('file').src = window.URL.createObjectURL(this.files[0])" required>
        </div>
        <div class="col-md-6">
            <label for="date">@lang('trans.date')</label>
            <input id="date" type="date" name="date" value="{{ date('Y-m-d') }}" required placeholder="@lang('trans.date')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="brief_desc_ar">@lang('dash.brief_desc_ar')</label>
            <textarea id="brief_desc_ar" type="text" name="brief_desc_ar" required placeholder="@lang('dash.brief_desc_ar')" class="form-control"></textarea>
        </div>
        <div class="col-md-6">
            <label for="brief_desc_en">@lang('dash.brief_desc_en')</label>
            <textarea id="brief_desc_en" type="text" name="brief_desc_en" required placeholder="@lang('dash.brief_desc_en')" class="form-control"></textarea>
        </div>
        <div class="col-md-6">
            <label for="title_en">@lang('trans.desc_ar')</label>
            <textarea id="desc_ar" type="text" name="desc_ar" required placeholder="@lang('trans.desc_ar')" class="form-control editor"></textarea>
        </div>
        <div class="col-md-6">
            <label for="title_en">@lang('trans.desc_en')</label>
            <textarea id="desc_en" type="text" name="desc_en" required placeholder="@lang('trans.desc_en')" class="form-control editor"></textarea>
        </div>
        <div class="col-md-6">
            <label class="d-flex justify-content-between">
                <span>@lang('trans.publishers')</span>
            </label>
            <select class="form-control publishers single" name="publisher_id" required>
                <option value="">@lang('dash.select_publisher')</option>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher['title_'.lang()]  }}</option>
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
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(".single").select2({
            placeholder: "@lang('dash.select_publisher')",
            allowClear: true
        });
        $(".multiple").select2({
            placeholder: "@lang('dash.select_publisher')",
            allowClear: true
        });
    </script>
    <script>

        $(document).on('click', '#select_all_publishers', function() {
            $(".publishers option").prop("selected", true);
        });
    </script>
@endpush