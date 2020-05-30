<?php
require_once __DIR__."/../../src/services/Auth.php";
require_once __DIR__."/../../src/dao/RoleDaoPdo.php";
require_once __DIR__."/../../src/request_handlers/EditUser.php";

if (!Auth::instance()->isLoggedAsAdmin()) {
    header("Location: ./login.php");
    die();
}

if (EditUserHandler::tryHandleForm()) {
  header('Location: ./edit_users.php');
  die();
}

$user = EditUserHandler::getUser();

$userDao = new UserDaoPdo(Auth::instance()->getDb());
$roleDao = new RoleDaoPdo(Auth::instance()->getDb());

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагування користувачів" => "./edit_users.php",
    "Редагувати користувача" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="row justify-content-center">
    <div class="login_form col-md-4">
      <div class="card bg-light mb-3 bio">    
        <div class="card-header">
            <h1 class="bio-text-header text-center">Редагувати користувача</h1>
        </div>
        <div class="card-body">
          <form method="POST">
            <input type="hidden" name="id" value="<?= $user->getId(); ?>">

            <div class="form-group">
              <label for="username">Ім'я користувача</label>
              <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Ім'я користувача" value="<?= $user->getUsername(); ?>">
            </div>

            <div class="form-group">
              <label for="password">Роль</label>
              <select name="role_id" class="form-control">
                  <?php foreach ($roleDao->getAll() as $role): ?>
                    <option value="<?= $role->getId(); ?>" <?= ($role->getId() == $user->getRoleId()) ? 'selected' : '' ?>><?= $role->getName(); ?></option>
                  <?php endforeach; ?>
              </select>
            </div>            

            <button type="submit" class="btn btn-primary form-sumbit">Зберегти</button>
          </form>
          <div class="form_error_block">
              <span class="form_error_text">
                <?= EditUserHandler::getFormError(); ?>
              </span>
          </div>
        </div>
      </div>
    </div>
</div>


<?php
require_once __DIR__."/../templates/footer.php";
?>