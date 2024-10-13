@extends('Admin.Layouts.layout')
@section('pagetitle',__('trans.dashboardTitle'))

@section('content')

<div class="text-center">
    <img src="{{ asset(setting('logo')) }}" alt="Logo" style="max-width: 400px">
    <h1>
        @lang('trans.WelcomeBack')
    </h1>
</div>

@endsection

