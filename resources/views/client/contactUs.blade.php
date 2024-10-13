@extends('client.layout.layout')

@section('title')
  @lang('trans.contact_us')
@stop



@push('links')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">
  <script src="{{ asset('assets_client') }}/js/phone.js"></script>
@endpush

@section('content')

  <div class="container-fluid">
    <div class="row align-items-center py-2 position-relative">
      <div class="col-12 d-flex flex-md-row flex-column rounded-3 header-div about-container p-0 justify-content-center align-items-center position-relative">
        <!-- Google Maps iframe containers for each branch -->
        @foreach ($branches as $key => $branch)
          <div class="map-container w-100 mapDiv" id="map-{{ $key }}" style="display: none;">
            {!! $branch->google_map_link !!}
          </div>
        @endforeach
      </div>

      <div class="row-contact bottom-0 start-0 px-lg-5 px-2 w-100 col-12">
        <div class="row">
          <div class="col-lg-4 col-12 py-5">
            <div class="bg-white px-3 py-4 rounded-3">
              <div class="" data-aos="fade-up" data-aos-duration="1500">
                <div class="row">
                  <h3 class="primary-color">@lang('trans.contact_us')</h3>
                </div>
                <div class="row">
                  <div class=" tabslider2 slider-title regular slider1 py-lg-4">
                    @foreach ($branches as $key => $branch)
                    <div class="">
                      <div class="bg-third-color rounded-2 w-100 py-3 px-2">
                        <a class="fw-bold gap-2 align-items-center primary-color d-flex" href="javascript:void(0);" onclick="showMap({{ $key }})">
                          <span class=""> {{ $branch['title_'.lang()] }} <span class="{{ lang() == 'ar' ? 'float-end' : '' }} px-1"> @lang('trans.map') </span> </span>
                          <span class="arrow pt-1"><i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container py-lg-5 py-md-4 py-3 ">
              <div class="row    justify-content-lg-between  justify-content-center gy-2">
                <div class="col-lg-5 col-md-6 col-12 h-auto">
                  <div class="img-card contact-us  h-100 about-card d-flex align-items-center justify-content-center  rounded-4 position-relative text-white" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="500">
                    <div class="bg-primary-color py-5  layer-img rounded-4 position-absolute flex-column top-0 bottom-0 end-0 start-0 px-lg-5 px-2 d-flex align-items-center justify-content-center ">
                 <div class="row  px-lg-1 px-2">
                  <h3  class="h2 fw-bold text-capitalize text-white">@lang('front.get_in_touch')</h3>
                    <p>@lang('front.reach_out')</p>
                 </div>
                 <div class="row connection gy-3 ">

                  <div class=" col-12">
                    <div class="d-flex  gap-2  w-100 align-items-center ">
                      <div class=" p-2 rounded-circle">
                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                          style="width: 60px;height: 60px;">
                          <svg width="36" height="36" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M40.717 53.0833C38.0803 53.0833 35.3037 52.4533 32.4337 51.24C29.6337 50.05 26.8103 48.4166 24.057 46.4333C21.327 44.4266 18.6903 42.1866 16.1937 39.7366C13.7203 37.24 11.4803 34.6033 9.49699 31.8966C7.49033 29.0966 5.88033 26.2966 4.73699 23.59C3.52366 20.6966 2.91699 17.8966 2.91699 15.26C2.91699 13.44 3.24366 11.7133 3.87366 10.1033C4.52699 8.44663 5.57699 6.90663 7.00033 5.57663C8.79699 3.80329 10.8503 2.91663 13.0437 2.91663C13.9537 2.91663 14.887 3.12663 15.6803 3.49996C16.5903 3.91996 17.3603 4.54996 17.9203 5.38996L23.3337 13.02C23.8237 13.6966 24.197 14.35 24.4537 15.0033C24.757 15.7033 24.9203 16.4033 24.9203 17.08C24.9203 17.9666 24.6637 18.83 24.1737 19.6466C23.8237 20.2766 23.287 20.9533 22.6103 21.63L21.0237 23.2866C21.047 23.3566 21.0703 23.4033 21.0937 23.45C21.3737 23.94 21.9337 24.78 23.007 26.04C24.1503 27.3466 25.2237 28.5366 26.297 29.6333C27.6737 30.9866 28.817 32.06 29.8903 32.9466C31.2203 34.0666 32.0837 34.6266 32.597 34.8833L32.5503 35L34.2537 33.32C34.977 32.5966 35.677 32.06 36.3537 31.71C37.637 30.9166 39.2703 30.7766 40.9037 31.4533C41.5103 31.71 42.1637 32.06 42.8637 32.55L50.6103 38.0566C51.4737 38.64 52.1037 39.3866 52.477 40.2733C52.827 41.16 52.9903 41.9766 52.9903 42.7933C52.9903 43.9133 52.7337 45.0333 52.2437 46.0833C51.7537 47.1333 51.147 48.0433 50.377 48.8833C49.047 50.3533 47.6003 51.4033 45.9203 52.08C44.3103 52.7333 42.5603 53.0833 40.717 53.0833ZM13.0437 6.41663C11.7603 6.41663 10.5703 6.97663 9.42699 8.09663C8.35366 9.09996 7.60699 10.1966 7.14033 11.3866C6.65033 12.6 6.41699 13.8833 6.41699 15.26C6.41699 17.43 6.93033 19.7866 7.95699 22.2133C9.00699 24.6866 10.477 27.2533 12.3437 29.82C14.2103 32.3866 16.3337 34.8833 18.667 37.24C21.0003 39.55 23.5203 41.6966 26.1103 43.5866C28.6303 45.43 31.2203 46.9233 33.787 47.9966C37.777 49.7 41.5103 50.0966 44.5903 48.8133C45.7803 48.3233 46.8303 47.5766 47.787 46.5033C48.3237 45.92 48.7437 45.29 49.0937 44.5433C49.3737 43.96 49.5137 43.3533 49.5137 42.7466C49.5137 42.3733 49.4437 42 49.257 41.58C49.187 41.44 49.047 41.1833 48.6037 40.88L40.857 35.3733C40.3903 35.0466 39.9703 34.8133 39.5737 34.65C39.0603 34.44 38.8503 34.23 38.057 34.72C37.5903 34.9533 37.1703 35.3033 36.7037 35.77L34.9303 37.52C34.0203 38.4066 32.6203 38.6166 31.547 38.22L30.917 37.94C29.9603 37.4266 28.8403 36.6333 27.6037 35.5833C26.4837 34.6266 25.2703 33.5066 23.8003 32.06C22.657 30.8933 21.5137 29.6566 20.3237 28.28C19.227 26.9966 18.4337 25.9 17.9437 24.99L17.6637 24.29C17.5237 23.7533 17.477 23.45 17.477 23.1233C17.477 22.2833 17.7803 21.5366 18.3637 20.9533L20.1137 19.1333C20.5803 18.6666 20.9303 18.2233 21.1637 17.8266C21.3503 17.5233 21.4203 17.2666 21.4203 17.0333C21.4203 16.8466 21.3503 16.5666 21.2337 16.2866C21.0703 15.9133 20.8137 15.4933 20.487 15.05L15.0737 7.39663C14.8403 7.06996 14.5603 6.83663 14.2103 6.67329C13.837 6.50996 13.4403 6.41663 13.0437 6.41663ZM32.5503 35.0233L32.177 36.61L32.807 34.9766C32.6903 34.9533 32.597 34.9766 32.5503 35.0233Z"
                              fill="white" />
                          </svg>
                        </div>
                      </div>
                      <div>
                        <div class="d-flex flex-column">
                          @foreach ($branches as $key => $branch)
                          <a class="text-white fw-medium" href="tel:{{ $branch->phone }}">{{ $branch->phone }}</a>
                          @endforeach
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class=" col-12">
                    <div class="d-flex  gap-2  w-100 align-items-center ">
                      <div class=" p-2 rounded-circle">
                        <div class=" rounded-circle d-flex justify-content-center align-items-center"
                          style="width: 60px;height: 60px;">
                          <svg width="36" height="36" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M39.667 47.8333H16.3337C9.33366 47.8333 4.66699 44.3333 4.66699 36.1666V19.8333C4.66699 11.6666 9.33366 8.16663 16.3337 8.16663H39.667C46.667 8.16663 51.3337 11.6666 51.3337 19.8333V36.1666C51.3337 44.3333 46.667 47.8333 39.667 47.8333Z"
                              stroke="white" stroke-width="4" stroke-miterlimit="10" stroke-linecap="round"
                              stroke-linejoin="round" />
                            <path d="M39.6663 21L32.363 26.8333C29.9597 28.7467 26.0163 28.7467 23.613 26.8333L16.333 21"
                              stroke="white" stroke-width="4" stroke-miterlimit="10" stroke-linecap="round"
                              stroke-linejoin="round" />
                          </svg>


                        </div>
                      </div>
                      <span>
                        <a class="text-white fw-medium" href="mailto:{{ setting('email') }}">{{ setting('email') }}</a>
                      </span>

                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-flex  gap-2  w-100 align-items-center">
                      <div class=" p-2 rounded-circle">
                        <div class=" rounded-circle d-flex justify-content-center align-items-center"
                          style="width: 60px;height: 60px;">
                          <svg width="36" height="36" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M25.6667 27.7667V39.6667C25.6667 40.2855 25.9125 40.879 26.3501 41.3166C26.7877 41.7542 27.3812 42 28 42C28.6188 42 29.2123 41.7542 29.6499 41.3166C30.0875 40.879 30.3333 40.2855 30.3333 39.6667V27.7667C33.1661 27.1884 35.6833 25.579 37.3968 23.2503C39.1103 20.9216 39.8982 18.0397 39.6076 15.1631C39.317 12.2866 37.9687 9.62041 35.824 7.6815C33.6794 5.74259 30.8912 4.66907 28 4.66907C25.1088 4.66907 22.3206 5.74259 20.176 7.6815C18.0313 9.62041 16.683 12.2866 16.3924 15.1631C16.1018 18.0397 16.8897 20.9216 18.6032 23.2503C20.3167 25.579 22.8339 27.1884 25.6667 27.7667ZM28 9.33335C29.3845 9.33335 30.7378 9.7439 31.889 10.5131C33.0401 11.2822 33.9373 12.3755 34.4672 13.6546C34.997 14.9337 35.1356 16.3411 34.8655 17.699C34.5954 19.0569 33.9287 20.3041 32.9497 21.2831C31.9708 22.2621 30.7235 22.9288 29.3656 23.1989C28.0078 23.4689 26.6003 23.3303 25.3212 22.8005C24.0421 22.2707 22.9489 21.3735 22.1797 20.2223C21.4105 19.0712 21 17.7178 21 16.3334C21 14.4768 21.7375 12.6964 23.0503 11.3836C24.363 10.0709 26.1435 9.33335 28 9.33335ZM37.8233 33.6467C37.5169 33.5823 37.2008 33.579 36.8931 33.6368C36.5854 33.6946 36.2921 33.8125 36.0299 33.9836C35.7677 34.1548 35.5418 34.3759 35.3651 34.6344C35.1884 34.8929 35.0643 35.1836 35 35.49C34.9357 35.7964 34.9323 36.1125 34.9901 36.4202C35.0479 36.728 35.1658 37.0213 35.3369 37.2835C35.5081 37.5456 35.7292 37.7715 35.9877 37.9482C36.2462 38.1249 36.5369 38.249 36.8433 38.3134C42.14 39.3634 44.3333 41.2534 44.3333 42C44.3333 43.3534 38.6167 46.6667 28 46.6667C17.3833 46.6667 11.6667 43.3534 11.6667 42C11.6667 41.2534 13.86 39.3633 19.1567 38.22C19.4631 38.1557 19.7538 38.0316 20.0123 37.8549C20.2708 37.6782 20.4919 37.4523 20.6631 37.1901C20.8342 36.9279 20.9521 36.6346 21.0099 36.3269C21.0677 36.0192 21.0643 35.7031 21 35.3967C20.9357 35.0903 20.8116 34.7995 20.6349 34.5411C20.4582 34.2826 20.2323 34.0615 19.9701 33.8903C19.7079 33.7191 19.4146 33.6013 19.1069 33.5435C18.7992 33.4856 18.4831 33.489 18.1767 33.5534C11.0833 35.1867 7 38.2434 7 42C7 48.1367 17.57 51.3334 28 51.3334C38.43 51.3334 49 48.1367 49 42C49 38.2434 44.9167 35.1867 37.8233 33.6467Z"
                              fill="white" />
                          </svg>

                        </div>
                      </div>
                      <span>
                        <a class="text-white fw-medium" href="{{ setting('google_map_link') }}" target="_blank">
                          {{ setting('address_'.lang()) }}
                        </a>
                      </span>

                    </div>
                  </div>
                </div>
                <div class="row h-100 align-items-end w-100">
                  <div class="col-12">
                    <ul class="social d-flex px-0">
                      <li>
                        <a target="_blank" href="{{ setting('facebook') }}"><i class="fab fa-facebook-f icon"></i></a>
                      </li>
                      <li>
                        <a target="_blank" href="{{ setting('twitter') }}"><i class="fab fa-twitter icon"></i></a>
                      </li>
                      <li>
                        <a target="_blank" href="{{ setting('instagram') }}"><i class="fa-brands fa-instagram icon">
                        </i></a>
                      </li>
                      <li>
                        <a target="_blank" href="{{ setting('whatsapp') }}"><i class="fa-brands fa-whatsapp icon"></i></a>
                      </li>
                    </ul>
                  </div>

                </div>
                    </div>

                      </div>

                  </div>

                <div class="col-lg-7 col-md-6 col-12 ">
                  <form class="row p-2 bg-light rounded-3" method="post" action="{{  route('client.contactUs')}}">
                      @csrf
                    <div class=" col-6">
                      <label for="FirstName" class="form-label fw-semibold">@lang('trans.first_name')*</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-3 border-0 py-2" name="first_name" id="FirstName" required>
                      </div>
                    </div>
                    <div class=" col-6">
                      <label for="LastName" class="form-label fw-semibold"> @lang('trans.last_name')*</label>
                      <div class="input-group mb-2">
                        <input type="text" class="form-control rounded-3 border-0 py-2" name="last_name" id="LastName" required>
                      </div>
                    </div>
                    <div class=" col-12">
                      <label for="email" class="form-label fw-semibold">@lang('trans.email_address')*</label>
                      <div class="input-group mb-2">
                        <input type="text" class="form-control rounded-3 border-0 py-2" name="email" id="email" required>
                      </div>
                    </div>
                    <div class=" col-12">
                      <label for="Subject" class="form-label fw-semibold">@lang('trans.subject')*</label>
                      <div class="input-group mb-2">
                        <input type="text" class="form-control rounded-3 border-0 py-2" name="subject" id="Subject" required>
                      </div>
                    </div>
                    <div class=" col-12">
                      <label for="phonenumber" class="form-label fw-semibold">@lang('trans.phone_number')*</label>
                      <div class="input-group mb-2 w-100">
                        <input type="tel" name="phone" id="phone" class="form-control rounded-3 border-0 py-2 w-100" required/>
                        <!-- Hidden field to store the phone code -->
                        <input type="hidden" name="phone_code" id="phone_code">
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="Notes" class="form-label fw-semibold "> @lang('trans.theMessage')*</label>
                    <div class="input-group mb-2">
                      <textarea style="resize: none;" class="form-control rounded-3 border-0" name="message" id="Notes" rows="5" required></textarea>
                    </div>
                  </div>
                  <div class=" col-12 d-flex justify-content-end align-items-center">
                    <button type="submit" class="bg-primary-color btn w-auto px-5 rounded-3 border-0 my-3 rounded-1 text-white fw-semibold py-2">@lang('trans.send_message')</button>
                  </div>
                </form>

                </div>



              </div>

            </div>

