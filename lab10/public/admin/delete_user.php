<?php
require_once __DIR__."/../../src/services/Auth.php";
require_once __DIR__."/../../src/request_handlers/DeleteUser.php";

if (!Auth::instance()->isLoggedAsAdmin()) {
    header("Location: ./login.php");
    die();
}

DeleteUserHandler::HandleRequest();

header("Location: ./edit_users.php");
die();