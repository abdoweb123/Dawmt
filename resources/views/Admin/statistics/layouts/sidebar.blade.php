<li class="nav-item @if(str_contains(Route::currentRouteName(), 'statistics')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#statistics" aria-controls="statistics" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fas fa-chart-bar mx-2"></i>
        </span>
        <span class="text">{{ __('trans.statistics') }}</span>
    </a>
    <ul id="statistics" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.statistics.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.statistics.create') }}">{{ __('trans.add') }}</a></li>
    </ul>
</li>