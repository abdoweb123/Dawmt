@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.theModules'))
@section('content')

<table class="table">
    <tr>
        <td colspan="2" class="text-center" >
            <img src="{{ asset($module->image ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file" height="100px">
        </td>
    </tr>
    <tr>
        <td class="text-center">
           <span style="font-weight: bold">@lang('trans.title_ar'): </span>  {{ $module['title_ar'] }}
        </td>
        <td class="text-center">
           <span style="font-weight: bold">@lang('trans.title_en'): </span>  {{ $module['title_en'] }}
        </td>
    </tr>
    <tr>
        <td class="text-center">
            <span style="font-weight: bold">@lang('trans.desc_ar'): </span>  {{ $module['desc_ar'] }}
        </td>
        <td class="text-center">
            <span style="font-weight: bold">@lang('trans.desc_en'): </span>  {{ $module['desc_en'] }}
        </td>
    </tr>
    <tr>
        <td class="text-center">
            <span style="font-weight: bold">@lang('trans.scope_ar'): </span>  {{ $module['scope_ar'] }}
        </td>
        <td class="text-center">
            <span style="font-weight: bold">@lang('trans.scope_en'): </span>  {{ $module['scope_en'] }}
        </td>
    </tr>

</table>


@if(count($module->supports))
    <h4>@lang('trans.scope')</h4>
    <ul>
        @foreach($module->supports as $support)
            <li>
                {{ $support['title_'.lang()] }}
            </li>
        @endforeach
    </ul>
@endif

@endsection
