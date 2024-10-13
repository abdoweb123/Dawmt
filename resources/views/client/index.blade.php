@extends('client.layout.layout')

@push('styles')
  <style>
    .truncate-lines {
      display: -webkit-box;
      -webkit-line-clamp: 1; /* Change this number to control the number of lines (1 for one line) */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
@endpush

@section('content')

  <!-- loading -->
  <div class="loading-screen  position-fixed top-0 start-0 end-0 bottom-0 bg-white justify-content-center align-items-center">
    <img src="{{ asset('assets_client') }}/imgs/home/loading.gif">
  </div>

  <div class="container bg-primary-color bg-home  text-white text-center py-lg-5 py-2  rounded-3 ">
    <div class="row justify-content-center py-2" >
      <div class=" col-11 d-flex justify-content-md-between align-items-md-center align-items-end  flex-md-row flex-column gap-lg-0 gap-2">
        <div
        class=" img rounded-circle overflow-hidden d-md-flex d-none img-card justify-content-center align-items-center d"
        style="width:65px; height:65px;background-color: #D2E8F9;">
        <img class=" h-auto" src="{{ asset('assets_client') }}/imgs/icons/01 Attendance Module.png">
        </div>
          <div class="position-relative d-flex gap-3 justify-content-end">
            <div
              class="bg-Secondary-color img rounded-circle overflow-hidden d-flex img-card justify-content-center align-items-center border border-2 border-white position-relative"
              style="width:75px; height:75px;">
              <img class="w-100 h-auto" src="{{ asset(setting('recruiter_image')) }}">

            </div>
            <div class="position-absolute arrow-top" style="z-index: 1; ">
              <svg width="30" height="35" viewBox="0 0 30 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_625_857)">
                  <path d="M4.29736 28.1593L9.53799 2.4562L15.6528 12.1365L25.553 14.7325L4.29736 28.1593Z"
                    fill="#FAAC38" />
                </g>
                <defs>
                  <filter id="filter0_d_625_857" x="0.630697" y="0.98951" width="28.5889" height="33.0365"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                      result="hardAlpha" />
                    <feOffset dy="2.2" />
                    <feGaussianBlur stdDeviation="1.83333" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_625_857" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_625_857" result="shape" />
                  </filter>
                </defs>
              </svg>

            </div>
            <div class=" bg-Secondary-color rounded-3 py-2 px-3 text-start">
              <h6 class="text-black fs-16 lh-sm">{{ setting('recruiterName_'.lang()) }}</h6>
              <p class=" mb-0 text-secondary fs-14 ">@lang('trans.recruiter')</p>
            </div>
          </div>


      </div>



    </div>
    <div class="row justify-content-center py-lg-3 py-5" >

        <div class="col-lg-10">
          <h3>{{ setting('homeTitle_'.lang()) }}</h3>
          <p>{{ setting('homeDesc_'.lang()) }}</p>
        </div>


      <div class="col-lg-5 col-md-8 col-9 d-flex flex-md-row flex-column gap-md-3 gap-2">
        <a class=" py-md-3 py-2 button slide   rounded-2  text-capitalize w-100 fw-semibold text-white slide"
          href="AboutUs.html" data-bs-toggle="modal" data-bs-target="#register"><span>@lang('trans.sign_up')</span></a>
        <a class="btn btn-outline-light  py-md-3 py-2  rounded-2  btn text-capitalize w-100 fw-semibold "
          href="AboutUs.html" data-bs-toggle="modal" data-bs-target="#register"><span>@lang('trans.request_a_demo')</span></a>
      </div>



    </div>
    <div class="row justify-content-center py-2" >
      <div class=" col-11 d-flex justify-content-between">

          <div class="position-relative d-flex gap-3">
            <div
              class="bg-third-color img rounded-circle overflow-hidden d-flex img-card justify-content-center align-items-center border border-2 border-white position-relative"
              style="width:75px; height:75px;">
              <img class="w-100 h-auto" src="{{ asset(setting('recruiter_image')) }}">

            </div>
            <div class=" bg-third-color rounded-3 py-2 px-3 text-start mt-5">
              <h6 class="text-black fs-16 lh-sm">{{ setting('recruiterName_'.lang()) }}</h6>
              <p class=" mb-0 text-secondary fs-14 ">@lang('trans.recruiter')</p>
            </div>

            <div class="position-absolute   arrow-bottom" style="z-index: 1">
              <svg width="31" height="33" viewBox="0 0 31 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_757_753)">
                <path d="M3.87158 2.99634L27.3425 14.7108L16.4095 18.1119L11.3395 27.0028L3.87158 2.99634Z" fill="#79BAEC"/>
                </g>
                <defs>
                <filter id="filter0_d_757_753" x="0.204916" y="1.52967" width="30.8043" height="31.3398" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="2.2"/>
                <feGaussianBlur stdDeviation="1.83333"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_757_753"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_757_753" result="shape"/>
                </filter>
                </defs>
                </svg>

            </div>

          </div>

          <div
          class="bg-third-color img rounded-circle overflow-hidden d-md-flex d-none img-card justify-content-center align-items-center "
          style="width:65px; height:65px;">
          <img class=" h-auto" src="{{ asset('assets_client') }}/imgs/icons/01 Attendance Module.png">
          </div>
      </div>



    </div>

  </div>

  <div class="container  section-top-service py-5  ">
    <div class="row py-2 text-center">
      <h3 class=" py-2 fw-semibold" style="{{ lang() == 'ar' ? 'direction: ltr;' : '' }}">
        <span class="d-inline-block">{{ setting('title_'.lang()) }}</span> <span>@lang('trans.modules')</span>
      </h3>
      <p class=" py-2">@lang('trans.dawmt_transformation')</p>
    </div>
    <div class="row py-2 justify-content-lg-center align-items-center">
      <div class="tabslider2 slider-title regular slider1 py-lg-4">
        @foreach ($modules as $module)
          <div class="p-2">
            <div class="card border-0 rounded-3 p-2 shadow-sm">
              <div class="card-body">
                <div class="d-flex gap-2 align-items-center mb-2">
                  <div class="img-card d-flex align-items-center rounded-2 position-relative bg-third-color"
                       style="width: 60px !important; height: 60px !important;">
                    <img src="{{ asset($module->image) }}" alt="{{ $module->title() }}" />
                  </div>
                  <h5 class="pt-2 fw-bold">{{ $module->title() }}</h5>
                </div>
                <p class="text-secondary truncate-lines">{{ truncateToLetters($module['desc_'.lang()]) }}</p>
                <div>
                  <a class="fw-bold d-flex gap-2 align-items-center primary-color" data-bs-toggle="modal" data-bs-target="#read-more_{{ $module->id }}">
                    <span class="text-decoration-underline">@lang('trans.read_more')</span>
                    <span class="arrow pt-1"><i class="fa-solid fa-arrow-right"></i></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class=" bg-grident">
    <div class="container my-lg-5 my-3  section-top">
      <div class="row gy-3 justify-content-center py-2 flex-lg-row flex-column-reverse">
        <div class="col-lg-10 col-12 ">
          <div class="video-container h-100 ">
            <video style="  object-fit:cover;    width: 100%; max-height: 350px;"
                   id="my-video"
                   class="video-js rounded-4"
                   controls
                   preload="auto"
                   width=""
                   height="auto"
                   data-setup="{}"
                   loading="lazy"
            >
              <source src="{{ asset(setting('statistics_video')) }}"  type="video/mp4" />
              <source src="{{ asset(setting('statistics_video')) }}" type="video/webm" />
              <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank"
                >supports HTML5 video</a
                >
              </p>
            </video>
          </div>

        </div>
      </div>
      <div class="row   align-items-center justify-content-center  py-2 ">
        <div class="col-lg-10  col-12 ">
          <div class="row align-items-center justify-content-between gy-3 rating py-2 rate" >

            @foreach($statistics as $statistic)
              <div class="col-lg-3 col-md-4 col-12 d-flex align-items-center justify-content-center">
                <div class=" text-white py-4 px-2  rounded-circle d-flex justify-content-center flex-column" >
                  <h4 class="counter">{{ $statistic->number }}</h4>
                  <p class="">{{ $statistic->title() }}</p>
                  <p class="fs-14">{{ $statistic['desc_'.lang()] }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('client.layout.join_us_page')

  <div class="container py-lg-5 py-md-4 py-3 ">
    <div class="row py-2 text-center">
      <h3 class=" py-2 fw-semibold">@lang('trans.trusted_by_clients')</h3>
      <p class=" py-2 text-secondary">@lang('trans.thousands_of_companies')</p>
    </div>

    <div class="row slider-logos regular py-2">
      @foreach ($sliderClients as $client)
        <div class="p-2">
          <div class=" d-flex align-items-center justify-content-center img-slider">
            <img src="{{ asset($client->file) }}" alt="client_image">
          </div>
        </div>
      @endforeach
    </div>
  </div>

  @include('client.layout.contactSales')


  <!-- Read More Modals -->
  @foreach ($modules as $module)
    <div class="modal fade" id="read-more_{{ $module->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-light">
          <div class="modal-header d-flex justify-content-end border-0">
            <div role="button" class="button-close d-flex gap-1" data-bs-dismiss="modal" aria-label="Close">
              <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.5 36.6667C29.7048 36.6667 37.1667 29.2048 37.1667 20C37.1667 10.7953 29.7048 3.33337 20.5 3.33337C11.2953 3.33337 3.83337 10.7953 3.83337 20C3.83337 29.2048 11.2953 36.6667 20.5 36.6667Z" fill="#1B76BB"/>
                <path d="M15.7859 15.286L25.214 24.7141" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.7859 24.714L25.214 15.2859" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
          </div>
          <div class="modal-body px-2">
            <div class="row justify-content-center">
              <div class="col-11">
                <div class="row text-center">
                  <h5 class="fs-3">{{ $module->title() }}</h5>
                  <p class="text-secondary">{{ $module['desc_'.lang()] }}</p>
                </div>
                <div class="row py-2">
                  <h6 class="fw-semibold">@lang('trans.scope'):</h6>
                  <p>{{ $module['scope_'.lang()] }}</p>
                </div>
                <div class="row py-2">
                  <h6 class="fw-semibold">@lang('trans.supports'):</h6>
                  <ul class="px-2" style="list-style-position: inside; list-style-type: disc;">
                    @foreach($module->supports as $support)
                      <li>{{ $support['title_'.lang()] }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach

@stop


@push('scripts')
  <script>
      $(document).ready(() => {
        $(".loading-screen").fadeOut(1000);
      });



      var lang = "{{ lang() }}";
      console.log(lang);
      var Diriction = false;
      if (lang == 'ar') {
        Diriction = true;
      }

      {{--// var lang = localStorage.getItem('Language');--}}
      {{--// var Diriction = false;--}}
      {{--// if (lang == "العربية") {--}}
      {{--//   Diriction = true;--}}
      {{--// }--}}



      $(".slider1").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        prevArrow: `<button class="prev-button btn rounded-circle text-white"><i class="fa-solid fa-chevron-left"></i></button>`,
        nextArrow: `<button class="next-button btn rounded-circle text-white"><i class="fa-solid fa-chevron-right"></i></button>`,
        dots: false,
        rtl: Diriction,
        autoplaySpeed: 900,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              infinite: true,
            },
          },
          {
            breakpoint: 919,
            settings: {
              slidesToShow: 1,
            },
          }
        ],
      });


      $(".slider-logos").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        dots: false,
        rtl: Diriction,
        autoplaySpeed: 1000,
        centerMode: true,
        // variableWidth: true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              infinite: true,
            },
          },

          {
            breakpoint: 719,
            settings: {
              slidesToShow: 2,
            },
          },

          {
            breakpoint: 390,
            settings: {
              slidesToShow: 1,
            },
          },
        ]
      });




  </script>

@endpush