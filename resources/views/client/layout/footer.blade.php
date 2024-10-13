<footer>
    <div class="container py-5">
        <div class="row justify-content-between gy-3 align-items-center" data-aos="fade-up" >
            <div class="col-lg-2 col-md-4 col-12 text-white  align-items-start gap-3">
                <a class="navbar-brand py-2 text-center  m-0" href="{{ route('client.home') }}">
                    <img class=" h-auto logo_image"  src="{{ asset(setting('logo')) }}"  alt="logo_image"/>
                </a>
            </div>
            <div class="col-lg-7 col-md-4 col-12 ">

                <ul class="p-0 fs-6 d-flex flex-lg-nowrap flex-wrap flex-md-row flex-column gap-lg-5 gap-2">
                    <li class="py-lg-1 py-2">
                        <a href="{{  route('client.blog')}}">
                            @lang('trans.blog')
                        </a>
                    </li>

                    <li class="py-lg-1 py-2">
                        <a href="{{  route('client.faq')}}">
                            @lang('trans.faq')
                        </a>
                    </li>
                    <li class="py-lg-1 py-2">
                        <a href="{{ route('client.clientStories') }}">
                            @lang('front.clientStories')
                        </a>
                    </li>

                    <li class="py-lg-1 py-2">
                        <a href="{{ route('client.videos') }}">
                            @lang('front.videos')
                        </a>
                    </li>
                    <li class="py-lg-1 py-2">
                        <a href="{{  route('client.contactUsPage')}}">
                            @lang('trans.contact_us')
                        </a>
                    </li>
                    <li class="py-lg-1 py-2">
                        <a href="{{  route('client.jobs')}}">
                            @lang('front.jobs')
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6  col-12 emcan">
                <ul class="social d-flex px-0">
                    <li>
                        <a target="_blank" href="{{ setting('facebook') }}">
                            <i class="fab fa-facebook-f icon"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="{{ setting('twitter') }}">
                            <i class="fab fa-twitter icon"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="{{ setting('instagram') }}">
                            <i class="fa-brands fa-instagram icon"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://wa.me/{{ setting('whatsapp') }}"><i class="fa-brands fa-whatsapp icon"></i></a>
                    </li>
                </ul>

            </div>

            <div class=" col-12 d-flex  justify-content-end">

                <ul class="p-0 d-flex list-data-footer flex-lg-nowrap flex-wrap    gap-3">
                    <li class="">
                        <a href="{{  setting('huaweiAppLink')}}" class="" style="opacity: 1;">
                            <img src="{{ asset('images/huawei-appgallery.jpg') }}" alt="app-store" style="width: 120px; border-radius: 5px; height: 34px;">
                        </a>
                    </li>
                    <li class="">
                        <a href="{{  setting('appleAppLink')}}" class="" style="opacity: 1;">
                            <img src="{{ asset('images/app-store.png') }}" alt="app-store" style="width: 120px; border-radius: 5px; height: 34px;">
                        </a>
                    </li>
                    <li class="">
                        <a href="{{  setting('googleAppLink')}}" class="" style="opacity: 1;">
                            <img src="{{ asset('images/google-play.png') }}" alt="google-play" style="width: 120px; border-radius: 5px;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container py-3">


        <div class="row justify-content-between border-top border-light text-white-50 py-4 gy-3 fw-medium ">
            <div class="col-12 d-flex flex-md-row flex-column justify-content-center gap-lg-4 gap-2 align-items-center">
                <div class="     text-center  " style="color:white;opacity: 1; font-size:inherit" >
                    <ul class="p-0 mb-0 fs-6 d-flex flex-lg-nowrap flex-wrap gap-lg-5 gap-2">
                        <li class="py-lg-1 py-2">
                            <a href="{{ route('client.sidePages','privacy') }}">
                                @lang('trans.privacy')
                            </a>
                        </li>
                        <li class="py-lg-1 py-2">
                            <a href="{{ route('client.sidePages','terms') }}">
                                @lang('trans.terms')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class=" text-center  " style="color:white;opacity: 1; font-size:inherit" >© {{ now()->year }} <span class=""> <a target="_blank"  href="{{ route('client.home') }}"> {{  setting('title_'.lang())}} </a> </span>@lang('trans.all_right_reserved')
                </div>
            </div>

{{--            <div class="  col-12   emcan" style="color:white;opacity: 1; font-size:inherit" >--}}
{{--                <div class=" w-100 text-center">@lang('trans.powered_by')<span class=""> <a style="color:white;opacity: 1; font-size:inherit" target="_blank"  href="https://emcan-group.com/en"> Emcan Solutions</a> </span>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

    </div>
</footer>