@stop



@push('scripts')
  <!-- For Phone -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
  <script src="{{ asset('assets_client') }}/js/phone.js"></script>
  <script>
    $(document).ready(function() {
      // Initialize intl-tel-input
      var phoneInput = $("#phone").intlTelInput({
        preferredCountries: ["us", "gb"],
      });

      // On form submission
      $("form").on("submit", function(event) {
        // Get the full international phone number (e.g., +123456789)
        // var phoneNumber = $("#phone").intlTelInput("getNumber");

        // Get just the country dialing code (e.g., +1, +44)
        var phoneCode = $("#phone").intlTelInput("getSelectedCountryData").dialCode;

        // Set the hidden input value with the phone code
        $("#phone_code").val(phoneCode);

        // Optional: Set the formatted number back to the input (if needed)
        // $("#phone").val(phoneNumber);
      });
    });
  </script>



  <script>


    var lang = "{{ lang() }}";
    console.log(lang);
    var Diriction = false;
    if (lang == 'ar') {
      Diriction = true;
    }


    $(".slider1").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      dots: true,
      arrows:false,
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



  <!-- For map -->
  <script>
    $(document).ready(function() {
      $('iframe').addClass('w-100 rounded-3 mapDiv');
    });
  </script>
  <script>
    function showMap(key) {
      // Hide all map containers
      var maps = document.querySelectorAll('.map-container');
      maps.forEach(function(map) {
        map.style.display = 'none';
      });

      // Show the selected map
      var selectedMap = document.getElementById('map-' + key);
      if (selectedMap) {
        selectedMap.style.display = 'block';
      }
    }

    // Show the first map on page load
    window.onload = function() {
      showMap(0); // Show the first map by default (index 0)
    };
  </script>


@endpush