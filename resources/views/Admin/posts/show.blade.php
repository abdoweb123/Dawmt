@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.posts'))
@section('content')

    <table class="table">
        <tr>
            <td colspan="2" class="text-center">
                <img src="{{ asset($model->image ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file" height="100px">
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.title_ar'): </span>  {{ $model['title_ar'] }}
            </td>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.title_en'): </span>  {{ $model['title_en'] }}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.date'): </span> {!! $model['date'] !!}}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.desc_ar'): </span> {!! $model['desc_ar'] !!}}
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <span style="font-weight: bold">@lang('trans.desc_en'): </span> {!! $model['desc_en'] !!}}
            </td>
        </tr>
    </table>

@endsection
