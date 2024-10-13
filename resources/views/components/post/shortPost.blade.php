<div class=" p-2 ">
    <div class="card   border-0    rounded-3 py-2">
        <div class="card-header bg-white border-0 ">
            <div class="img-card d-flex align-items-center justify-content-center rounded-2">
                <img src="{{ asset($post->image) }}" class="w-100">
            </div>
        </div>
        <div class="card-body ">
            <div class="fs-14 py-2">
                @if(lang() === 'ar') <!-- Check if the current locale is Arabic -->
                <span class="bg-white text-black p-2 rounded-end">{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F Y') }}</span>
                <span class="bg-Secondary-color text-white p-2 rounded-start">{{ $post->publisher?->title() }}</span>
                @else
                    <span class="bg-Secondary-color text-white p-2 rounded-start">{{ $post->publisher?->title() }}</span>
                    <span class="bg-white text-black p-2 rounded-end">{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F Y') }}</span>
                @endif
            </div>
            <h3 class="fw-bold py-2">{{ $post->title() }} </h3>
            <p class="text-secondary">{{ $post['brief_desc_'.lang()] }}</p>
            <div>
                <a class="fw-bold d-flex gap-2 align-items-center primary-color" href="{{ route('client.post_details',['id'=> $post->id, 'post_name' => formatName($post->title())]) }}">
                    <span class="text-decoration-underline">@lang('front.read_more')</span>
                    <span class="arrow pt-1"><i class="fa-solid fa-arrow-right"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>