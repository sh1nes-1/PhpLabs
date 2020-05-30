<?php
require_once __DIR__."/../../src/request_handlers/EditShortBio.php";
require_once __DIR__."/../../src/services/Auth.php";

if (!Auth::instance()->isLoggedAsEditor()) {
    header("Location: ./login.php");
    die();
}

if (EditShortBioHandler::tryHandleForm(Auth::instance()->getDb())) {
    header('Location: ./edit_short_bio.php');
    die();
}

$mainPagesPdo = new MainPagesContentDaoPdo(Auth::instance()->getDb());  
$mainPages = $mainPagesPdo->getById(1);

$shortBio = EditShortBioHandler::getShortBio();
if (empty($shortBio)) {
    $shortBio = $mainPages->getText();
}

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагувати коротку біографію" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="card bg-light mb-3">    
    <div class="card-body justify-content-end">
        <form method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center" style="font-size: 18px;">
                <h2>Фото</h2>
            </div>        
            <div class="row justify-content-center">            
                <img id="selected_image" src="../upload/<?= $mainPages->getPhoto(); ?>" class="portrait-small">        
            </div>            
            <div class="row justify-content-center" style="margin-top: 15px;">
                <input id="select_image" name="portrait" type="file" onchange="on_image_changed();">        
            </div>            
            <div class="row justify-content-center" style="font-size: 18px; margin-top: 25px;">
                <h2>Коротка біографія</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <textarea name="short_bio" class="edit_text form-control" style="min-height: 150px;"><?= $shortBio; ?></textarea>
                </div>
            </div>
            <div class="row justify-content-center">                
                <input type="submit" class="save-btn btn btn-primary" value="Зберегти">
            </div>
        </form>

        <span><?= EditShortBioHandler::getFormError(); ?></span>
    </div>
</div>

<?php
require_once __DIR__."/../templates/footer.php";
?>