<?php 
require_once __DIR__."/../config/db.php";
require_once __DIR__."/../src/dao/PoemDaoPdo.php";
require_once __DIR__."/../src/dao/MainPagesContentDaoPdo.php";

$is_nav_page_main = true;

$breadcrumb_path = [
  "Головна" => "#",
];

require_once __DIR__."/templates/head.php";

$mainPagesPdo = new MainPagesContentDaoPdo($db); 
$mainPage = $mainPagesPdo->getById(1);
?>

<div class="card bg-light mb-3 bio">    
  <div class="card-header"><h1 class="bio-text-header text-center">Коротка біографія</h1>  </div>
  <div class="card-body">
    <div class="row">
      <div class="col d-flex">
        <img src="upload/<?= $mainPage->getPhoto(); ?>" class="portrait-small">
          
          <div class="bio-block-text">        
            <p class="text-justify">
            <?= $mainPage->getText(); ?>
            </p>
          </div>    
      </div>        
    </div>
  </div>
</div>

<div class="card bg-light mb-3 bio">    
  <div class="card-header"><h1 class="bio-text-header text-center">Найвідоміші твори</h1>  </div>
  <div class="card-body">
    <ul>
      <?php 
      $poemDao = new PoemDaoPdo($db);
      foreach ($poemDao->getAll() as $poem):
      ?>      
      <li><a href="/poem.php?id=<?= $poem->getId(); ?>">Володимир Сосюра - <?= $poem->getName(); ?></a></li>
      <?php endforeach; ?>   
    </ul>
  </div>
</div>

<?php 
require_once __DIR__."/templates/footer.php";
?>