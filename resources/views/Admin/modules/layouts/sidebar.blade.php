<li class="nav-item @if(str_contains(Route::currentRouteName(), 'modules')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#modules" aria-controls="modules" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fas fa-cubes mx-2"></i>
        </span>
        <span class="text">{{ __('trans.theModules') }}</span>
    </a>
    <ul id="modules" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.modules.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.modules.create') }}">{{ __('trans.add') }}</a></li>
    </ul>
</li>