<li class="nav-item @if(str_contains(Route::currentRouteName(), 'posts')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#posts" aria-controls="posts" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-pencil-alt mx-2"></i>
        </span>
        <span class="text">{{ __('trans.blog') }}</span>
    </a>
    <ul id="posts" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.posts.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.posts.create') }}">{{ __('trans.add') }}</a></li>

        <hr>
        <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#publishers" aria-controls="publishers" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fas fa-user-edit mx-2"></i>
        </span>
            <span class="text">{{ __('trans.publishers') }}</span>
        </a>
        <ul id="publishers" class="dropdown-nav mx-4 collapse" style="">
            <li><a href="{{ route('admin.publishers.index') }}">{{ __('trans.viewAll') }}</a></li>
            <li><a href="{{ route('admin.publishers.create') }}">{{ __('trans.add') }}</a></li>
        </ul>
    </ul>
</li>