<?php

use Core\Database;

$config = require('../config.php');
$db = new Database($config['Core']);

$farmers = $db->query('SELECT * FROM farmers')->fetchAll(PDO::FETCH_ASSOC);

require view('farmers.view.php');