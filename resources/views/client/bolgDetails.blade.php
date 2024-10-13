@extends('client.layout.layout')

@section('title')
  {{formatName($post->title())}}
@stop


@push('styles')
    <style>
        .blog_details ul{
            list-style-type: disc;
            list-style-position: inside;
        }
    </style>
@endpush

@section('content')

    <div class="container py-lg-5 py-3">
      <div class="row gy-5   ">

<div class="col-1">

  <a class=" btn rounded-circle text-white bg-Secondary-color" href="{{ route('client.blog') }}"><i class="fa-solid fa-chevron-left"></i></a>
</div>
        <div class="col-lg-10  col-11" data-aos="fade-up" data-aos-duration="1500">
          <div class="fs-16 py-2">
              @if(lang() === 'ar') <!-- Check if the current locale is Arabic -->
                  <span class="bg-white text-black p-2 rounded-end">{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F Y') }}</span>
                  <span class="bg-primary-color text-white p-2 rounded-start">{{ $post->publisher?->title() }}</span>
              @else
                  <span class="bg-primary-color text-white p-2 rounded-start">{{ $post->publisher?->title() }}</span>
                  <span class="bg-white text-black p-2 rounded-end">{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F Y') }}</span>
              @endif
          </div>
          <h3 class=" fw-bold  py-2">{{ $post->title() }}</h3>
        </div>
      </div>

    </div>

    <div class="container-fluid py-lg-5 py-md-4 py-3 ">
        <div class="row">
           <div data-aos="flip-up" class="bg-img header-div p-0 overflow-hidden d-flex  justify-content-center" data-aos-duration="2000">
                <img class="w-100" src="{{ asset($post->image) }}">
           </div>
        </div>
    </div>

    <div class="container py-lg-5 py-md-4 py-3 blog_details">
        {!! $post['desc_'.lang()] !!}
    </div>

    <!-- recent psots -->
    <div class="container  section-top-service py-lg-5 py-md-4 py-3" >
        <div class="row">
          <h3  class="">@lang('front.our_recent_posts')</h3>
        </div>

        @foreach($recent_posts as $post)
            <x-post.cardPost :post="$post"/>
        @endforeach

      </div>

@stop



