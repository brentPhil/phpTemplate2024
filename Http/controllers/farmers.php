<?php

use Core\App;

$db = App::resolve(Core\Database::class);

$farmers = $db->query('SELECT * FROM farmers')->fetchAll(PDO::FETCH_ASSOC);

view('farmers.view.php', [
    'farmers' => $farmers,
]);