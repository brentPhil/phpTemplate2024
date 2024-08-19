<?php

require '../functions.php';
require '../Database.php';

$config = require('../config.php');
$db = new Database($config['database']);

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $data = $db->query("SELECT * FROM farmers where id=?", [$id])->fetch(PDO::FETCH_ASSOC);

    // Return the data as a JSON response
    echo json_encode($data);
}

