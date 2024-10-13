@extends(ucfirst(activeGuard()).'.Layouts.layout')
@section('pagetitle', __('trans.products'))
@section('content')


<div class="row">
    <div class="my-2 col-6">
        <a href="{{ route(activeGuard() . '.products.create') }}" class="main-btn  px-5">@lang('trans.add_new')</a>
    </div>
</div>
<table class="table table-bordered data-table-modules">
    <thead>
        <tr class="text-center">
            <th>#</th>
            <th>@lang('trans.title')</th>
            <th>@lang('trans.image')</th>
            <th>@lang('trans.visibility')</th>
            <th></th>
        </tr>
    </thead>
    <tbody data-table="products">
        @foreach ($Models as $Model)
        <tr data-id="{{ $Model->id }}" data-position="{{ $Model->arrangement }}">
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ route(activeGuard() . '.products.edit', $Model) }}">{{ $Model->title() }}</a></td>
            <td class="text-center">
                <img src="{{ asset($Model->Images->first()?->image ?? setting('logo')) }}" style="max-width: 100px;">
            </td>
            <td>
                <input class="toggle" type="checkbox" onclick="toggleswitch({{ $Model->id }},'products')" @if ($Model->status) checked @endif>
            </td>
            <td>
                <a href="{{ route(activeGuard() . '.products.edit', $Model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route(activeGuard() . '.products.destroy', $Model) }}">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete">
                        <i class="fa-solid fa-eraser"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
