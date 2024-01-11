<?php

namespace App\Controllers;
use App\Controllers\HomeController;
class AuthMiddlewareController {
    public static function handle() {
        if (!isset($_SESSION['id_user'])) {
            $view = new HomeController();
            $view->index();
            exit;
        }
    }
}
