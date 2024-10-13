@extends('client.layout.layout')

@section('title')
    @lang('trans.plans')
@stop

@push('styles')
    <style>
        .div {
            display: flex;                /* Make the plan card a flex container */
            flex-direction: column;       /* Stack children vertically */
            height: 100%;                 /* Ensure it takes the full height */
        }

        /* Ensure the features and button take up space properly */
        .py-2 {
            flex-grow: 1;                 /* Allow the features area to grow and take available space */
        }

        /* Align button to the bottom */
        .w-100.d-flex.flex-column.align-items-center {
            margin-top: auto;             /* This will push this div to the end */
        }
    </style>
@endpush


@section('content')

    <div class="container  ">
        <div class="row  d-flex justify-content-center align-items-center">
            <div class="col-12 ">
                <div class="row py-2">
                    <h3 class="text-center primary-color fw-bold mb-0 lh-sm">
                        @lang('front.affordablePlans')
                    </h3>
                    <h3 class="text-center fw-bold mb-0 lh-sm">
                        @lang('front.forAllCompanies')
                    </h3>
                    <p class="text-center">@lang('front.chooseThePlanThatMeetsYourNeeds')</p>
                </div>
                <div class="row py-3 gy-3 plans">
                    @foreach($plans as $plan)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="div  border p-3 rounded-3 {{ $plan->most_popular ? 'bg-primary-color text-white' : '' }} position-relative h-100">
                               @if($plan->most_popular )
                                    <div class="position-absolute badge " >
                                        <span class="bg-Secondary-color border border-2 border-black rounded-pill px-3 py-1 ">@lang('trans.most_popular')</span>

                                    </div>
                               @endif
                                <div class="border-bottom py-3 text-center px-2">
                                    <h5 class="fw-semibold fs-3">{{ $plan->title() }}</h5>
                                    <p class="fs-14">{{ $plan['desc_'.lang()] }}</p>
                                </div>

                                <div class="py-2">
                                    @forelse($plan->features as $feature)
                                        @if($feature->type == 'normal')
                                            <p>{{ $feature->title() }} </p>
                                        @endif
                                    @empty
                                    @endforelse
                                </div>

                               <div class="div">
                                   <div>
                                       @if(count($plan->features))
                                           <h6 class="fw-semibold">@lang('dash.advanced_features'):</h6>
                                           <ul class="px-0" style="list-style-position: inside;">
                                               @forelse($plan->features as $feature)
                                                   @if($feature->type == 'advanced')
                                                       <li class="d-flex align-items-center gap-2 py-2">
                                               <span class="">
                                                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="24" height="24" rx="12" fill="white"/>
                                                    <path d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z" fill="white"/>
                                                    <path d="M10.5795 15.5796C10.3795 15.5796 10.1895 15.4996 10.0495 15.3596L7.21945 12.5296C6.92945 12.2396 6.92945 11.7596 7.21945 11.4696C7.50945 11.1796 7.98945 11.1796 8.27945 11.4696L10.5795 13.7696L15.7195 8.62961C16.0095 8.33961 16.4895 8.33961 16.7795 8.62961C17.0695 8.91961 17.0695 9.39961 16.7795 9.68961L11.1095 15.3596C10.9695 15.4996 10.7795 15.5796 10.5795 15.5796Z" fill="#1B76BB"/>
                                                  </svg>
                                               </span>
                                                           <span class="">{{ $feature->title() }}</span>
                                                       </li>
                                                   @endif
                                               @empty
                                               @endforelse
                                           </ul>
                                       @endif
                                   </div>

                                   <div class=" w-100 d-flex flex-column align-items-center">
                                       <a class="btn {{ $plan->most_popular ? 'primary-color bg-white' : 'bg-primary-color text-white'}}  px-4 btn w-100  rounded-3 gap-2 my-2 py-2" data-bs-toggle="modal" data-bs-target="#register">@lang('front.request_a_demo_now')</a>
                                   </div>
                               </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('client.layout.contactSales')

@stop

@push('scripts')





@endpush