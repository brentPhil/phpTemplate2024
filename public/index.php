<?php
session_start();
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'functions.php';

require base_path('bootstrap.php');

require base_path('Http/controllers/index.php');