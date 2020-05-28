<?php
require_once __DIR__."/../src/request_handlers/Poem.php";
$poem = getPoem();

$breadcrumb_path = [
    "Головна" => "./",
    $poem->getName() => "#",
  ];
  

require_once __DIR__."/templates/head.php";
?>

<div class="card bg-light mb-3 bio">    
    <div class="card-header">
        <h1 class="bio-text-header text-center"><?= $poem->getName(); ?></h1>
    </div>
    <div class="row card-body justify-content-center">
        <?= str_replace("\n", "<br>", $poem->getContent()); ?>
    </div>
</div>  

<?php
require_once __DIR__."/templates/footer.php";
?>