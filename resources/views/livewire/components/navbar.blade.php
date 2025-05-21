<nav class="navbar bg-base-100 shadow-sm fixed h-16 px-5 z-50">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl">{{ env('APP_NAME') }}</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            @guest
                <li><a href="/register" class="link link-secondary link-hover mr-2">Daftar sekarang</a></li>
                <li><a href="/login" class="btn btn-sm btn-primary">Login</a></li>
            @endguest

            @auth
                <li>
                    <button type="button" wire:click="logout" class="btn btn-sm btn-error text-white">Logout</button>
                </li>
            @endauth
        </ul>
    </div>
</nav>
