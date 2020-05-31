<?php 
require_once __DIR__."/../config/db.php";
require_once __DIR__."/../src/dao/GalleryPhotoDaoPdo.php";

$galleryPhotoPdo = new GalleryPhotoDaoPdo($db);  
$galleryPhotos = $galleryPhotoPdo->getAll();
$galleryPhotosCount = count($galleryPhotos);

$is_nav_page_gallery = true;

$breadcrumb_path = [
  "Головна" => "./",
  "Галерея" => "#",
];

require_once __DIR__."/templates/head.php";
?>

<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>

<div class="card bg-light mb-3 bio">    
  <div class="card-header"><h1 class="bio-text-header text-center">Галерея</h1>  </div>
  <div class="card-body">

        <div class="row justify-content-center">
          <div class="col-md-8">
          <?php for ($i = 0; $i < $galleryPhotosCount; $i += 3): ?>
            <div class="row gallery-row">                
                <?php for ($j = 0; $j < 3 && $i + $j < $galleryPhotosCount; $j++): ?>
                    <a href="../upload/<?= $galleryPhotos[$i + $j]->getPhotoUrl(); ?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
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
require_once __DIR__."/templates/footer.php";
?>