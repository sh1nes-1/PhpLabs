<?php
require_once __DIR__."/../../config/db.php";
require_once __DIR__."/../../src/services/Auth.php";
require_once __DIR__."/../../src/dao/SiteHeadDaoPdo.php";
require_once __DIR__."/../../src/request_handlers/EditSiteHead.php";

if (!Auth::instance()->isLoggedAsAdmin()) {
    header("Location: ./login.php");
    die();
}

if (EditSiteHeadHandler::tryHandleForm()) {
  header('Location: ./edit_site_head.php');
  die();
}

$siteHeadPdo = new SiteHeadDaoPdo($db);
$siteHead = $siteHeadPdo->getById(1);

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагування шапки сайту" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="row justify-content-center">
    <div class="login_form col-md-4">
      <div class="card bg-light mb-3 bio">    
        <div class="card-header">
            <h1 class="bio-text-header text-center">Редагування шапки сайту</h1>
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="form-group">
              <label for="author_full_name">ПІБ автора</label>
              <input type="text" class="form-control" id="author_full_name" name="author_full_name" placeholder="ПІБ автора" value="<?= $siteHead->getAuthorFullName(); ?>">
            </div>

            <div class="form-group">
              <label for="description">Опис</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Опис" value="<?= $siteHead->getDescription(); ?>">
            </div>            

            <button type="submit" class="btn btn-primary form-sumbit">Зберегти</button>
          </form>
          <div class="form_error_block">
              <span class="form_error_text">
                <?= EditSiteHeadHandler::getFormError(); ?>
              </span>
          </div>
        </div>
      </div>
    </div>
</div>


<?php
require_once __DIR__."/../templates/footer.php";
?>