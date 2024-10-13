@extends(ucfirst(activeGuard()).'.Layouts.layout')
@section('pagetitle', $Region->title())
@section('content')
<form method="POST" action="{{ route(activeGuard().'.country.regions.update', ['country'=>$Country,'region'=>$Region,]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <label for="title_ar">@lang('trans.title_ar')</label>
            <input type="text" name="title_ar" id="title_ar" class="form-control" required value="{{ $Region['title_ar'] }}">
        </div>
        <div class="col-md-6">
            <label for="title_en">@lang('trans.title_en')</label>
            <input type="text" name="title_en" id="title_en" class="form-control" required value="{{ $Region['title_en'] }}">
        </div>
        <div class="col-md-6">
            <label for="delivery_cost">@lang('trans.delivery_cost')</label>
            <input type="text" name="delivery_cost" id="delivery_cost" class="form-control" required value="{{ $Region['delivery_cost'] }}">
        </div>
        <input  type="hidden"  value="{{ $Country['id'] }}" name="country_id" id="country_id" class="form-control" required>

        <div class="col-md-6">
            <label for="visibility">@lang('trans.visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option {{ $Region['status'] == 1 ? 'selected' : '' }} value="1">@lang('trans.visible')</option>
                <option {{ $Region['status'] == 0 ? 'selected' : '' }} value="0">@lang('trans.hidden')</option>
            </select>
        </div>
        <div class="clearfix"></div>
        <div class="col-12 my-4">
            <div class="button-group">
                <button type="submit" class="main-btn btn-hover w-100 text-center">
                    {{ __('trans.Submit') }}
                </button>
            </div>
        </div>
    </div>
</form>
@endsection