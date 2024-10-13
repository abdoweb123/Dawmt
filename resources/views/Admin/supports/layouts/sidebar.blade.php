<li class="nav-item @if(str_contains(Route::currentRouteName(), 'supports')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#supports" aria-controls="supports" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fas fa-cog mx-2"></i>
        </span>
        <span class="text">{{ __('trans.supports') }}</span>
    </a>
    <ul id="supports" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.supports.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.supports.create') }}">{{ __('trans.add') }}</a></li>
        
    </ul>
</li>