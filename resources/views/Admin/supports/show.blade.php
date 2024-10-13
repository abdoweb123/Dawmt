@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.supports'))
@section('content')

<table class="table">
    <tr>
        <td colspan="2" class="text-center">
            <img src="{{ asset($support->file ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file" height="100px">
        </td>
    </tr>
    <tr>
        <td class="text-center">
           <span style="font-weight: bold">@lang('trans.title_ar'): </span>  {{ $support['title_ar'] }}
        </td>
        <td class="text-center">
           <span style="font-weight: bold">@lang('trans.title_en'): </span>  {{ $support['title_en'] }}
        </td>
    </tr>
</table>

@endsection
