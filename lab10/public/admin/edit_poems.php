<?php
require_once __DIR__."/../../src/services/Auth.php";
require_once __DIR__."/../../src/dao/PoemDaoPdo.php";

if (!Auth::instance()->isLoggedAsAdmin()) {
    header("Location: ./login.php");
    die();
}

$poemDao = new PoemDaoPdo(Auth::instance()->getDb());

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагування поем" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="card bg-light mb-3">    
    <div class="card-body justify-content-end">
      <h1>Виберіть поему для редагування або <a href="./add_poem.php">додайте нову</a></h1>

      <div class="list-group">
        <?php foreach ($poemDao->getAll() as $poem): ?>
        <a href="./edit_poem.php?id=<?= $poem->getId(); ?>" class="list-group-item list-group-item-action"><?= $poem->getName(); ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  </div> 

<?php
require_once __DIR__."/../templates/footer.php";
?>