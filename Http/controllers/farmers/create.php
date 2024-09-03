<?php

use Core\App;

$db = App::resolve(Core\Database::class);

$barangays = $db->query('SELECT * FROM barangays')->fetchAll(PDO::FETCH_ASSOC);

view('farmers/create.view.php',[
    'barangays' => $barangays,
    'errors' => \Core\Session::get('errors')
]);