<ul class="navbar h-full content-between">
    <li>
        <i class="fa-sharp fa-solid fa-house"></i>
        <x-nav-link :href="route('warga.dashboard.index')" :active="request()->routeIs('warga.dashboard.index')">
            {{ __('Home') }}
        </x-nav-link>
    </li>
    <li>
        <i class="fa-solid fa-magnifying-glass"></i>
        <x-nav-link :href="route('warga.dashboard.index')" :active="request()->routeIs('warga.dashboard.create')">
            {{ __('Explore') }}
        </x-nav-link>
    </li>
    <li>
        <i class="fa-regular fa-message"></i>
        <x-nav-link :href="route('warga.dashboard.index')" :active="request()->routeIs('warga.dashboard.edit')">
            {{ __('Messages') }}
        </x-nav-link>
    </li>
    <li>
        <i class="fa-regular fa-heart"></i>
        <x-nav-link :href="route('warga.dashboard.index')" :active="request()->routeIs('warga.dashboard.show')">
            {{ __('Notifications') }}
        </x-nav-link>
    </li>
    <li>
        <i class="fa-regular fa-square-plus"></i>
        <x-nav-link :href="route('warga.dashboard.index')" :active="request()->routeIs('warga.dashboard.edit')">
            {{ __('Create') }}
        </x-nav-link>
    </li>
    <li>
        <i class="fa-regular fa-circle-user"></i>
        <x-nav-link :href="route('warga.dashboard.index')" :active="request()->routeIs('warga.dashboard.edit')">
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
