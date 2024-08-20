<div class="navbar h-fit border-b bg-base-100">
    <div class="flex-1">
        <div class="flex-none">
            <button class="btn btn-square btn-ghost btn-md" id="toggleButton">
                <i class="bi bi-list text-2xl"></i>
            </button>
        </div>
    </div>
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="avatar btn btn-circle btn-ghost">
                <div class="w-10 rounded-full">
                    <img alt="Profile Photo" src="<?= assets('', 'images/default.svg')?>" />
                </div>
            </div>
            <ul tabindex="0" class="dropdown-content menu menu-sm z-[1] mt-3 w-52 rounded-md bg-base-100 p-2 shadow">
                <li>
                    <a class="justify-between">
                        Profile
                        <span class="badge">New</span>
                    </a>
                </li>
                <li><a>Settings</a></li>
                <li><a>Logout</a></li>
            </ul>
        </div>
    </div>
</div>

