<li class="nav-item @if(str_contains(Route::currentRouteName(), 'employeeServices')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#employeeServices" aria-controls="employeeServices" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fas fa-chart-bar mx-2"></i>
        </span>
        <span class="text">{{ __('trans.employeeServices') }}</span>
    </a>
    <ul id="employeeServices" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.employeeServices.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.employeeServices.create') }}">{{ __('trans.add') }}</a></li>
    </ul>
</li>