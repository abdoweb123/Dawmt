@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.statistics'))

@section('content')
<form method="POST" action="{{ route('admin.statistics.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="text-center">
        <img src="{{ asset(setting('logo')) }}" class="rounded mx-auto text-center" id="file"  height="100px">
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="title_ar">@lang('trans.theNumber')</label>
            <input id="title_ar" type="text" name="number" required placeholder="@lang('trans.theNumber')" class="form-control">
        </div>
        <div class="col-md-6">
        </div>
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
