@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.jobs'))
@section('content')

    <table class="table">
        <tr>
            <td colspan="2" class="text-center">
                <img src="{{ asset($model->file ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file" height="100px">
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.title_ar'): </span> {{ $model['title_ar'] }}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.title_en'): </span> {{ $model['title_en'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.general_desc_ar'): </span> {{ $model['general_desc_ar'] }}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.general_desc_en'): </span> {{ $model['general_desc_en'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.desc_ar'): </span> {!! $model['desc_ar'] !!}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.desc_en'): </span> {!! $model['desc_en'] !!}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.employment_type_ar'): </span> {{ $model['employment_type_ar'] }}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.employment_type_en'): </span> {{ $model['employment_type_en'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.work_place_type_ar'): </span> {{ $model['work_place_type_ar'] }}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.work_place_type_en'): </span> {{ $model['work_place_type_en'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.salary_ar'): </span> {{ $model['salary_ar'] }}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.salary_en'): </span> {{ $model['salary_en'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.experience_required_ar'): </span> {{ $model['experience_required_ar'] }}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.experience_required_en'): </span> {{ $model['experience_required_en'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.location_ar'): </span> {{ $model['location_ar'] }}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('dash.location_en'): </span> {{ $model['location_en'] }}
            </td>
        </tr>
    </table>

@endsection
