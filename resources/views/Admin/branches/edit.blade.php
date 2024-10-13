@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.branch'))
@section('content')
<form method="POST" action="{{ route('admin.branches.update',$Branch) }}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class="row">

        <div class="form-group col-md-6">
            <label for="title_ar">@lang('trans.title_ar')</label>
            <input type="text" name="title_ar" id="title_ar" class="form-control" required value="{{ $Branch['title_ar'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="title_en">@lang('trans.title_en')</label>
            <input type="text" name="title_en" id="title_en" class="form-control" required value="{{ $Branch['title_en'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="google_map_link">@lang('trans.google_map_link')</label>
            <input type="text" name="google_map_link" id="google_map_link" class="form-control" required value="{{ $Branch['google_map_link'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="phone">@lang('trans.phone')</label>
            <input type="text" name="phone" id="phone" class="form-control" required value="{{ $Branch['phone'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="visibility">@lang('trans.visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option {{ $Branch['status'] == 1 ? 'selected' : '' }} value="1">@lang('trans.visible')</option>
                <option {{ $Branch['status'] == 0 ? 'selected' : '' }} value="0">@lang('trans.hidden')</option>
            </select>
        </div>


        <div class="clearfix"></div>
        <div class="col-12 my-4">
            <div class="button-group">
                <button type="submit" class="main-btn btn-hover w-100 text-center">
                    {{ __('trans.Submit') }}
                </button>
            </div>
        </div>
    </div>
</form>
@endsection