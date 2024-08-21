<?php

return [
    [
        'url' => root('dashboard'),
        'path' => 'controllers/dashboard.php',
        'icon' => 'bi-speedometer',
        'label' => 'Dashboard',
        'onSidebar' => true,
    ],
    [
        'url' => root('farmers'),
        'path' => 'controllers/farmers.php',
        'icon' => 'bi-file-earmark-person',
        'label' => 'Farmers',
        'onSidebar' => true,
    ],
    [
        'url' => root('profile'),
        'path' => 'controllers/profile.php',
        'icon' => 'bi-file-earmark-person',
        'label' => 'Profile',
        'onSidebar' => false,
    ],
    [
        'url' => root('crops'),
        'path' => 'controllers/crops.php',
        'icon' => 'bi-bucket',
        'label' => 'Crops',
        'onSidebar' => true,
    ],
    [
    'url' => root('land'),
    'path' => 'controllers/land.php',
    'icon' => 'bi-bucket',
    'label' => 'Land',
    'onSidebar' => true,
],
// Add more items here as needed
];


