<?php
require_once __DIR__."/../../src/services/Auth.php";
require_once __DIR__."/../../src/dao/RoleDaoPdo.php";
require_once __DIR__."/../../src/request_handlers/AddUser.php";

if (!Auth::instance()->isLoggedAsAdmin()) {
    header("Location: ./login.php");
    die();
}

if (AddUserHandler::tryHandleForm()) {
  header('Location: ./edit_users.php');
  die();
}

$userDao = new UserDaoPdo(Auth::instance()->getDb());
$roleDao = new RoleDaoPdo(Auth::instance()->getDb());

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагування користувачів" => "./edit_users.php",
    "Додавання користувача" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="row justify-content-center">
    <div class="login_form col-md-4">
      <div class="card bg-light mb-3 bio">    
        <div class="card-header">
            <h1 class="bio-text-header text-center">Додавання користувача</h1>
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="form-group">
              <label for="username">Ім'я користувача</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Ім'я користувача">
            </div>

            <div class="form-group">
              <label for="password">Пароль користувача</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Пароль користувача">
            </div>            

            <div class="form-group">
              <label for="password">Роль</label>
              <select name="role_id" class="form-control">
                  <?php foreach ($roleDao->getAll() as $role): ?>
                    <option value="<?= $role->getId(); ?>"><?= $role->getName(); ?></option>
                  <?php endforeach; ?>
              </select>
            </div>            

            <button type="submit" class="btn btn-primary form-sumbit">Зберегти</button>
          </form>
          <?php if (strlen(AddUserHandler::getFormError()) > 0): ?>
          <div class="form_error_block">
              <span class="form_error_text">
                <?= AddUserHandler::getFormError(); ?>
              </span>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
</div>


<?php
require_once __DIR__."/../templates/footer.php";
?>