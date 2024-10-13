@extends('client.layout.layout')

@section('title')
  @lang('front.ess_application')
@stop


@section('content')

<div class="container   text-center py-5  rounded-3 position-relative">
    <div class="row justify-content-center position-relative py-2 overflow-hidden">

      <div class="col-lg-10 col-12">
        <h4 class=" fw-bold h4-home">@lang('front.employment_self_service')</h4>
        <p>{{ setting('ess_application_title_'.lang()) }}</p>
      </div>
    </div>
    <div class="row py-2">
      <div class=" w-100 d-flex flex-column align-items-center">
        <a class="btn bg-primary-color text-white px-4 btn  myb-lg-1  rounded-3 gap-2 mb-5 py-2" data-bs-toggle="modal" data-bs-target="#register">@lang('front.try_it_now_enjoy_work_more')
</a>
      </div>
    </div>
    <div class="position-absolute start-0 end-0 d-flex justify-content-end top-0 py-5">
      <div class="arrow3 d-flex flex-column-reverse">
        <span class="me-auto" >
          <svg width="37" height="37" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_706_3031)">
            <g filter="url(#filter0_d_706_3031)">
            <path d="M14.2972 36.1603L19.5379 10.4572L25.6527 20.1374L35.5529 22.7335L14.2972 36.1603Z" fill="#FBC16A"/>
            </g>
            <g filter="url(#filter1_d_706_3031)">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6609 38.5298L18.9922 7.47721L26.3701 19.1569L38.3546 22.2995L12.6609 38.5298ZM15.9336 33.7897L32.7512 23.1663L24.9353 21.1168L20.0835 13.436L15.9336 33.7897Z" fill="#17191C"/>
            </g>
            </g>
            <defs>
            <filter id="filter0_d_706_3031" x="10.6306" y="8.99049" width="28.5889" height="33.0365" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
            <feOffset dy="2.2"/>
            <feGaussianBlur stdDeviation="1.83333"/>
            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_706_3031"/>
            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_706_3031" result="shape"/>
            </filter>
            <filter id="filter1_d_706_3031" x="8.99422" y="6.01051" width="33.0271" height="38.3859" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
            <feOffset dy="2.2"/>
            <feGaussianBlur stdDeviation="1.83333"/>
            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_706_3031"/>
            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_706_3031" result="shape"/>
            </filter>
            <clipPath id="clip0_706_3031">
            <rect width="38" height="38" fill="white" transform="translate(9.83508 46.54) rotate(-105)"/>
            </clipPath>
            </defs>
            </svg>
        </span>

        <span class="bg-Secondary-color border border-2 border-black rounded-pill px-3 py-1 mx-4">@lang('front.Sallam')</span>
          
      </div>
            </div>
            <div class="position-absolute start-0 end-0 bottom-0 d-flex justify-content-between">
              <div class="arrow1 d-flex flex-column-reverse">
                <span class="bg-primary-color text-white border border-2 border-black rounded-pill mt-auto px-3 py-1 mx-4">@lang('front.Layla')</span>

                <span class="ms-auto" >
                  <svg width="37" height="37" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_706_3038)">
                    <g filter="url(#filter0_d_706_3038)">
                    <path d="M32.243 10.3798L27.0024 36.0829L20.8876 26.4026L10.9874 23.8066L32.243 10.3798Z" fill="#1A70B2"/>
                    </g>
                    <g filter="url(#filter1_d_706_3038)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M33.8793 8.01025L27.548 39.0628L20.1701 27.3831L8.18558 24.2405L33.8793 8.01025ZM30.6066 12.7504L13.789 23.3737L21.6049 25.4232L26.4567 33.104L30.6066 12.7504Z" fill="#353535"/>
                    </g>
                    </g>
                    <defs>
                    <filter id="filter0_d_706_3038" x="7.32071" y="8.91309" width="28.589" height="33.0365" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="2.2"/>
                    <feGaussianBlur stdDeviation="1.83333"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_706_3038"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_706_3038" result="shape"/>
                    </filter>
                    <filter id="filter1_d_706_3038" x="4.51891" y="6.54359" width="33.0271" height="38.3859" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="2.2"/>
                    <feGaussianBlur stdDeviation="1.83333"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_706_3038"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_706_3038" result="shape"/>
                    </filter>
                    <clipPath id="clip0_706_3038">
                    <rect width="38" height="38" fill="white" transform="translate(36.7051) rotate(75)"/>
                    </clipPath>
                    </defs>
                    </svg>
                    
                    
                </span>

              </div>
              <div class="arrow2 d-flex flex-column-reverse">
                <span class="bg-primary-color text-white border border-2 border-black rounded-pill mt-auto px-3 py-1 mx-4">@lang('front.Ahmed')</span>

                <span class="me-auto" >
                  <svg width="37" height="37" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_706_3024)">
                    <g filter="url(#filter0_d_706_3024)">
                    <path d="M8.87183 6.99695L32.3427 18.7115L21.4097 22.1125L16.3398 31.0035L8.87183 6.99695Z" fill="#4C9EDD"/>
                    </g>
                    <g filter="url(#filter1_d_706_3024)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.00598 4.80286L35.3618 18.9555L22.1705 23.059L16.0332 33.8218L7.00598 4.80286ZM10.7375 9.19086L16.6462 28.1849L20.6487 21.1658L29.3236 18.4673L10.7375 9.19086Z" fill="#17191C"/>
                    </g>
                    </g>
                    <defs>
                    <filter id="filter0_d_706_3024" x="5.20516" y="5.53028" width="30.8043" height="31.3398" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="2.2"/>
                    <feGaussianBlur stdDeviation="1.83333"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_706_3024"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_706_3024" result="shape"/>
                    </filter>
                    <filter id="filter1_d_706_3024" x="3.33931" y="3.33619" width="35.6892" height="36.3523" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="2.2"/>
                    <feGaussianBlur stdDeviation="1.83333"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_706_3024"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_706_3024" result="shape"/>
                    </filter>
                    <clipPath id="clip0_706_3024">
                    <rect width="38" height="38" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
                    
                    
                    
                </span>

              </div>
      
                    </div>
  </div>

<div class="container   text-center py-lg-5 py-2  rounded-3 position-relative">

    <div class="row justify-content-center py-2">
      <div class="col-10  ">
        <img src="{{ asset(setting('ess_application_profile_image')) }}" />
      </div>
    </div>

  </div>

<div class="bg-primary-color">
    <div class="container py-lg-5 py-3">
      <div class="row about justify-content-lg-between  justify-content-center  align-items-center">
        <div class="col-lg-6 col-md-7  col-12 text-white" data-aos="fade-up" data-aos-duration="1500">
          <div class="row">
            <div class="col-12">
              <h6 class="py-2 ">@lang('trans.employeeServices')</h6>

            </div>
          </div>
          @foreach($employeeServices as $employeeService)
            <div class="row py-2">
              <div class="col-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="12" cy="12" r="12" fill="white" fill-opacity="0.31" />
                  <circle cx="12" cy="12" r="9" fill="white" fill-opacity="0.51" />
                  <circle cx="12" cy="12" r="5" fill="white" />
                </svg>
              </div>
              <div class="col-10">
                <h6>{{ $employeeService['title_'.lang()] }}</h6>
                <p class="fs-14 text-white-50">{{  $employeeService['desc_'.lang()]}}</p>
              </div>
            </div>
          @endforeach
        </div>

        <div class="col-lg-4 col-md-5  col-12   overflow-hidden p-0">
          <img class="w-100" src="{{ asset(setting('ess_application_image')) }}" />

        </div>
      </div>

    </div>
  </div>

@stop