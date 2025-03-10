<li class="nav-item @if(str_contains(Route::currentRouteName(), 'clientStories')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#clientStories" aria-controls="clientStories" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-video mx-2"></i>
        </span>
        <span class="text">{{ __('trans.clientStories') }}</span>
    </a>
    <ul id="clientStories" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.clientStories.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.clientStories.create') }}">{{ __('trans.add') }}</a></li>
        
    </ul>
</li>