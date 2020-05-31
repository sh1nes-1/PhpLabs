<?php
require_once __DIR__."/../../src/services/Auth.php";

if (!Auth::instance()->isLoggedAsEditor()) {
    header("Location: ./login.php");
    die();
}

require_once __DIR__."/../../src/dao/GalleryPhotoDaoPdo.php";
$galleryPhotoPdo = new GalleryPhotoDaoPdo(Auth::instance()->getDb());  
$galleryPhotos = $galleryPhotoPdo->getAll();
$galleryPhotosCount = count($galleryPhotos);

$breadcrumb_path = [
    "Панель адміністратора" => "./",
    "Редагування галереї" => "#",
];

require_once __DIR__."/../templates/head.php";
?>

<div class="card bg-light mb-3 bio">    
  <div class="card-header"><h1 class="bio-text-header text-center">Виберіть зображення для редагування або <a href="./add_gallery_photo.php">додайте нове</a></h1>  </div>
  <div class="card-body">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <?php for ($i = 0; $i < $galleryPhotosCount; $i += 3): ?>
            <div class="row gallery-row">                
                <?php for ($j = 0; $j < 3 && $i + $j < $galleryPhotosCount; $j++): ?>
                    <a href="./edit_gallery_photo.php?id=<?= $galleryPhotos[$i + $j]->getId(); ?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                        <img src="../upload/<?= $galleryPhotos[$i + $j]->getPhotoUrl(); ?>" class="img-fluid">
                    </a>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>                     
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__."/../templates/footer.php";
?>