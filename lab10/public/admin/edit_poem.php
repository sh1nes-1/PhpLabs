<?php
require_once __DIR__."/../../src/services/Auth.php";
require_once __DIR__."/../../src/dao/PoemDaoPdo.php";
require_once __DIR__."/../../src/request_handlers/EditPoem.php";

if (!Auth::instance()->isLoggedAsEditor()) {
    header("Location: ./login.php");
    die();
}

if (EditPoemHandler::tryHandleForm() && isset($_GET['id'])) {
    header('Location: ./edit_poem.php?id='.$_GET['id']);
    die();
}

$poem = EditPoemHandler::getPoem();

$poemDao = new PoemDaoPdo(Auth::instance()->getDb());

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагування поем" => "./edit_poems.php",
    "Редагувати поему" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card bg-light mb-3">    
            <div class="card-body justify-content-end">
                <form method="POST">
                    <input type="hidden" name="poem_id" value="<?= $poem->getId() ?>">

                    <div class="row justify-content-center" style="font-size: 18px;">
                        <h2>Назва поеми</h2>
                    </div>       
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <input type="text" name="poem_name" class="form-control" value="<?= $poem->getName(); ?>">
                        </div>
                    </div>       
                    <div class="row justify-content-center" style="font-size: 18px; margin-top: 25px;">
                        <h2>Вміст поеми</h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <textarea name="poem_content" class="edit_text form-control" style="min-height: 400px;"><?= $poem->getContent(); ?></textarea>
                        </div>
                    </div>
                    <div class="row justify-content-center" style="margin-top: 10px;">                
                        <input type="submit" class="save-btn btn btn-primary" value="Зберегти">
                    </div>
                </form>

                <div class="row text-center" style="margin-top: 20px; color: red;">
                    <div class="col-md-12">
                        <?= EditPoemHandler::getFormError(); ?>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__."/../templates/footer.php";
?>