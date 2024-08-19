
<?php
$menuItems = [
    [
        'url' => '/phpTemplate2024/dashboard.php',
        'icon' => 'bi-speedometer',
        'label' => 'Dashboard',
    ],
    [
        'url' => '/phpTemplate2024/farmers.php',
        'icon' => 'bi-file-earmark-person',
        'label' => 'Farmers',
    ],
    // Add more items here as needed
];
?>

<aside class="hidden sm:block h-full border-r p-4 sm:w-20 md:w-80">

    <div class=" w-full flex-col items-center justify-center gap-3 border-b pb-4 md:py-4 flex">
        <div class="w-0 overflow-hidden rounded-full sm:w-10 md:w-28">
            <img alt="Site Logo" src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
        </div>
        <h3 class="hidden font-medium md:block">Title here</h3>
    </div>

    <ul class="menu menu-md space-y-2 w-full p-0 py-4 hidden sm:block">
        <?php foreach ($menuItems as $item): ?>
            <li>
                <a class="<?= urlIs($item['url']) ? 'active' : '' ?> rounded-md" href="<?= $item['url'] ?>">
                    <i class="bi <?= $item['icon'] ?>"></i>
                    <span class="hidden md:block"><?= $item['label'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</aside>
