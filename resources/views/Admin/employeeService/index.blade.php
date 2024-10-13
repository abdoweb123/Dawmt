@extends('Admin.Layouts.layout')

@section('pagetitle', __('trans.employeeServices'))
@section('content')

<div class="row">
    <div class="my-2 col-4 text-sm-start">
        <a href="{{ route(activeGuard().'.settings.index','ess_application') }}" class="main-btn">@lang('trans.variables')</a>
    </div>
    <div class="my-2 col-4 text-sm-start">
        <a href="{{ route('admin.employeeServices.create') }}" class="main-btn">@lang('trans.add_new')</a>
    </div>
    <div class="my-2 col-4 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('employee_services')" class="btn btn-danger" disabled>@lang('trans.Delete_Selected')</button>
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
        @foreach ($employeeServices as $employeeService)
        <tr>
            <td>
                <input type="checkbox" class="DTcheckbox" value="{{ $employeeService->id }}">
            </td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $employeeService->title_ar }}</td>
            <td>{{ $employeeService->title_en }}</td>
            <td>
                <input class="toggle" type="checkbox" onclick="toggleswitch({{ $employeeService->id }},'employee_services')" @if ($employeeService->status) checked @endif>
            </td>
            <td>
                <a href="{{ route('admin.employeeServices.show', $employeeService) }}"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.employeeServices.edit', $employeeService) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.employeeServices.destroy', $employeeService) }}">
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
    {{ $employeeServices->links() }}
</table>

@endsection
