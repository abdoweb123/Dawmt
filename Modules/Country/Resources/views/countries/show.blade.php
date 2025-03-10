@extends(ucfirst(activeGuard()).'.Layouts.layout')

@section('pagetitle', $Country->title())
@section('content')

<div class="row">
    <div class="my-2 col-12 col-md-6">
        <a href="{{ route(activeGuard().'.country.regions.create',$Country) }}" class="main-btn btn-hover text-center mx-auto px-5">@lang('trans.add_new') <i class="fa-solid fa-plus mx-1"></i></a>
    </div>
</div>
<h1>@lang('trans.regions')</h1>
<table class="table dataTable  data-table">
    <thead>
        <tr>
            <th>#</th>
            <th>@lang('trans.title')</th>
            <th>@lang('trans.delivery_cost')</th>
            <th>@lang('trans.visibility')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Country->Regions as $Region)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a  href="{{ route(activeGuard().'.country.regions.show', ['country'=>$Country,'region'=>$Region]) }}">{{ $Region->title() }}</a></td>
            <td>{{ $Region->delivery_cost }}</td>
            <td>
                <input class="toggle" type="checkbox" onclick="toggleswitch({{ $Region->id }},'countries')" @if ($Region->status) checked @endif>
            </td>
            <td>
                <a href="{{ route(activeGuard().'.country.regions.edit', ['country'=>$Country,'region'=>$Region,]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route(activeGuard().'.country.regions.destroy', ['country'=>$Country,'region'=>$Region,]) }}">
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
</table>

@endsection
