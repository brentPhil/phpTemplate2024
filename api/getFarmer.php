<?php
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'functions.php';
require BASE_PATH . 'bootstrap.php';

$db = \Core\App::resolve(Core\Database::class);

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $data = $db->query("SELECT f.*, b.name barangay, b.id bid FROM farmers f INNER JOIN barangays b ON b.id = f.barangays_id where f.id=?", [$id])->fetch(PDO::FETCH_ASSOC);

    // Return the data as a JSON response
    echo json_encode($data);
}