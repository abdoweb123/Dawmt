<li class="nav-item @if(str_contains(Route::currentRouteName(), 'jobs')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#jobs" aria-controls="jobs" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fas fa-briefcase mx-2"></i>
        </span>
        <span class="text">{{ __('trans.jobs') }}</span>
    </a>
    <ul id="jobs" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.jobs.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.jobs.create') }}">{{ __('trans.add') }}</a></li>

        <hr>
        <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#skills" aria-controls="skills" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fas fa-code mx-2"></i>
        </span>
            <span class="text">{{ __('trans.skills') }}</span>
        </a>
        <ul id="skills" class="dropdown-nav mx-4 collapse" style="">
            <li><a href="{{ route('admin.skills.index') }}">{{ __('trans.viewAll') }}</a></li>
            <li><a href="{{ route('admin.skills.create') }}">{{ __('trans.add') }}</a></li>
        </ul>
    </ul>
</li>