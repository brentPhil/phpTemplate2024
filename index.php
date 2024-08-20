<?php

require 'functions.php';
require 'Database.php';
require 'Response.php';
$config = require('config.php');
$db = new Database($config['database']);

require 'router.php';
