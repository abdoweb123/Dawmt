@extends('Admin.Layouts.layout')
@section('pagetitle', __('trans.branch'))
@section('content')
<form method="POST" action="{{ route('admin.branches.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <label for="title_ar">@lang('trans.title_ar')</label>
            <input type="text" name="title_ar" id="title_ar" class="form-control" required >
        </div>
        <div class="form-group col-md-6">
            <label for="title_en">@lang('trans.title_en')</label>
            <input type="text" name="title_en" id="title_en" class="form-control" required >
        </div>
        <div class="form-group col-md-6">
            <label for="google_map_link">@lang('trans.google_map_link')</label>
            <input type="text" name="google_map_link" id="google_map_link" class="form-control" required >
        </div>
        <div class="form-group col-md-6">
            <label for="phone">@lang('trans.phone')</label>
            <input type="text" name="phone" id="phone" class="form-control" required >
        </div>

        <div class="form-group col-md-6">
            <label for="visibility">@lang('trans.visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option value="1">@lang('trans.yes')</option>
                <option value="0">@lang('trans.no')</option>
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




@section('css')
    <link rel="stylesheet" href="https://unpkg.com//bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
      <style>
        #map input[type=text] {
          background-color: #fff;
          border: 0;
          border-radius: 2px;
          box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
          margin: 10px;
          padding: 0 0.5em;
          font: 400 18px Roboto, Arial, sans-serif;
          overflow: hidden;
          line-height: 40px;
          margin-right: 0;
          min-width: 25%;
        }

        #map input[type=button] {
          background-color: #fff;
          border: 0;
          border-radius: 2px;
          box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
          margin: 10px;
          padding: 0 0.5em;
          font: 400 18px Roboto, Arial, sans-serif;
          overflow: hidden;
          height: 40px;
          cursor: pointer;
          margin-left: 5px;
        }

        #map input[type=button]:hover {
          background: rgb(235, 235, 235);
        }

        #map input[type=button].button-primary {
          background-color: #1a73e8;
          color: white;
        }

        #map input[type=button].button-primary:hover {
          background-color: #1765cc;
        }

        #map input[type=button].button-secondary {
          background-color: white;
          color: #1a73e8;
        }

        #map input[type=button].button-secondary:hover {
          background-color: #d2e3fc;
        }
        @media (max-width: 575.98px) {
            #map input{
              top: 50px !important;
            }
        }

        #response-container {
          background-color: #fff;
          border: 0;
          border-radius: 2px;
          box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
          margin: 10px;
          padding: 0 0.5em;
          font: 400 18px Roboto, Arial, sans-serif;
          overflow: hidden;
          overflow: auto;
          max-height: 50%;
          max-width: 90%;
          background-color: rgba(255, 255, 255, 0.95);
          font-size: small;
        }

        #instructions {
          background-color: #fff;
          border: 0;
          border-radius: 2px;
          box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
          margin: 10px;
          padding: 0 0.5em;
          font: 400 18px Roboto, Arial, sans-serif;
          overflow: hidden;
          padding: 1rem;
          font-size: medium;
        }
    </style>
@endsection