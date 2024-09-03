<?php

use Core\App;

$db = App::resolve(Core\Database::class);

$farmers = $db->query('SELECT f.*, b.name barangay, b.id bid FROM farmers f INNER JOIN barangays b ON b.id = f.barangays_id')->fetchAll(PDO::FETCH_ASSOC);

view('farmers/index.view.php', [
    'farmers' => $farmers,
]);