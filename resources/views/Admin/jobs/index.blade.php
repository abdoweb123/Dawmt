@extends('Admin.Layouts.layout')

@section('pagetitle', __('trans.jobs'))
@section('content')

<div class="row">
    <div class="my-2 col-4 text-sm-start">
        <a href="{{ route(activeGuard().'.settings.index','jobs') }}" class="main-btn">@lang('trans.variables')</a>
    </div>
    <div class="my-2 col-4 text-sm-start">
        <a href="{{ route('admin.jobs.create') }}" class="main-btn">@lang('trans.add_new')</a>
    </div>
    <div class="my-2 col-4 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('jobs')" class="btn btn-danger" disabled>@lang('trans.Delete_Selected')</button>
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
        @foreach ($models as $model)
        <tr>
            <td>
                <input type="checkbox" class="DTcheckbox" value="{{ $model->id }}">
            </td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $model->title_ar }}</td>
            <td>{{ $model->title_en }}</td>
            <td>
                <input class="toggle" type="checkbox" onclick="toggleswitch({{ $model->id }},'jobs')" @if ($model->status) checked @endif>
            </td>
            <td>
                <a href="{{ route('admin.jobs.show', $model) }}"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.jobs.edit', $model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.jobs.destroy', $model) }}">
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
    {{ $models->links() }}
</table>

@endsection
