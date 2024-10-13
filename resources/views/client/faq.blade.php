@extends('client.layout.layout')

@section('title')
  @lang('trans.faq')
@stop


@section('content')

  <div class="container   text-center py-lg-5 py-2  rounded-3 position-relative container-policy">
    <div class="row justify-content-center position-relative py-lg-2 py-5">

      <div class="col-lg-10">
        <h4 class=" fw-bold h4-home"> @lang('trans.faq')</h4>
        <p>{{ setting('faqTitle_'.lang()) }}</p>
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

        <span class="bg-Secondary-color border border-2 border-black rounded-pill px-3 py-1 mx-4">@lang('trans.concerns')</span>
          
      </div>

          </div>
          <div class="position-absolute start-0 end-0 bottom-0 d-flex justify-content-between">
              <div class="arrow1 d-flex flex-column-reverse">
                <span class="bg-Secondary-color text-white border border-2 border-black rounded-pill mt-auto px-3 py-1 mx-4"> @lang('trans.faq')</span>

                <span class="ms-auto" >
                  <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_781_2540)">
                    <g filter="url(#filter0_d_781_2540)">
                    <path d="M32.2383 10.3806L26.9977 36.0837L20.8828 26.4035L10.9826 23.8074L32.2383 10.3806Z" fill="#FAB040"/>
                    </g>
                    <g filter="url(#filter1_d_781_2540)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M33.875 8.01062L27.5437 39.0632L20.1658 27.3835L8.18126 24.2409L33.875 8.01062ZM30.6023 12.7507L13.7847 23.3741L21.6006 25.4236L26.4524 33.1044L30.6023 12.7507Z" fill="#353535"/>
                    </g>
                    </g>
                    <defs>
                    <filter id="filter0_d_781_2540" x="7.31576" y="8.91395" width="28.5892" height="33.0365" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="2.2"/>
                    <feGaussianBlur stdDeviation="1.83333"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_781_2540"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_781_2540" result="shape"/>
                    </filter>
                    <filter id="filter1_d_781_2540" x="4.51497" y="6.54395" width="33.0267" height="38.3859" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="2.2"/>
                    <feGaussianBlur stdDeviation="1.83333"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_781_2540"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_781_2540" result="shape"/>
                    </filter>
                    <clipPath id="clip0_781_2540">
                    <rect width="38" height="38" fill="white" transform="translate(36.7051) rotate(75)"/>
                    </clipPath>
                    </defs>
                    </svg>
                    
                    
                    
                </span>

              </div>
              <div class="arrow2 d-flex flex-column-reverse">
                <span class="bg-primary-color text-white border border-2 border-black rounded-pill mt-auto px-3 py-1 mx-4">@lang('trans.community')</span>

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

  <div class="container my-lg-5 my-3 section-top">
    <div class="row">
      <div class="accordion accordion-home col-12" id="accordionExample">
        @foreach($faqs as $index => $faq)
          <div class="accordion-item border-top-0 border-end-0 border-start-0">
            <h2 class="accordion-header">
              <button class="accordion-button px-0 fs-4 {{ $index == 0 ? '' : 'collapsed' }}"
                      type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse{{ $index }}"
                      aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                      aria-controls="collapse{{ $index }}">
                {{ $faq['question_'.lang()] }}
              </button>
            </h2>
            <div id="collapse{{ $index }}"
                 class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                 data-bs-parent="#accordionExample">
              <div class="accordion-body px-0">
                <p> {{ $faq['answer_'.lang()] }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>


@stop
