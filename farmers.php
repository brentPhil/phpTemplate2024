<?php

require 'functions.php';
require 'Database.php';

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'farmers';

$farmers = $db->query('SELECT * FROM farmers')->fetchAll(PDO::FETCH_ASSOC);

require 'src/views/farmers.view.php';