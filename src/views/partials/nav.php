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
            <div tabindex="0" class="dropdown-content z-10 mt-3 w-52 rounded-md bg-base-100 p-2 shadow">
                <ul class="menu menu-md p-0 py-1">
                    <li>
                        <a class="justify-between" href="<?= root('profile')?>">
                            Profile
                        </a>
                    </li>

                    <li><a>Settings</a></li>
                </ul>

                <!--logout-->
                <form method="POST" class="w-full" action="<?= root('logout')?>">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="rounded-md btn btn-sm w-full">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

