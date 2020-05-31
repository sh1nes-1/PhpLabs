<?php
require_once __DIR__."/../../src/services/Auth.php";
require_once __DIR__."/../../src/dao/GalleryPhotoDaoPdo.php";
require_once __DIR__."/../../src/request_handlers/AddGalleryPhoto.php";

if (!Auth::instance()->isLoggedAsEditor()) {
    header("Location: ./login.php");
    die();
}

if (AddGalleryPhotoHandler::tryHandleForm()) {
    header("Location: ./edit_gallery.php");
    die();
}

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагування галереї" => "./edit_gallery.php",
    "Додавання зображення" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="row justify-content-center">    
    <h1>Виберіть зображення</h1>
</div>
<div class="row justify-content-center">    
    <img id="selected_image" src="./../assets/img/noimage.png" style="max-width: 800px; max-height: 600px;">        
</div>
<form method="POST" enctype="multipart/form-data">
    <div class="row justify-content-center" style="margin-top: 15px;">        
        <input id="select_image" name="photo" type="file" onchange="on_image_changed();">    
    </div>        
    <div class="row justify-content-center" style="margin-top: 15px;">    
        <input name="add" type="submit" class="save-btn btn btn-primary" value="Додати">
    </div>
</form>
<div class="row text-center" style="margin-top: 20px; color: red;">
    <div class="col-md-12">
        <?= AddGalleryPhotoHandler::getFormError(); ?>
    </div>
</div>  

<?php
require_once __DIR__."/../templates/footer.php";
?>