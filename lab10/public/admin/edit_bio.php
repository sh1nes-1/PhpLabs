<?php
require_once __DIR__."/../../src/services/Auth.php";

if (!Auth::instance()->isLoggedAsAdmin()) {
    header("Location: ./login.php");
    die();
}

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагування біографії" => "#",
];

require_once __DIR__."/../templates/head.php";
?>



<?php
require_once __DIR__."/../templates/footer.php";
?>