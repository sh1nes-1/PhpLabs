<?php 
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
            <div class="row gallery-row">
                <a href="./assets/img/1.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="./assets/img/1.jpg" class="img-fluid">
                </a>
                <a href="./assets/img/2.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="./assets/img/2.jpg" class="img-fluid">
                </a>
                <a href="./assets/img/3.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="./assets/img/3.jpg" class="img-fluid">
                </a>
            </div>
            <div class="row gallery-row">
                <a href="./assets/img/4.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="./assets/img/4.jpg" class="img-fluid">
                </a>
                <a href="./assets/img/5.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="./assets/img/5.jpg" class="img-fluid">
                </a>
                <a href="./assets/img/6.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="./assets/img/6.jpg" class="img-fluid">
                </a>
            </div>
            <div class="row gallery-row">
                <a href="./assets/img/7.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="./assets/img/7.jpg" class="img-fluid">
                </a>
                <a href="./assets/img/8.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="./assets/img/8.jpg" class="img-fluid">
                </a>
                <a href="./assets/img/9.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="./assets/img/9.jpg" class="img-fluid">
                </a>
            </div>      
            <div class="row gallery-row">
                <a href="./assets/img/10.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                    <img src="./assets/img/10.jpg" class="img-fluid">
                </a>
            </div>                   
          </div>
        </div>
  </div>
</div>

<?php 
require_once __DIR__."/templates/footer.php";
?>