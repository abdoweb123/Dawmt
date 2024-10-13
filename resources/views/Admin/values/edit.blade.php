@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.values'))


@section('content')
<form method="POST" action="{{ route('admin.values.update',$model) }}" enctype="multipart/form-data" >
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
        <div class="col-md-6">
            <label for="desc_ar">@lang('trans.desc_ar')</label>
            <input id="desc_ar" type="text" name="desc_ar" required placeholder="@lang('trans.desc_ar')" class="form-control"  value="{{ $model['desc_ar'] }}">
        </div>
        <div class="col-md-6">
            <label for="desc_en">@lang('trans.desc_en')</label>
            <input id="desc_en" type="text" name="desc_en" required placeholder="@lang('trans.desc_en')" class="form-control"  value="{{ $model['desc_en'] }}">
        </div>
        <div class="col-md-6 col-sm-12">
            <label for="file">{{ __('trans.file') }}</label>
            <input class="form-control w-100" id="file" type="file" name="image" onchange="document.getElementById('file').src = window.URL.createObjectURL(this.files[0])">
        </div>
        <div class="col-md-6">
            <label for="show_style">@lang('dash.show_style')</label>
            <select name="show_type" class="form-control">
                <option value="normal" {{ $model->show_type == 'normal' ? 'selected' : '' }}>@lang('dash.normal')</option>
                <option value="full" {{ $model->show_type == 'full' ? 'selected' : '' }}>@lang('dash.full')</option>
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


