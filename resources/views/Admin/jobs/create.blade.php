@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.jobs'))

@push('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<form method="POST" action="{{ route('admin.jobs.store') }}" enctype="multipart/form-data">
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
            <label for="title_en">@lang('dash.general_desc_ar')</label>
            <textarea id="general_desc_ar" type="text" name="general_desc_ar" required placeholder="@lang('dash.general_desc_ar')" class="form-control"></textarea>
        </div>
        <div class="col-md-6">
            <label for="title_en">@lang('dash.general_desc_en')</label>
            <textarea id="general_desc_en" type="text" name="general_desc_en" required placeholder="@lang('dash.general_desc_en')" class="form-control"></textarea>
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
            <label for="employment_type_ar">@lang('dash.employment_type_ar')</label>
            <input id="employment_type_ar" type="text" name="employment_type_ar" required placeholder="@lang('dash.employment_type_ar')" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="employment_type_en">@lang('dash.employment_type_en')</label>
            <input id="employment_type_en" type="text" name="employment_type_en" required placeholder="@lang('dash.employment_type_en')" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="work_place_type_ar">@lang('dash.work_place_type_ar')</label>
            <input id="work_place_type_ar" type="text" name="work_place_type_ar" required placeholder="@lang('dash.work_place_type_ar')" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="work_place_type_en">@lang('dash.work_place_type_en')</label>
            <input id="work_place_type_en" type="text" name="work_place_type_en" required placeholder="@lang('dash.work_place_type_en')" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="salary_ar">@lang('dash.salary_ar')</label>
            <input id="salary_ar" type="text" name="salary_ar" required placeholder="@lang('dash.salary_ar')" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="salary_en">@lang('dash.salary_en')</label>
            <input id="salary_en" type="text" name="salary_en" required placeholder="@lang('dash.salary_en')" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="experience_required_ar">@lang('dash.experience_required_ar')</label>
            <input id="experience_required_ar" type="text" name="experience_required_ar" required placeholder="@lang('dash.experience_required_ar')" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="experience_required_en">@lang('dash.experience_required_en')</label>
            <input id="experience_required_en" type="text" name="experience_required_en" required placeholder="@lang('dash.experience_required_en')" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="location_ar">@lang('dash.location_ar')</label>
            <input id="location_ar" type="text" name="location_ar" required placeholder="@lang('dash.location_ar')" class="form-control">
        </div>

        <div class="col-md-6">
            <label for="location_en">@lang('dash.location_en')</label>
            <input id="location_en" type="text" name="location_en" required placeholder="@lang('dash.location_en')" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="d-flex justify-content-between">
                <span>@lang('trans.skills')</span>
                <span class="point text-danger" id="select_all_skills">@lang('trans.select_all')</span>
            </label>
            <select class="form-control skills multiple" name="skills[]" multiple>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill['title_'.lang()]  }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
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
            placeholder: "select one",
            allowClear: true
        });
        $(".multiple").select2({
            placeholder: "@lang('dash.select_skills')",
            allowClear: true
        });
    </script>
    <script>

        $(document).on('click', '#select_all_skills', function() {
            $(".skills option").prop("selected", true);
        });
    </script>
@endpush