<?php
require_once __DIR__."/../../src/services/Auth.php";

if (!Auth::instance()->isLoggedAsEditor()) {
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
  <div class="card bg-light mb-3">    
    <div class="card-body admin-greeting justify-content-end">
        <span>Вітаємо, <?= $user->getUsername(); ?></span>
        <span class="logout_link">[ <a href="logout.php">Вихід</a> ]</span>
    </div>
  </div>      
  
  <div class="card bg-light mb-3">    
    <div class="card-body justify-content-end">
      <h1>Виберіть дію</h1>

      <div class="list-group">
        <a href="./edit_short_bio.php" class="list-group-item list-group-item-action">Редагувати коротку біографію</a>
        <a href="#" class="list-group-item list-group-item-action">Редагувати біографію</a>
        <a href="#" class="list-group-item list-group-item-action">Редагувати поеми</a>

        <?php if ($user->isAdmin()): ?>
        <a href="./edit_users.php" class="list-group-item list-group-item-action">Редагувати користувачів</a>
        <?php endif; ?>
      </div>
    </div>
  </div>   

<?php
require_once __DIR__."/../templates/footer.php";
?>