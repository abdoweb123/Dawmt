@extends('Admin.Layouts.layout')

@section('pagetitle', __('trans.videos'))

@section('content')
<div class="row">
    <div class="my-2 col-4 text-sm-start">
        <a href="{{ route(activeGuard().'.settings.index','videos') }}" class="main-btn">@lang('trans.variables')</a>
    </div>
    <div class="my-2 col-4 text-sm-start">
        <a href="{{ route('admin.videos.create') }}" class="main-btn">@lang('trans.add_new')</a>
    </div>
    <div class="my-2 col-4 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('videos')" class="btn btn-danger" disabled>@lang('trans.Delete_Selected')</button>
    </div>
</div>


<table class="table table-bordered data-table">
    <thead>
    <tr>
        <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
        <th>#</th>
        <th>@lang('trans.name')</th>
        <th>@lang('trans.file')</th>
        <th>@lang('trans.most_popular')</th>
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
            <td>{{ $model['title_' . lang()] }}</td>
            <td>
                <img src="{{ asset($model->cover_image ?? setting('logo')) }}" style="max-width: 100px;">
            </td>
            <td>
                <input class="toggle" type="checkbox" onclick="togglesMostPopular({{ $model->id }}, 'videos')" @if ($model->most_popular) checked @endif>
            </td>
            <td>
                <input class="toggle" type="checkbox" onclick="toggleswitch({{ $model->id }}, 'videos')" @if ($model->status) checked @endif>
            </td>
            <td>
                <a href="{{ route('admin.videos.show', $model) }}"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.videos.edit', $model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.videos.destroy', $model) }}">
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

@push('js')
    <script>
        function togglesMostPopular(videoId) {
            $.ajax({
                url: '{{ route("admin.video.updateMostPopular", ":id") }}'.replace(':id', videoId), // Replace :id with the actual videoId
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token for security
                },
                success: function(response) {
                    if (response.success) {
                        // Optionally, you can display a success message
                        swal({ title: "Success", icon: "success", buttons: false, dangerMode: false, timer: 1500 });
                    } else {
                        // Handle failure (if necessary)
                        swal({ title: "Error", icon: "warning", buttons: true, dangerMode: true });
                    }
                },
                error: function(xhr) {
                    // Handle errors
                   swal({ title: "Error", icon: "warning", buttons: true, dangerMode: true });
                }
            });
        }
    </script>
@endpush