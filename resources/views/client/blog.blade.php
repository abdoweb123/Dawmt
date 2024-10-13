@extends('client.layout.layout')

@section('title')
  @lang('trans.blog')
@stop


@section('content')
  <div class="bg-primary-color after-img-before my-5">
    <div class="container">
      @if($topPost)
        <div class="row gy-5  justify-content-md-between justify-content-center flex-md-row flex-column-reverse">
          <div class="col-lg-6 col-md-8 col-12 py-lg-5 py-3" data-aos="fade-up" data-aos-duration="1500">
            <div class="fs-16 py-2">
              @if(lang() === 'ar') <!-- Check if the current locale is Arabic -->
                <span class="bg-white text-black p-2 rounded-end">{{ \Carbon\Carbon::parse($topPost->date)->translatedFormat('d F Y') }}</span>
                <span class="bg-Secondary-color text-white p-2 rounded-start">{{ $topPost->publisher?->title() }}</span>
              @else
                <span class="bg-Secondary-color text-white p-2 rounded-start">{{ $topPost->publisher?->title() }}</span>
                <span class="bg-white text-black p-2 rounded-end">{{ \Carbon\Carbon::parse($topPost->date)->translatedFormat('d F Y') }}</span>
              @endif
            </div>
            <h3 class="lh-sm fw-semibold text-white py-2">{{ $topPost->title() }}</h3>
            <p class="text-white">  {{ $topPost['brief_desc_'.lang()] }}</p>
            <div class="">
              <a class="fw-bold d-flex gap-2 align-items-center text-white" href="{{ route('client.post_details',['id'=> $topPost->id, 'post_name' => formatName($topPost->title())]) }}">
                <span class="text-decoration-underline">@lang('front.read_more') </span>
                <span class="arrow pt-1"><i class="fa-solid fa-arrow-right"></i></span>
              </a>
            </div>

          </div>
          <div class="col-lg-6 col-md-4 col-10  position-relative d-flex justify-content-center align-items-end">
            <div class="img-container position-relative d-flex justify-content-center align-items-end w-100 h-100">
              <img class="w-100" src="{{ asset($topPost->image) }}">
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>

  @if($headPost)
    <div class="container py-lg-5 py-md-4 py-3 ">
      <div class="row ">
        <div data-aos="flip-up" class="bg-img header-div p-0 overflow-hidden d-flex  justify-content-center rounded-4 " data-aos-duration="2000">
          <img class="w-100" src="{{ asset($headPost->image) }}">
        </div>
      </div>
      <div class="row justify-content-end div-top" >
        <div class="col-lg-10 col-md-11">
          <div class="card bg-white border border-0 p-4">
            <h6 class="fs-14 ">
              <span class="text-black">{{ $headPost->publisher?->title() }}</span>
              <span class="text-secondary">{{ \Carbon\Carbon::parse($headPost->date)->translatedFormat('d F Y') }}</span>
            </h6>
            <h4>{{ $headPost->title() }}</h4>
            <p>{{ $headPost['brief_desc_'.lang()] }}</p>
            <div class="">
              <a href="{{ route('client.post_details',['id'=> $headPost->id, 'post_name' => formatName($headPost->title())]) }}"
                 class="btn bg-primary-color text-white px-5 btn   rounded-3 gap-2  py-2">@lang('front.read_more')</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

  <!-- recent posts -->
  <div class="container  section-top-service py-5 py-3" >
        <div class="row">
          <h3  class="">@lang('front.our_recent_posts')</h3>
        </div>
        <div class="row">
          <x-post.longPost :post="$recent_posts->first()"/>
        </div>

        <div class="row">
          <div class=" tabslider2 slider-title regular slider1 py-lg-4">
            @foreach($recent_posts as $post)
              <x-post.shortPost :post="$post"/>
            @endforeach
          </div>
        </div>
      </div>

  <!-- popular posts -->
  <div class="container  section-top-service py-5 py-md-4 py-3" >
        <div class="row">
          <h3  class="">@lang('front.our_popular_posts')</h3>
        </div>
        <div class="row">
          <x-post.longPost :post="$popular_posts->first()"/>
        </div>

        <div class="row">
          <div class=" tabslider2 slider-title regular slider2 py-lg-4">
            @foreach($popular_posts as $post)
              <x-post.shortPost :post="$post"/>
            @endforeach
          </div>
        </div>
      </div>
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