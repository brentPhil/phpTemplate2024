<?php

use Core\Database;
const BASE_PATH = __DIR__ . './../';
function base_path($path): string
{
    return BASE_PATH . $path;
}

require base_path('functions.php');

spl_autoload_register(function ($class)
{
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

$config = require('../config.php');
$db = new Database($config['Core']);

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $data = $db->query("SELECT * FROM farmers where id=?", [$id])->fetch(PDO::FETCH_ASSOC);

    // Return the data as a JSON response
    echo json_encode($data);
}

