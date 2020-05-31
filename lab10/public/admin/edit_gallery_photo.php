<?php
require_once __DIR__."/../../src/services/Auth.php";
require_once __DIR__."/../../src/dao/GalleryPhotoDaoPdo.php";
require_once __DIR__."/../../src/request_handlers/EditGalleryPhoto.php";

if (!Auth::instance()->isLoggedAsEditor()) {
    header("Location: ./login.php");
    die();
}

if (EditGalleryPhotoHandler::TryHandleDeleteRequest()) {
    header("Location: ./edit_gallery.php");
    die();
}

$galleryPhoto = EditGalleryPhotoHandler::getGalleryPhoto();

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагування галереї" => "./edit_gallery.php",
    "Редагування зображення" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="row justify-content-center">    
    <img id="selected_image" src="./../upload/<?= $galleryPhoto->getPhotoUrl(); ?>" style="max-width: 800px; max-height: 600px;">        
</div>
<form method="POST"> 
    <input type="hidden" name="id" value="<?= $galleryPhoto->getId(); ?>">
    <div class="row justify-content-center" style="margin-top: 15px;">    
        <input type="submit" class="save-btn btn btn-danger" onclick="return confirm('Ви дійсно хочете видалити дане зображення з галереї?');" value="Видалити">
    </div>
</form>
<div class="row text-center" style="margin-top: 20px; color: red;">
    <div class="col-md-12">
        <?= EditGalleryPhotoHandler::getFormError(); ?>
    </div>
</div>  

<?php
require_once __DIR__."/../templates/footer.php";
?>