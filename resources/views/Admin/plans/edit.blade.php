@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.plans'))

@push('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<form method="POST" action="{{ route('admin.plans.update',$model) }}" enctype="multipart/form-data" >
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
            <label for="desc_ar">@lang('trans.desc_ar')</label>
            <input id="desc_ar" type="text" name="desc_ar" required placeholder="@lang('trans.desc_ar')" class="form-control"  value="{{ $model['desc_ar'] }}">
        </div>
        <div class="col-md-6">
            <label for="desc_en">@lang('trans.desc_en')</label>
            <input id="desc_en" type="text" name="desc_en" required placeholder="@lang('trans.desc_en')" class="form-control"  value="{{ $model['desc_en'] }}">
        </div>
        <div class="col-md-6">
            <label class="d-flex justify-content-between">
                <span>@lang('trans.features')</span>
                <span class="point text-danger" id="select_all_features">@lang('trans.select_all')</span>
            </label>
            <select class="form-control features multiple" name="features[]" multiple>
                @foreach($features as $feature)
                    <option value="{{ $feature->id }}"
                            {{ in_array($feature->id, $selectedFeatures) ? 'selected' : '' }}>
                        {{ $feature['title_' . lang()] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="d-flex justify-content-between">
                <span>@lang('dash.advanced_features')</span>
                <span class="point text-danger" id="select_all_advanced_features">@lang('trans.select_all')</span>
            </label>
            <select class="form-control advanced_features multiple" name="advanced_features[]" multiple>
                @foreach($advancedFeatures as $advancedFeature)
                    <option value="{{ $advancedFeature->id }}"
                            {{ in_array($advancedFeature->id, $selectedFeatures) ? 'selected' : '' }}>
                        {{ $advancedFeature['title_' . lang()] }}
                    </option>
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
            placeholder: "select one",
            allowClear: true
        });
        $(".multiple").select2({
            placeholder: "@lang('dash.select_features')",
            allowClear: true
        });
    </script>
    <script>

        $(document).on('click', '#select_all_advanced_features', function() {
            $(".advanced_features option").prop("selected", true);
        });
        $(document).on('click', '#select_all_features', function() {
            $(".features option").prop("selected", true);
        });
    </script>
@endpush