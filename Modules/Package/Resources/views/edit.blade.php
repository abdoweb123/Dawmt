@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.packages'))
@section('content')
<form method="POST" action="{{ route('admin.packages.update',$Model) }}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <div class="text-center">
        <img src="{{ asset($Model->file ?? setting('logo')) }}" class="rounded mx-auto text-center" id="file"  height="200px">
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="title_ar">@lang('trans.title_ar')</label>
            <input id="title_ar" type="text" name="title_ar" required placeholder="@lang('trans.title_ar')" class="form-control" value="{{ $Model['title_ar'] }}">
        </div>
        <div class="col-md-6">
            <label for="title_en">@lang('trans.title_en')</label>
            <input id="title_en" type="text" name="title_en" required placeholder="@lang('trans.title_en')" class="form-control" value="{{ $Model['title_en'] }}">
        </div>
        <div class="col-md-6">
            <label for="old_price">@lang('trans.old_price')</label>
            <input id="old_price" type="number" name="old_price" required placeholder="@lang('trans.old_price')" value="{{ $Model['old_price'] }}" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="price">@lang('trans.price')</label>
            <input id="price" type="number" name="price" required placeholder="@lang('trans.price')" value="{{ $Model['price'] }}" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="d-flex justify-content-between">
                <span>@lang('trans.items')</span>
                <span class="point text-danger" id="select_all_items">@lang('trans.select_all')</span>
            </label>
            <select class="form-control Multi-Select select2" name="items[]" id="items" multiple>
                @foreach($items as $item)
                    <option value="{{ $item->id }}"
                            @if($Model->items->contains($item->id))
                                selected
                            @endif
                    >
                        {{ $item->title() }}
                    </option>
                @endforeach
            </select>
        </div>

        
        <div class="col-12">
            <div class="button-group my-4">
                <button type="submit" class="main-btn btn-hover w-100 text-center">
                    {{ __('trans.Submit') }}
                </button>
            </div>
        </div>
    </div>
{{--    <textarea id="editor"></textarea>--}}
</form>
@endsection

@push('js')
    <script>
        $(document).on('change', '#type', function() {
            $("#branches option:selected").prop("selected", false);
            $('.Multi-Select').trigger('change.select2');
            if($( "#type option:selected" ).val() == 'branch'){
                $( ".branches" ).removeClass('d-none');
            }else{
                $( ".branches" ).addClass('d-none');
            }
        });

        $(document).on('click', '#select_all_items', function() {
            $("#items option").prop("selected", true);
            $('.Multi-Select').trigger('change.select2');
        });
    </script>
@endpush