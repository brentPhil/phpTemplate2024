<?php

$farmers = $db->query('SELECT * FROM farmers')->fetchAll(PDO::FETCH_ASSOC);

require 'src/views/farmers.view.php';