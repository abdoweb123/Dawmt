@extends('client.layout.layout')

@section('title')
  @lang('front.job_details')
@stop

@push('styles')
  <style>
    .job_specification ul{
      list-style-type: disc;
      list-style-position: inside;
    }
  </style>
@endpush

@section('content')
    <div class="container py-lg-5 py-3">
      <div class="row gy-5   ">
        <div class="col-1">
          <a class=" btn rounded-circle text-white bg-Secondary-color" href="{{ route('client.jobs') }}"><i class="fa-solid {{ lang() == 'ar' ? 'fa-chevron-right' : 'fa-chevron-left' }}"></i></a>
        </div>
        <div class="col-lg-10  col-11" >
          <div class="fs-16 py-2"> @lang('front.back_to_jobs') </div>
        </div>
      </div>
      <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1500"> 
        <div class="col-lg-10 col-12">
          <div class="row" >
            <h2 class=" fw-bold  py-2">{{ $job->title() }}</h2>
            <div class="py-2 d-flex gap-lg-3 gap-1">
              @foreach($job->skills as $skill)
                <span class="fs-12 bg-third-color primary-color py-1 px-3 fw-semibold rounded-2">{{ $skill->title() }}</span>
              @endforeach
            </div>
          </div>


            <div class=" py-2">
              <h6 class="fs-16 fw-medium">@lang('front.primary_responsibility'):</h6>
              <p class="mb-0 text-dark">{{ $job['general_desc_'.lang()] }}</p>
    
            </div>
      <div class="py-2 job_specification">
      <h6 class="fs-16 fw-medium">@lang('front.job_specification'):</h6>

        {!! $job['desc_'.lang()] !!}
    </div>
        <div class=" py-2">
          <h6 class="fs-16 fw-medium">@lang('front.employment_type'):</h6>
          <p class="mb-0  text-secondary">{{ $job['employment_type_'.lang()] }}</p>
        </div>
        <div class=" py-2">
          <h6 class="fs-16 fw-medium">@lang('front.work_place_type'):</h6>
          <p class="mb-0  text-secondary">{{ $job['work_place_type_'.lang()] }}</p>
        </div>
        <div class=" py-2">
          <h6 class="fs-16 fw-medium">@lang('front.salary'):</h6>
          <p class="mb-0  text-secondary">{{ $job['salary_'.lang()] }}</p>
        </div>
        <div class=" py-2">
          <h6 class="fs-16 fw-medium">@lang('front.experience_required'):</h6>
          <p class="mb-0  text-secondary">{{ $job['experience_required_'.lang()] }}</p>
        </div>
        <div class=" py-2">
          <h6 class="fs-16 fw-medium">@lang('front.location'):</h6>
          <p class="mb-0  text-secondary">{{ $job['location_'.lang()] }}</p>
        </div>
        <div class=" w-100 d-flex ">
          <a  data-bs-toggle="modal" data-bs-target="#register"
            class="btn bg-primary-color border border-white text-white px-4 btn   rounded-3 gap-2 my-2 py-2">@lang('front.apply_now')</a>
        </div>
        </div>

        </div>
    </div>
@stop