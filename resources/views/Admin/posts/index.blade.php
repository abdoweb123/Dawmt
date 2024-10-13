@extends('Admin.Layouts.layout')

@section('pagetitle', __('trans.posts'))

@section('content')
<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.posts.create') }}" class="main-btn">@lang('trans.add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('posts')" class="btn btn-danger" disabled>@lang('trans.Delete_Selected')</button>
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
        <th>@lang('dash.show_in_top')</th>
        <th>@lang('dash.show_in_head')</th>
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
                <img src="{{ asset($model->image ?? setting('logo')) }}" style="max-width: 100px;">
            </td>
            <td>
                <input class="toggle" type="checkbox" onclick="togglesMostPopular({{ $model->id }}, 'posts')" @if ($model->most_popular) checked @endif>
            </td>
            <td>
                <input type="checkbox" name="show_in_top" value="{{ $model->id }}" onclick="toggleShowInTop(this, {{ $model->id }})" @if ($model->show_in_top) checked @endif>
            </td>
            <td>
                <!-- Radio for 'show_in_head' with the same name for all rows -->
                <input type="checkbox" name="show_in_head" value="{{ $model->id }}" onclick="toggleShowInHead(this, {{ $model->id }})" @if ($model->show_in_head) checked @endif>
            </td>
            <td>
                <input class="toggle" type="checkbox" onclick="toggleswitch({{ $model->id }}, 'posts')" @if ($model->status) checked @endif>
            </td>
            <td>
                <a href="{{ route('admin.posts.show', $model) }}"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('admin.posts.edit', $model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <form class="formDelete" method="POST" action="{{ route('admin.posts.destroy', $model) }}">
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
        // Update the most popular status
        function togglesMostPopular(postId) {
            $.ajax({
                url: '{{ route("admin.post.updateMostPopular", ":id") }}'.replace(':id', postId), // Replace :id with the actual postId
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



        function toggleShowInTop(checkbox, id) {
            // Get all checkboxes for 'show_in_top'
            const checkboxes = document.querySelectorAll('input[name="show_in_top"]');

            // If this checkbox is checked and we have only one checkbox checked
            if (checkbox.checked) {
                // Call the AJAX function to update the server for the checked box
                updateShowInTop(id, 1);
            } else {
                // Check if at least one other checkbox is checked
                let isAnyChecked = Array.from(checkboxes).some(cb => cb.checked);
                if (!isAnyChecked) {
                    // Prevent unchecking this checkbox
                    checkbox.checked = true; // Re-check it
                    return;
                }
                // Call the AJAX function to update the server for the unchecked box
                updateShowInTop(id, 0);
            }

            // Uncheck all checkboxes except the one that was clicked
            checkboxes.forEach(cb => {
                if (cb !== checkbox && checkbox.checked) {
                    cb.checked = false;
                    updateShowInTop(cb.value, 0); // Set to 0
                }
            });
        }

        function toggleShowInHead(checkbox, id) {
            // Get all checkboxes for 'show_in_head'
            const checkboxes = document.querySelectorAll('input[name="show_in_head"]');

            // If this checkbox is checked and we have only one checkbox checked
            if (checkbox.checked) {
                // Call the AJAX function to update the server for the checked box
                updateShowInHead(id, 1);
            } else {
                // Check if at least one other checkbox is checked
                let isAnyChecked = Array.from(checkboxes).some(cb => cb.checked);
                if (!isAnyChecked) {
                    // Prevent unchecking this checkbox
                    checkbox.checked = true; // Re-check it
                    return;
                }
                // Call the AJAX function to update the server for the unchecked box
                updateShowInHead(id, 0);
            }

            // Uncheck all checkboxes except the one that was clicked
            checkboxes.forEach(cb => {
                if (cb !== checkbox && checkbox.checked) {
                    cb.checked = false;
                    updateShowInHead(cb.value, 0); // Set to 0
                }
            });
        }



        // Example AJAX function for updating the server
        function updateShowInTop(id, value) {
            $.ajax({
                url: '{{ route('admin.post.updateShowInTop') }}', // You need to create this route
                method: 'POST',
                data: {
                    id: id,
                    show_in_top: value,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                     swal({ title: "Success", icon: "success", buttons: false, dangerMode: false, timer: 1500 });
                },
                error: function(xhr) {
                    swal({ title: "Error", icon: "warning", buttons: true, dangerMode: true });
                }
            });
        }



        function updateShowInHead(id, value) {
            $.ajax({
                url: '{{ route('admin.post.updateShowInHead') }}', // You need to create this route
                method: 'POST',
                data: {
                    id: id,
                    show_in_head: value,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                     swal({ title: "Success", icon: "success", buttons: false, dangerMode: false, timer: 1500 });
                },
                error: function(xhr) {
                    swal({ title: "Error", icon: "warning", buttons: true, dangerMode: true });
                }
            });
        }



    </script>
@endpush