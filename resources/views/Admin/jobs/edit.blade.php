@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.jobs'))

@push('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<form method="POST" action="{{ route('admin.jobs.update',$model) }}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class="text-center">
        <img src="{{ asset($model->file ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file"  height="100px">
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
            <label for="general_desc_ar">@lang('dash.general_desc_ar')</label>
            <textarea id="general_desc_ar" name="general_desc_ar" required placeholder="@lang('dash.general_desc_ar')" class="form-control">{{ $model['general_desc_ar'] }}</textarea>
        </div>

        <div class="col-md-6">
            <label for="general_desc_en">@lang('dash.general_desc_en')</label>
            <textarea id="general_desc_en" name="general_desc_en" required placeholder="@lang('dash.general_desc_en')" class="form-control">{{ $model['general_desc_en'] }}</textarea>
        </div>

        <div class="col-md-6">
            <label for="desc_ar">@lang('trans.desc_ar')</label>
            <textarea id="desc_ar" name="desc_ar" required placeholder="@lang('trans.desc_ar')" class="form-control editor">{{ $model['desc_ar'] }}</textarea>
        </div>

        <div class="col-md-6">
            <label for="desc_en">@lang('trans.desc_en')</label>
            <textarea id="desc_en" name="desc_en" required placeholder="@lang('trans.desc_en')" class="form-control editor">{{ $model['desc_en'] }}</textarea>
        </div>

        <div class="col-md-6">
            <label for="employment_type_ar">@lang('dash.employment_type_ar')</label>
            <input id="employment_type_ar" type="text" name="employment_type_ar" required placeholder="@lang('dash.employment_type_ar')" class="form-control" value="{{ $model['employment_type_ar'] }}">
        </div>

        <div class="col-md-6">
            <label for="employment_type_en">@lang('dash.employment_type_en')</label>
            <input id="employment_type_en" type="text" name="employment_type_en" required placeholder="@lang('dash.employment_type_en')" class="form-control" value="{{ $model['employment_type_en'] }}">
        </div>

        <div class="col-md-6">
            <label for="work_place_type_ar">@lang('dash.work_place_type_ar')</label>
            <input id="work_place_type_ar" type="text" name="work_place_type_ar" required placeholder="@lang('dash.work_place_type_ar')" class="form-control" value="{{ $model['work_place_type_ar'] }}">
        </div>

        <div class="col-md-6">
            <label for="work_place_type_en">@lang('dash.work_place_type_en')</label>
            <input id="work_place_type_en" type="text" name="work_place_type_en" required placeholder="@lang('dash.work_place_type_en')" class="form-control" value="{{ $model['work_place_type_en'] }}">
        </div>

        <div class="col-md-6">
            <label for="salary_ar">@lang('dash.salary_ar')</label>
            <input id="salary_ar" type="text" name="salary_ar" required placeholder="@lang('dash.salary_ar')" class="form-control" value="{{ $model['salary_ar'] }}">
        </div>

        <div class="col-md-6">
            <label for="salary_en">@lang('dash.salary_en')</label>
            <input id="salary_en" type="text" name="salary_en" required placeholder="@lang('dash.salary_en')" class="form-control" value="{{ $model['salary_en'] }}">
        </div>

        <div class="col-md-6">
            <label for="experience_required_ar">@lang('dash.experience_required_ar')</label>
            <input id="experience_required_ar" type="text" name="experience_required_ar" required placeholder="@lang('dash.experience_required_ar')" class="form-control" value="{{ $model['experience_required_ar'] }}">
        </div>

        <div class="col-md-6">
            <label for="experience_required_en">@lang('dash.experience_required_en')</label>
            <input id="experience_required_en" type="text" name="experience_required_en" required placeholder="@lang('dash.experience_required_en')" class="form-control" value="{{ $model['experience_required_en'] }}">
        </div>

        <div class="col-md-6">
            <label for="location_ar">@lang('dash.location_ar')</label>
            <input id="location_ar" type="text" name="location_ar" required placeholder="@lang('dash.location_ar')" class="form-control" value="{{ $model['location_ar'] }}">
        </div>

        <div class="col-md-6">
            <label for="location_en">@lang('dash.location_en')</label>
            <input id="location_en" type="text" name="location_en" required placeholder="@lang('dash.location_en')" class="form-control" value="{{ $model['location_en'] }}">
        </div>

        <div class="col-md-6">
            <label class="d-flex justify-content-between">
                <span>@lang('trans.skills')</span>
                <span class="point text-danger" id="select_all_skills">@lang('trans.select_all')</span>
            </label>
            <select class="form-control skills multiple" name="skills[]" multiple>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}"{{ in_array($skill->id, $selectedSkills) ? 'selected' : '' }}>
                        {{ $skill['title_' . lang()] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
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