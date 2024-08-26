<aside id="myAside" class="hidden sm:block h-full border-r p-4 sm:w-20 md:w-80 ease-in-out transition-all">

    <div class=" w-full flex-col items-center justify-center gap-3 border-b pb-4 md:py-4 flex">
        <div id="logo" class="w-0 overflow-hidden rounded-full sm:w-10 md:w-28">
            <img alt="Site Logo" src="<?= assets('images/tabon.png', 'default.svg')?>" />
        </div>
        <h3 id="title" class="hidden font-medium md:block">Title here</h3>
    </div>

    <ul class="menu menu-md space-y-2 w-full p-0 py-4 hidden sm:block">
        <?php
        foreach ($sideBar_Items as $item): ?>
            <li>
                <a class="<?= urlIs($item['url']) ? 'active' : '' ?> rounded-md text-lg font-medium" href="<?= $item['url'] ?>">
                    <i class="bi <?= $item['icon'] ?>"></i>
                    <span class="hidden linkLabel md:block"><?= $item['label'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</aside>

