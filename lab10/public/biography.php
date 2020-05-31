<?php 
require_once __DIR__."/../config/db.php";
require_once __DIR__."/../src/dao/MainPagesContentDaoPdo.php";

$mainPagesPdo = new MainPagesContentDaoPdo($db);  
$mainPage = $mainPagesPdo->getById(2);

$is_nav_page_bio = true;

$breadcrumb_path = [
  "Головна" => "./",
  "Біографія" => "#",
];

require_once __DIR__."/templates/head.php";
?>

<div class="card bg-light mb-3 bio">    
  <div class="card-header"><h1 class="bio-text-header text-center">Біографія</h1>  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <img src="upload/<?= $mainPage->getPhoto(); ?>" class="portrait-big float-left">          
        <div class="bio-block-text">        
          <?= $mainPage->getText(); ?>
        </div>    
      </div>        
    </div>
  </div>
</div>

<?php 
require_once __DIR__."/templates/footer.php";
?>