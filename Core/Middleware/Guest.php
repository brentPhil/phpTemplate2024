<?php


namespace Core\Middleware;

use Closure;

class Guest {
    public function handle() {
        if ($_SESSION['user'] ?? false) {
            header('location:' . root('dashboard'));
            exit();
        }
    }
}