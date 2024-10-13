<li class="nav-item @if(str_contains(Route::currentRouteName(), 'packages')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#packages" aria-controls="packages" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-icons mx-2"></i>
        </span>
        <span class="text">{{ __('trans.packages') }}</span>
    </a>
    <ul id="packages" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.packages.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.packages.create') }}">{{ __('trans.add') }}</a></li>

        <hr>
        <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#items" aria-controls="items" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-icons mx-2"></i>
        </span>
            <span class="text">{{ __('trans.items') }}</span>
        </a>
        <ul id="items" class="dropdown-nav mx-4 collapse" style="">
            <li><a href="{{ route('admin.items.index') }}">{{ __('trans.viewAll') }}</a></li>
            <li><a href="{{ route('admin.items.create') }}">{{ __('trans.add') }}</a></li>
        </ul>
    </ul>
</li>