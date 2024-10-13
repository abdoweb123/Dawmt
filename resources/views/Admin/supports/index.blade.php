@extends('Admin.Layouts.layout')

@section('pagetitle', __('trans.supports'))
@section('content')

<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.supports.create') }}" class="main-btn">@lang('trans.add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('supports')" class="btn btn-danger" disabled>@lang('trans.Delete_Selected')</button>
    </div>
</div>
<table class="table table-bordered data-table" >
    <thead>
        <tr>
            <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
            <th>#</th>
            <th>@lang('trans.title_ar')</th>
            <th>@lang('trans.title_en')</th>
            <th>@lang('trans.status')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($supports as $support)
        <tr>
            <td>
                <input type="checkbox" class="DTcheckbox" value="{{ $support->id }}">
            </td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $support->title_ar }}</td>
            <td>{{ $support->title_en }}</td>
            <td>
                <input class="toggle" type="checkbox" onclick="toggleswitch({{ $support->id }},'supports')" @if ($support->status) checked @endif>
            </td>
            <td>
                <a href="{{ route('admin.supports.show', $support) }}"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.supports.edit', $support) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.supports.destroy', $support) }}">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete">
                        <i class="fa-solid fa-eraser"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $supports->links() }}
</table>

@endsection
