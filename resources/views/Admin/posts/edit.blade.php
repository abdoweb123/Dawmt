@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.posts'))


@push('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush


@section('content')
    <form method="POST" action="{{ route('admin.posts.update',$model) }}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="text-center">
            <img src="{{ asset($model->image ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file"  height="100px">
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input id="title_ar" type="text" name="title_ar" required placeholder="@lang('trans.title_ar')" class="form-control" value="{{ $model['title_ar'] }}">
            </div>
            <div class="col-md-6">
                <label for="title_en">@lang('trans.title_en')</label>
                <input id="title_en" type="text" name="title_en" required placeholder="@lang('trans.title_en')" class="form-control" value="{{ $model['title_en'] }}">
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="file">{{ __('trans.file') }}</label>
                <input class="form-control w-100" id="file" type="file" name="image" onchange="document.getElementById('file').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="col-md-6">
                <label for="date">@lang('trans.date')</label>
                <input id="date" type="date" name="date" value="{{ $model['date'] ?? date('Y-m-d') }}" required placeholder="@lang('trans.date')" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="brief_desc_ar">@lang('dash.brief_desc_ar')</label>
                <textarea id="brief_desc_ar" type="text" name="brief_desc_ar" required placeholder="@lang('dash.brief_desc_ar')" class="form-control">{{ $model['brief_desc_ar'] }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="brief_desc_en">@lang('dash.brief_desc_en')</label>
                <textarea id="brief_desc_en" type="text" name="brief_desc_en" required placeholder="@lang('dash.brief_desc_en')" class="form-control">{{ $model['brief_desc_en'] }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="title_en">@lang('trans.desc_ar')</label>
                <textarea id="desc_ar" type="text" name="desc_ar" required placeholder="@lang('trans.desc_ar')" class="form-control editor">{!! $model['desc_ar'] !!}</textarea>
            </div>
            <div class="col-md-6">
                <label for="title_en">@lang('trans.desc_en')</label>
                <textarea id="desc_en" type="text" name="desc_en" required placeholder="@lang('trans.desc_en')" class="form-control editor">{!! $model['desc_en'] !!}</textarea>
            </div>
            <div class="col-md-6">
                <label class="d-flex justify-content-between">
                    <span>@lang('trans.publishers')</span>
                </label>
                <select class="form-control publishers single" name="publisher_id" required>
                    <option value="">@lang('dash.select_publisher')</option>
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}" {{ $model->publisher_id == $publisher->id ? 'selected' : ''  }}>{{ $publisher['title_'.lang()]  }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <div class="button-group my-4">
                    <button type="submit" class="main-btn btn-hover w-100 text-center">
                        {{ __('trans.Submit') }}
                    </button>
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