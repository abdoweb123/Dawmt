@extends('client.layout.layout')

@section('title')
  @lang('front.clientStories')
@stop


@section('content')
  <div class="bg-primary-color">
    <div class="container my-lg-5 my-3  section-top">
      <div class="row gy-3 justify-content-center py-2">
        <div class="col-lg-6 text-white text-center">
          <h4 class="h4-home">{{ setting('clientStoriesTitle_'.lang()) }}</h4>
          <p>{{ setting('clientStoriesDesc_'.lang()) }}</p>
          <div class=" w-100 d-flex flex-column align-items-center">
            <a  data-bs-toggle="modal" data-bs-target="#register"
              class="btn bg-primary-color border border-white text-white px-4 btn   rounded-3 gap-2 my-2 py-2">@lang('front.request_a_demo') </a>
          </div>
        </div>
        <div class="col-lg-8 col-md-6 col-12 ">
          <div class="video-container h-100 ">
            <video style="  object-fit:cover;    width: 100%; max-height: 350px;" id="my-video"
              class="video-js rounded-4" controls preload="auto" width="" height="auto" data-setup="{}">
              <source src="{{ asset(setting('clientStories_video')) }}" type="video/mp4" />
              <source src="{{ asset(setting('clientStories_video')) }}" type="video/webm" />
              <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
              </p>
            </video>
          </div>

        </div>

      </div>
      <div class="row   align-items-center justify-content-center  py-2 ">
        <div class="col-lg-8 col-md-8 col-12 ">
          <div class="row align-items-center justify-content-center gy-3 rating py-2 rate">
            @foreach($statistics as $statistic)
            <div class="col-md-4 col-6 d-flex align-items-center justify-content-center">
              <div class=" text-white py-4 px-2 text-center  rounded-circle d-flex justify-content-center flex-column">
                <h4 class="counter">{{ $statistic->number }}</h4>
                <p class="">{{ $statistic->title() }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container my-lg-5 my-3  section-top">
    <div class="row gy-3 justify-content-center py-2">
      <div class="col-lg-12  text-center">
        <h3 class="small-title text-black">@lang('front.our_clients_love_us') </h3>
        <h4 class="h4-home">{{ setting('clientStoriesSubTitle_'.lang()) }}</h4>
        <div class=" w-100 d-flex flex-column align-items-center">
          <a data-bs-toggle="modal" data-bs-target="#register"
            class="btn bg-primary-color border border-white text-white px-4 btn   rounded-3 gap-2 my-2 py-2">@lang('front.request_a_demo')</a>
        </div>
      </div>
    </div>
  </div>





  <div class="container  section-top-service py-lg-5 py-md-4 py-3" >
    <div class="row gy-3">
      @foreach($clientStories as $clientStory)
        <div class="col-lg-4 col-md-6 col-12">
          <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $clientStory->id }}">
            <div class="card   border-0    rounded-3 py-2">
              <div class="card-header bg-white border-0 ">
                <div class="  d-flex align-items-center justify-content-center rounded-2">
                  <img src="{{ asset($clientStory->cover_image) }}" class="w-100">
                </div>
              </div>
              <div class="card-body ">
                <h3 class="fw-semibold  primary-color">{{ $clientStory->title() }}</h3>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>

   @foreach($clientStories as $clientStory)
    <div class="modal fade" id="exampleModal_{{ $clientStory->id }}" tabindex="-1" aria-labelledby="exampleModal_{{ $clientStory->id }}Label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex justify-content-center flex-column align-items-center">
            <iframe class="w-100" height="315" src="{{ $clientStory->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
   @endforeach

@stop

@push('scripts')
  <script>
    AOS.init({
      once: true
    })
    document.addEventListener("DOMContentLoaded", function () {
      // Function to handle radio button change
      function handleRadioChange() {
        var propertyInputs = document.querySelectorAll(".time input[type='radio'], .Payment input[type='radio']");

        propertyInputs.forEach(function (input) {
          input.addEventListener("change", function () {
            if (this.type === "radio") {
              document.querySelectorAll(`input[name='${this.name}']`).forEach(function (radio) {
                radio.closest(".Payment, .time").classList.remove("active");
              });
              this.closest(".Payment, .time").classList.add("active");
              this.value = this.getAttribute("data-value");
            }
          });
        });
      }

      // Set the first radio button as active by default
      function setDefaultActive() {
        var firstTimeRadioButton = document.querySelector(".time input[type='radio']");
        if (firstTimeRadioButton) {
          firstTimeRadioButton.checked = true;
          firstTimeRadioButton.closest(".time").classList.add("active");
          firstTimeRadioButton.value = firstTimeRadioButton.getAttribute("data-value");
        }

        var firstPaymentRadioButton = document.querySelector(".date input[type='radio']");
        if (firstPaymentRadioButton) {
          firstPaymentRadioButton.checked = true;
          firstPaymentRadioButton.closest(".date").classList.add("active");
          firstPaymentRadioButton.value = firstPaymentRadioButton.getAttribute("data-value");
        }
      }

      // Initialize the radio button change handler and default active state
      handleRadioChange();
      setDefaultActive();
    });
    AOS.init({
      once: true
    })


    document.addEventListener("DOMContentLoaded", function () {
      // Select all elements with the class "slider-button"
      const sliderButtons = document.querySelectorAll(".slider-button");

      sliderButtons.forEach(button => {
        button.addEventListener("click", function (e) {
          e.preventDefault();
        });
      });
    });

  </script>
@endpush



