<?php
require_once __DIR__."/../../src/services/Auth.php";

if (Auth::instance()->isLoggedIn()) {
    Auth::instance()->logOut();
}

header("Location: /");