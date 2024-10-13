<div class="container bg-primary-color  rounded-2">
    <div
            class="row about justify-content-lg-between  justify-content-center  align-items-center flex-lg-row flex-column-reverse">
        <div class="col-lg-6 col-md-7  col-12 " data-aos="fade-up" data-aos-duration="1500">
            <div class="row justify-content-end py-lg-2 py-3">
                <div class="col-lg-11 text-white">
                    <h4 class="py-2 fw-semibold">{{ setting('joinUsTitle_'.lang()) }}</h4>
                    <p class=" py-2">  {{ setting('joinUsDesc_'.lang()) }}</p>
                    <div class="d-flex">
                        <a class="fw-bold bg-white d-flex py-2 w-auto gap-2 px-md-4 px-3 align-items-center primary-color rounded-2" href="" tabindex="-1"  data-bs-toggle="modal" data-bs-target="#register">
                            <span class="">@lang('trans.Join_us_now')</span>
                            <span class="arrow pt-1"><i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-lg-5 col-md-5  col-12 small-img-sevice  overflow-hidden p-0">
            <div class="  w-100 h-100" data-aos="flip-up" data-aos-duration="1500">
                <div class="img-card d-flex align-items-center header rounded-0 h-100 rounded-end">

                    <img src="{{ asset(setting('joinUs_image')) }}" class=" rounded-3">
                </div>
            </div>

        </div>
    </div>
</div>