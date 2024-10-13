@extends('Admin.Layouts.layout')

@section('pagetitle', __('trans.plans'))

@section('content')
<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.plans.create') }}" class="main-btn">@lang('trans.add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('plans')" class="btn btn-danger" disabled>@lang('trans.Delete_Selected')</button>
    </div>
</div>

<form id="updatePlansForm" method="POST">
    @csrf
    @method('PUT')
    <button type="button" class="btn btn-primary" onclick="updateAllPlans()">@lang('trans.update')</button>
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
            <th>#</th>
            <th>@lang('trans.name')</th>
            <th>@lang('trans.status')</th>
            <th>@lang('trans.arrangement')</th>
            <th>@lang('trans.most_popular')</th>
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
                    <input class="toggle" type="checkbox" onclick="toggleswitch({{ $model->id }}, 'plans')" @if ($model->status) checked @endif>
                </td>
                <td>
                    <input type="number" class="form-control arrangement-input" data-id="{{ $model->id }}" value="{{ $model->arrangement ?? '' }}" min="1" style="width: 60px;">
                </td>
                <td>
                    <input type="checkbox" class="most-popular" name="most_popular[]" value="{{ $model->id }}" @if ($model->most_popular) checked @endif>
                </td>
                <td>
                    <a href="{{ route('admin.plans.show', $model) }}"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('admin.plans.edit', $model) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form class="formDelete" method="POST" action="{{ route('admin.plans.destroy', $model) }}">
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
</form>


@endsection


@push('js')
    <script>
        function updateAllPlans() {
            const plans = [];

            // Collect all arrangements and most popular statuses
            document.querySelectorAll('.arrangement-input').forEach(input => {
                const planId = input.getAttribute('data-id');
                const arrangementValue = input.value;

                const isMostPopular = document.querySelector(`input[type="checkbox"][value="${planId}"].most-popular`).checked;

                plans.push({
                    id: planId,
                    arrangement: arrangementValue,
                    most_popular: isMostPopular
                });
            });

            // Make an AJAX request to update all plans
            $.ajax({
                url: '/admin/update_plans/index', // Your route
                type: 'PUT',
                data: {
                    plans: plans,
                    _token: '{{ csrf_token() }}' // CSRF token for security
                },
                success: function(response) {
                    // Optionally handle success (e.g., show a success message)
                    console.log('All plans updated successfully:', response);
                    // SweetAlert2 success message
                    swal({ title: "Success", icon: "success", buttons: false, dangerMode: false, timer: 1500 });

                },
                error: function(xhr) {
                    // Handle error
                    console.error('Update failed:', xhr);
                    swal({ title: "Error", icon: "warning", buttons: true, dangerMode: true });
                }
            });
        }

    </script>
@endpush