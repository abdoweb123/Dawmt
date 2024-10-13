<li class="nav-item @if(str_contains(Route::currentRouteName(), 'faq')) active @endif">
    <a href="{{ route(activeGuard().'.faq.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-person-circle-question mx-2"></i>
        </span>
        <span class="text">{{ __('trans.FAQ') }}</span>
    </a>
</li>