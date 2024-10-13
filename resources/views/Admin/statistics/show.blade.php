@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.statistics'))
@section('content')

<table class="table">
    <tr>
        <td colspan="2" class="text-center" >
            <img src="{{ asset(setting('logo')) }}" class="rounded mx-auto text-center" id="file" height="100px">
        </td>
    </tr>
    <tr>
        <td class="text-center">
           <span style="font-weight: bold">@lang('trans.theNumber'): </span>  {{ $statistic['number'] }}
        </td>
    </tr>
    <tr>
        <td class="text-center">
           <span style="font-weight: bold">@lang('trans.title_ar'): </span>  {{ $statistic['title_ar'] }}
        </td>
        <td class="text-center">
           <span style="font-weight: bold">@lang('trans.title_en'): </span>  {{ $statistic['title_en'] }}
        </td>
    </tr>
    <tr>
        <td class="text-center">
            <span style="font-weight: bold">@lang('trans.desc_ar'): </span>  {{ $statistic['desc_ar'] }}
        </td>
        <td class="text-center">
            <span style="font-weight: bold">@lang('trans.desc_en'): </span>  {{ $statistic['desc_en'] }}
        </td>
    </tr>

</table>

@endsection
