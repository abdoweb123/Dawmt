@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.features'))
@section('content')
<form method="POST" action="{{ route('admin.features.update',$model) }}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class="text-center">
        <img src="{{ asset(setting('logo')) }}" class="rounded mx-auto text-center" id="file"  height="100px">
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
            <label for="title_en">@lang('trans.type')</label>
            <select name="type" id="type" class="form-control">
                <option value="normal" {{ $model['type'] == 'normal' ? 'selected' : '' }}>@lang('trans.normal')</option>
                <option value="advanced" {{ $model['type'] == 'advanced' ? 'selected' : '' }}>@lang('trans.advanced')</option>
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
