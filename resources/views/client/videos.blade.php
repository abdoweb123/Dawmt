@extends('client.layout.layout')

@section('title')
  @lang('front.videos')
@stop

@section('content')

  <div class="bg-primary-color after-img-before my-5">
    <div class="container">
      <div class="row gy-5  justify-content-md-between justify-content-center flex-md-row flex-column-reverse">
        <div class="col-lg-6 col-md-8 col-12 py-lg-5 py-3" data-aos="fade-up" data-aos-duration="1500">
          <h3 class="lh-sm fw-semibold text-white py-2">{{ setting('vid_title_'.lang()) }}</h3>
          <p class="text-white"> {{ setting('vid_desc_'.lang()) }} </p>
        </div>
        <div class="col-lg-6 col-md-4 col-10  position-relative d-flex justify-content-center align-items-end">
          <div class="img-container position-relative d-flex justify-content-center align-items-end w-100 h-100">
            <img class="w-100" src="{{ asset(setting('vid_image')) }}">
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container  section-top-service py-lg-5 py-md-4 py-3" >
        <div class="row">
          <h3  class="px-lg-4">@lang('front.our_recent_videos')</h3>
        </div>
        <div class="row">
          <div class=" tabslider2 slider-title regular slider1 py-lg-4">
            @foreach($recent_videos as $video)
              <div class=" p-2 ">
                <a href="" data-bs-toggle="modal" data-bs-target="#recent_{{$video->id}}">
                  <div class="card   border-0    rounded-3 py-2">
                    <div class="card-header bg-white border-0 ">
                      <div class="  d-flex align-items-center justify-content-center rounded-2">
                        <img src="{{ asset( $video->cover_image ) }}" class="w-100" alt="{{ $video->title() }}">
                      </div>
                    </div>
                    <div class="card-body ">
                      <h3 class="fw-bold py-2 text-black">{{ $video->title() }}</h3>
                      <p class="text-secondary">{{ $video['desc_'.lang()] }}</p>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>

  <div class="container  section-top-service py-lg-5 py-md-4 py-3" >
        <div class="row">
          <h3  class="px-lg-4">@lang('front.popular_videos')</h3>
        </div>

        <div class="row">
          <div class=" tabslider2 slider-title regular slider2 py-lg-4">
            @foreach($popular_videos as $video)
              <div class=" p-2 ">
                <a href="" data-bs-toggle="modal" data-bs-target="#popular_{{$video->id}}">
                  <div class="card   border-0    rounded-3 py-2">
                    <div class="card-header bg-white border-0 ">
                      <div class="  d-flex align-items-center justify-content-center rounded-2">
                        <img src="{{ asset( $video->cover_image ) }}" class="w-100" alt="{{ $video->title() }}">
                      </div>
                    </div>
                    <div class="card-body ">
                      <h3 class="fw-bold py-2 text-black">{{ $video->title() }}</h3>
                      <p class="text-secondary">{{ $video['desc_'.lang()] }}</p>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>

    @foreach($recent_videos as $video)
    <div class="modal fade" id="recent_{{$video->id}}" tabindex="-1" aria-labelledby="recent_{{$video->id}}Label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex justify-content-center flex-column align-items-center">
            <iframe class="w-100" height="315" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
   @endforeach

  @foreach($popular_videos as $video)
    <div class="modal fade" id="popular_{{$video->id}}" tabindex="-1" aria-labelledby="popular_{{$video->id}}Label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex justify-content-center flex-column align-items-center">
            <iframe class="w-100" height="315" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  @endforeach

@stop

@push('scripts')

  <script>


    var lang = "{{ lang() }}";
    var Diriction = false;
    if (lang == "ar") {
      Diriction = true;
    }

    $(".slider1").slick({
      infinite: true,
      slidesToShow: 3,
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
      slidesToShow: 3,
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




  </script>

@endpush