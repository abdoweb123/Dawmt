@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.publishers'))
@section('content')

<table class="table">
    <tr>
        <td colspan="2" class="text-center">
            <img src="{{ asset($model->file ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file" height="100px">
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
</table>

@endsection
