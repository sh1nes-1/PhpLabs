<?php 
require_once __DIR__."/../../src/services/Utils.php";
require_once __DIR__."/../../src/request_handlers/AdminLogin.php";

if (Auth::instance()->isLoggedIn() && !Auth::instance()->isLoggedAsEditor()) {
  header('Location: /');
  die();
}

if (AdminLoginHandler::tryHandleForm() || Auth::instance()->isLoggedIn()) {
  header('Location: /admin/');
  die();
}

$breadcrumb_path = [
  "Панель адміністратора" => "./",
  "Вхід" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="row justify-content-center">
    <div class="login_form col-md-4">
      <div class="card bg-light mb-3 bio">    
        <div class="card-header">
            <h1 class="bio-text-header text-center">Вхід в панель адміністратора</h1>
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="form-group">
              <label for="username">Ім'я користувача</label>
              <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Ім'я користувача" value="<?= Utils::get_post_value("username"); ?>">
            </div>

            <div class="form-group">
              <label for="password">Пароль</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Пароль">
            </div>

            <button type="submit" class="btn btn-primary login-sumbit">Увійти</button>
          </form>
          <div class="login_error_block">
              <span class="login_error_text">
                <?= AdminLoginHandler::getFormError(); ?>
              </span>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
require_once __DIR__."/../templates/footer.php";
?>