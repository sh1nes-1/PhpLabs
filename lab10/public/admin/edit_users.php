<?php
require_once __DIR__."/../../src/services/Auth.php";
require_once __DIR__."/../../src/dao/RoleDaoPdo.php";

if (!Auth::instance()->isLoggedAsAdmin()) {
    header("Location: ./login.php");
    die();
}

$userDao = new UserDaoPdo(Auth::instance()->getDb());
$roleDao = new RoleDaoPdo(Auth::instance()->getDb());

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагування користувачів" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<table class="table table-hover users">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ім'я користувача</th>
      <th scope="col">Роль</th>
      <th scope="col" style="width: 25%">Дії</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($userDao->getAll() as $user): ?>
    <tr>
      <th scope="row"><?= $user->getId(); ?></th>
      <td><?= $user->getUsername(); ?></td>
      <td><?= $roleDao->getById($user->getRoleId())->getName(); ?></td>
      <td>
        <a href="./edit_user.php?id=<?= $user->getId(); ?>"><button type="button" class="btn btn-info" <?= ($user->getId() == Auth::instance()->getUser()->getId()) ? 'disabled' : ''; ?>>Редагувати</button></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table> 

<?php
require_once __DIR__."/../templates/footer.php";
?>