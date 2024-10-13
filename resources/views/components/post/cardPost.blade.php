<div class="row py-2">
    <div class="card   border-0   rounded-3 py-2">
        <div class="row align-items-center">
            <div class="card-header bg-white border-0 col-lg-6 col-md-5">
                <div class="img-card img-card-height d-flex justify-content-center rounded-2 align-items-start" >
                    <img src="{{ asset($post->image) }}" class="w-100">
                </div>
            </div>
            <div class="card-body col-lg-6 col-md-7">
                <div class="fs-14 py-2">
                    @if(lang() === 'ar')
                        <span class="bg-light text-black p-2 rounded-end">{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F Y') }}</span>
                        <span class="bg-primary-color text-white p-2 rounded-start">{{ $post->publisher?->title() }}</span>
                    @else
                        <span class="bg-primary-color text-white p-2 rounded-start">{{ $post->publisher?->title() }}</span>
                        <span class="bg-light text-black p-2 rounded-end">{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F Y') }}</span>
                    @endif
                </div>
                <h3 class="fw-bold py-2">{{ $post->title() }}</h3>
                <p class="text-secondary mb-0">{{ $post['brief_desc_'.lang()] }}</p>
                <div class="py-2">
                    <a class="fw-bold d-flex gap-2 align-items-center primary-color" href="{{ route('client.post_details',['id'=> $post->id, 'post_name' => formatName($post->title())]) }}">
                        <span class="text-decoration-underline">@lang('front.read_more')</span>
                        <span class="arrow pt-1"><i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>