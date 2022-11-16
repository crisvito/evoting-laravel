<ul class="navbar h-full content-between">
    <li>
        <i class="fa-sharp fa-solid fa-house"></i>
        <x-nav-link :href="route('admin.dashboard.index')" :active="request()->routeIs('admin.dashboard.index')">
            {{ __('Home') }}
        </x-nav-link>
    </li>
    <li>
        <i class="fa-solid fa-users"></i>
        <x-nav-link :href="route('admin.voters.index')" :active="request()->routeIs('admin.voters.index')">
            {{ __('Voters') }}
        </x-nav-link>
    </li>
    <li>
        <i class="fa-solid fa-users-line"></i>
        <x-nav-link :href="route('admin.candidates.index')" :active="request()->routeIs('admin.candidates.index')">
            {{ __('Candidates') }}
        </x-nav-link>
    </li>
    <li>
        <i class="fa-solid fa-book-open"></i>
        <x-nav-link :href="route('admin.dashboard.index')" :active="request()->routeIs('admin.dashboard.show')">
            {{ __('Details') }}
        </x-nav-link>
    </li>
    <li>
        <i class="fa-solid fa-lock"></i>
        <x-nav-link :href="route('admin.dashboard.index')" :active="request()->routeIs('admin.dashboard.edit')">
            {{ __('Admin') }}
        </x-nav-link>
    </li>
    <li>
        <i class="fa-solid fa-user"></i>
        <x-nav-link :href="route('admin.dashboard.index')" :active="request()->routeIs('admin.dashboard.edit')">
            {{ __('Profile') }}
        </x-nav-link>
    </li>
</ul>

<div class="flex gap-4 items-center mb-5 cursor-pointer hover:blur-xs">
    <i class="fa-solid fa-bars fa-xl"></i>
    <p>More</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</div>
