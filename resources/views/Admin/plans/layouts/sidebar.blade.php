<li class="nav-item @if(str_contains(Route::currentRouteName(), 'plans')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#plans" aria-controls="plans" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fas fa-tachometer-alt mx-2"></i>
        </span>
        <span class="text">{{ __('trans.plans') }}</span>
    </a>
    <ul id="plans" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.plans.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.plans.create') }}">{{ __('trans.add') }}</a></li>

        <hr>
        <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#features" aria-controls="features" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-bolt mx-2"></i>
        </span>
            <span class="text">{{ __('trans.features') }}</span>
        </a>
        <ul id="features" class="dropdown-nav mx-4 collapse" style="">
            <li><a href="{{ route('admin.features.index') }}">{{ __('trans.viewAll') }}</a></li>
            <li><a href="{{ route('admin.features.create') }}">{{ __('trans.add') }}</a></li>
        </ul>
    </ul>
</li>