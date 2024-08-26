<?php

use Core\App;

$db = App::resolve(Core\Database::class);

$admin = $db->query('SELECT * FROM admins WHERE id = :id',[
    ':id' => $_SESSION['user']['id']
])->fetch(PDO::FETCH_ASSOC);

view('profile/create.view.php', [
    'admin' => $admin,
    'errors' => \Core\Session::get('errors')
]);

