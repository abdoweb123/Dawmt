@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.employeeServices'))
@section('content')

<table class="table">
    <tr>
        <td colspan="2" class="text-center">
            <img src="{{ asset($employeeService->file ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file" height="100px">
        </td>
    </tr>
    <tr>
        <td class="text-center">
           <span style="font-weight: bold">@lang('trans.title_ar'): </span>  {{ $employeeService['title_ar'] }}
        </td>
        <td class="text-center">
           <span style="font-weight: bold">@lang('trans.title_en'): </span>  {{ $employeeService['title_en'] }}
        </td>
    </tr>
    <tr>
        <td class="text-center">
            <span style="font-weight: bold">@lang('trans.desc_ar'): </span>  {{ $employeeService['desc_ar'] }}
        </td>
        <td class="text-center">
            <span style="font-weight: bold">@lang('trans.desc_en'): </span>  {{ $employeeService['desc_en'] }}
        </td>
    </tr>
</table>

@endsection
