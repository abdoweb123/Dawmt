@extends('Admin.Layouts.layout')
@section('pagetitle', $Branch->title())
@section('content')
    <table class="table">
        <tr class="d-flex justify-content-around">
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.title_ar'): </span>  {{ $Branch['title_ar'] }}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.title_en'): </span>  {{ $Branch['title_en'] }}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.phone'): </span>  {{ $Branch['phone'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.google_map_link'): </span>  {{ $Branch['google_map_link'] }}
            </td>
        </tr>

    </table>
@endsection
