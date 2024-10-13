@extends('client.layout.layout')

@section('title')
  @lang('front.values')
@stop

@section('content')
  <div class="bg-primary-color">
    <div class="container py-lg-5 py-md-4 py-3 container-reverse-store">
      <div class="row gy-5 py-2 justify-content-md-between justify-content-center align-items-center">
        <div class="col-lg-5 col-md-4 col-10  position-relative d-flex justify-content-center align-items-center animation-container">
          <div class="img-container position-relative  ">
            <div class="">
              <img class="w-100" src="{{ asset('assets_client') }}/imgs/Photos/Group 1000001783.png">
            </div>


          </div>

          <div class="icons top-0 start-0 end-0 bottom-0">
            <div class="icon">
              <img src="{{ asset('assets_client') }}/imgs/icons/01 Attendance Module.png"/>
            </div>
            <div class="icon">
              <img src="{{ asset('assets_client') }}/imgs/icons/05 Kiosk Module.png"/>
            </div>
            <div class="icon">
              <img src="{{ asset('assets_client') }}/imgs/icons/06 Payroll Module.png"/>
            </div>
            <div class="icon">
              <img src="{{ asset('assets_client') }}/imgs/icons/10 Training module.png"/>
            </div>
            <div class="icon">
              <img src="{{ asset('assets_client') }}/imgs/icons/11 Disciplinary Module.png"/>
            </div>
            <div class="icon">
              <img src="{{ asset('assets_client') }}/imgs/icons/12 Appraisal Module.png"/>
            </div>
            <div class="icon">
              <img src="{{ asset('assets_client') }}/imgs/icons/15 Project Management.png"/>
            </div>
            <div class="icon">
              <img src="{{ asset('assets_client') }}/imgs/icons/17 Subcontractor Module.png"/>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-8 col-12" data-aos="fade-up" data-aos-duration="1500">
          <div class="row  py-2 ">
            <div class="col-12">
              <h3 class="lh-base fw-semibold Secondary-color">@lang('front.solution_values')</h3>
              <p class="text-white"> {{ setting('solution_value_desc_'.lang()) }} </p>
            </div>
          </div>
        </div>


      </div>

    </div>
  </div>
  <div class="container py-lg-5 py-3">
    <div class="row justify-content-center text-center">
      <div class="col-lg-9 col-11">
        <h3 class="primary-color">@lang('front.why_you_need_dawmt')</h3>
        <p>{{ setting('why_need_us_desc_'.lang()) }}</p>
      </div>
    </div>
  </div>


  <!-- Initialize a counter to keep track of the displayed normal values -->
  @php
    $normalCount = 0;
  @endphp

          <!-- Display Normal Values in pairs -->
  @while($normal_values->isNotEmpty())
    <div class="container py-lg-5 py-md-4 py-3 container-reverse-store">
      @php
        // Take two items but check if only one is left
        $itemsToTake = $normal_values->count() > 1 ? 2 : 1;
      @endphp

      @foreach($normal_values->take($itemsToTake) as $value) <!-- Take 1 or 2 items -->
      <div class="row gy-5 py-2 justify-content-between align-items-center">
        <div class="col-lg-6 col-md-8" data-aos="fade-up" data-aos-duration="1500">
          <div class="row py-2 align-items-center">
            <div class="col-12">
              <h4 class="lh-base fw-semibold">{{ $value->title() }}</h4>
              <p>{{ $value['desc_' . lang()] }}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-4 h-100">
          <img class="" src="{{ asset($value->image) }}" style="max-width: 85%; max-height: 85%;">
        </div>
      </div>
      @endforeach

      @php
        // Remove the taken items from the collection
        $normal_values = $normal_values->slice($itemsToTake);
      @endphp
    </div>

    <!-- Include Join Us Page after the first two normal values -->
    @if ($normalCount == 0) <!-- Only include this after the first set of normal values -->
      @include('client.layout.join_us_page')
    @else
      <!-- Insert Big Values section after every two Normal Values -->
      @foreach($big_values->take(1) as $value)
        <div class="bg-primary-color">
          <div class="container">
            <div class="row gy-5 py-2 justify-content-between align-items-center py-2">
              <div class="col-lg-5 col-md-4 h-100">
                <img class="w-100" src="{{ asset($value->image) }}"/>
              </div>
              <div class="col-lg-6 col-md-8" data-aos="fade-up" data-aos-duration="1500">
                <div class="row py-2 align-items-center">
                  <div class="col-12 text-white">
                    <h4 class="lh-base fw-semibold">{{ $value->title() }}</h4>
                    <p>{{ $value['desc_' . lang()] }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach

      @php
        // Remove the first big value from the collection
        $big_values = $big_values->slice(1);
      @endphp

    @endif


    @php
      $normalCount += 1;
    @endphp
  @endwhile



@stop

@push('scripts')

  <script>

    AOS.init({
      once: true
    })
    var lang = localStorage.getItem('Language');
    var Diriction = false;
    if (lang == "العربية") {
      Diriction = true;
    }

    $(".slider-img").slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: false,
      rtl: Diriction,
      arrows: true,
      dots: false,
      prevArrow: `<button class="prev-button btn rounded-circle primary-color"><i class="fa-solid fa-chevron-left"></i></button>`,
      nextArrow: `<button class="next-button btn rounded-circle primary-color"><i class="fa-solid fa-chevron-right"></i></button>`,
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


    $(document).ready(() => {
      $(".loading-screen").fadeOut(1000);
    });
    var lang = localStorage.getItem('Language');
    var Diriction = false;
    if (lang == "العربية") {
      Diriction = true;
    }

    $(".slider1").slick({
      infinite: true,
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: false,
      arrows: true,
      dots: false,
      rtl: Diriction,
      prevArrow: `<button class="prev-button btn rounded-circle text-white"><i class="fa-solid fa-chevron-left"></i></button>`,
      nextArrow: `<button class="next-button btn rounded-circle text-white"><i class="fa-solid fa-chevron-right"></i></button>`,
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
    $(".slider2").slick({
      infinite: true,
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: false,
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
    $(".slider3").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      arrows: true,
      prevArrow: `<button class="prev-button btn rounded-circle "><i class="fa-solid fa-chevron-left"></i></button>`,
      nextArrow: `<button class="next-button btn rounded-circle "><i class="fa-solid fa-chevron-right"></i></button>`,
      dots: false,
      rtl: Diriction,
      autoplaySpeed: 900,
      centerMode: true,
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


    function animateCounter(counterElement, targetValue, durationInSeconds) {
      let currentValue = 0;
      const totalFrames = durationInSeconds;
      const step = Math.ceil(targetValue / totalFrames);
      function updateCounter() {
        if (currentValue < targetValue) {
          currentValue += step;
          counterElement.textContent = currentValue;
          setTimeout(updateCounter, 100);
        } else {
          currentValue = targetValue;
          counterElement.textContent = targetValue;
        }
      }
      updateCounter();
    }

    function initCounters() {
      const counters = document.querySelectorAll('.counter');
      counters.forEach((counter, index) => {
        const targetValue = parseInt(counter.textContent.trim(), 10);
        animateCounter(counter, targetValue, 30);
      });
    }


    $(document).ready(() => {
      let containerRating = $(".rating").offset().top;
      let countersInitialized = false;
      $(window).scroll(function () {
        let windowScroll = $(window).scrollTop();
        if (windowScroll > containerRating - 700 && !countersInitialized) {
          initCounters();
          countersInitialized = true;
        }
      })

    });




  </script>

@endpush

