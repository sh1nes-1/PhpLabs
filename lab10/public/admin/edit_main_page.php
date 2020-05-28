<?php
require_once __DIR__."/../../src/request_handlers/EditMainPage.php";
require_once __DIR__."/../../config/db.php";

EditMainPageHandler::tryHandleForm($db);

$mainPagesPdo = new MainPagesContentDaoPdo($db);  
$mainPages = $mainPagesPdo->getById(1);

$shortBio = EditMainPageHandler::getShortBio();
if ($shortBio == "") {
    $shortBio = $mainPages->getText();
}

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагувати головну сторінку" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="card bg-light mb-3">    
    <div class="card-body justify-content-end">
        <form method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center" style="font-size: 18px;">
                <h1>Фото</h1>
            </div>        
            <div class="row justify-content-center">            
                <img src="../upload/<?= $mainPages->getPhoto(); ?>" class="portrait-small">        
            </div>            
            <div class="row justify-content-center" style="margin-top: 15px;">
                <input name="portrait" type="file">        
            </div>            
            <div class="row justify-content-center" style="font-size: 18px; margin-top: 25px;">
                <h1>Коротка біографія</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <textarea name="short_bio" class="edit_text"><?= $shortBio; ?></textarea>
                </div>
            </div>
            <div class="row justify-content-center">                
                <input type="submit" class="save-btn" value="Зберегти">
            </div>
        </form>

        <span><?= EditMainPageHandler::getFormError(); ?></span>
    </div>
</div>

<?php
require_once __DIR__."/../templates/footer.php";
?>