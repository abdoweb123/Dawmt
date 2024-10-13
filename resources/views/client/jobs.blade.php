@extends('client.layout.layout')

@section('title')
  @lang('trans.jobs')
@stop

@section('content')
  <div class="bg-primary-color  my-5">
      <div class="container">
        <div class="row gy-5 text-center justify-content-center ">


          <div class="col-lg-6 col-md-8 col-12 py-lg-5 py-3" data-aos="fade-up" data-aos-duration="1500">
            <h4 class="lh-sm h4-home fw-semibold text-white py-2">{{ setting('jobs_title_'.lang()) }}</h4>
            <p class="text-white">{{ setting('jobs_desc_'.lang()) }}</p>

          </div>

        </div>

      </div>
    </div>

  <div class="container py-lg-5 py-md-4 py-3 ">
    <div class="row py-2 text-center">
      <h3 class="py-2 fw-semibold">@lang('front.trusted_clients_title')</h3>
      <p class="py-2 text-secondary">@lang('front.trusted_clients_description')</p>
    </div>
    <div class="row gy-3">
        @foreach($jobs as $job)
          <div class=" col-12">
            <div class="card   border-0    rounded-3 py-2">

              <div class="card-body ">
                <h3 class=" py-2">{{ $job->title() }}</h3>
                <div class="py-2 d-flex gap-lg-3 gap-1">
                  @foreach($job->skills as $skill)
                    <span class="fs-12 bg-third-color primary-color py-1 px-3 fw-semibold rounded-2">{{ $skill->title() }}</span>
                  @endforeach

                </div>
                <p class="text-secondary">{{ truncateToLetters($job['general_desc_'.lang()],200)  }}</p>
                <div>
                  <a class="fw-bold d-flex gap-2 align-items-center primary-color" href="{{ route('client.jobDetails',['id'=>$job->id,'name'=>formatName($job->title())]) }}">
                    <span class="text-decoration-underline">@lang('front.read_more')</span>
                    <span class="arrow pt-1"><i class="fa-solid fa-arrow-right"></i></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@stop

