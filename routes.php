<?php

// Initialize an empty heading variable
$heading = '';

// Define the sidebar items with URLs, paths, icons, and labels
$sideBar_Items = [
    [
        'url' => root('dashboard'),
        'path' => 'dashboard.php',
        'icon' => 'bi-speedometer',
        'label' => 'Dashboard',
    ],
    [
        'url' => root('farmers'),
        'path' => 'farmers/index.php',
        'icon' => 'bi-file-earmark-person',
        'label' => 'Farmers',
    ],
    // Add more items here as needed
];

// Iterate through each sidebar item
foreach ($sideBar_Items as $item) {

    // Define the route for each sidebar item, restricting access to authenticated users
    $router->get($item['url'], $item['path'])->only('auth');

    // Set the heading if the current URL matches the item's URL
    $item['url'] === $uri && $heading = $item['label'];
}

//if you don't want the new path or route to show on the sidebar then just define the routes below

// Registration routes
$router->get(root('register'), 'registration/create.php')->only('guest');
$router->post(root('register'), 'registration/store.php')->only('guest');

// Log in routes
$router->get(root('login'), 'session/create.php')->only('guest');
$router->post(root('login'), 'session/store.php')->only('guest');
//logout route
$router->delete(root('logout'), 'session/destroy.php')->only('auth');

//profile routes
root('profile') === $uri && $heading = 'User Profile';
$router->get(root('profile'), 'profile/create.php')->only('auth');
$router->post(root('profile'), 'profile/store.php')->only('auth');

//farmers routes
$router->get(root('farmers/create'), 'farmers/create.php')->only('auth');
$router->post(root('farmers'), 'farmers/store.php')->only('auth');
