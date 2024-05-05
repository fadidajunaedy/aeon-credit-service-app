<div class="navbar fixed flex justify-between bg-base-100 z-10 shadow-md px-4 h-[12vh]">
    <div class="navbar-start ">
        <label for="drawer-toggle" class="btn btn-ghost drawer-button lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
        </label>
    </div>
    <div class="navbar-end flex items-center gap-2">
        @if (auth()->user())
        <div class="flex items-center gap-4">
            
            <div class="flex flex-col justify-end">
                <p class="text-right">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-right">
                    {{ auth()->user()->email }}
                </p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#8E39D3" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
        </div>

        @endif
        <div class="dropdown dropdown-end">
            <ul tabIndex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52 rounded">
                <li>
                    <a href="/profile">Profile</a>
                </li>
                <li>
                    <button class="py-4" >Logout</button>
                </li>
            </ul>
        </div>
    </div>
</div>