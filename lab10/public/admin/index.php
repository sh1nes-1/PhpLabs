<?php
require_once __DIR__."/../../src/services/Auth.php";

if (!Auth::instance()->isLoggedAsAdmin()) {
    header("Location: ./login.php");
    die();
}

$user = Auth::instance()->getUser();

$is_nav_page_admin = true;

$breadcrumb_path = [
    "Панель адміністратора" => "#",
];

require_once __DIR__."/../templates/head.php";
?>
  <div class="card bg-light mb-3 bio">    
    <div class="card-body admin-greeting justify-content-end">
        <span>Вітаємо, <?= $user->getUsername(); ?></span>
        <span class="logout_link">[ <a href="logout.php">Вихід</a> ]</span>
    </div>
  </div>      


<?php
require_once __DIR__."/../templates/footer.php";
?>