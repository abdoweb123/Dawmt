<li class="nav-item @if(str_contains(Route::currentRouteName(), 'products')) active @endif">
    <a href="{{ route(activeGuard() . '.products.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-clone mx-2"></i>
        </span>
        <span class="text">{{ __('trans.products') }}</span>
    </a>
</li>
<li class="nav-item @if(str_contains(Route::currentRouteName(), 'sort')) active @endif">
    <a href="{{ route(activeGuard() . '.products.sort') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-arrow-up-wide-short mx-2"></i>
        </span>
        <span class="text">{{ __('trans.sort') }}</span>
    </a>
</li>