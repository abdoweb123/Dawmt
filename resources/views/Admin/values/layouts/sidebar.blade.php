<li class="nav-item @if(str_contains(Route::currentRouteName(), 'values')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#values" aria-controls="values" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fas fa-tachometer-alt mx-2"></i>
        </span>
        <span class="text">{{ __('trans.values') }}</span>
    </a>
    <ul id="values" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.values.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.values.create') }}">{{ __('trans.add') }}</a></li>
        
    </ul>
</li>