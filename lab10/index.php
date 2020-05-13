<?php 
$is_nav_page_main = true;

$breadcrumb_path = [
  "Головна" => "#",
];

require_once __DIR__."/templates/head.php";
?>

<div class="card bg-light mb-3 bio">    
  <div class="card-header"><h1 class="bio-text-header text-center">Коротка біографія</h1>  </div>
  <div class="card-body">
    <div class="row">
      <div class="col d-flex">
        <img src="assets/img/main-portrait.jpg" class="portrait-small">
          
          <div class="bio-block-text">        
            <p class="text-justify">
            <b>Володимир Миколайович Сосюра (1898 - 1965)</b> — український письменник, поет-лірик, автор понад 40 збірок поезій, широких епічних віршованих полотен, роману «Третя Рота», бунчужний 3-го Гайдамацького полку Армії УНР. Належав до низки літературних організацій того періоду — «Плуг», «Гарт», «ВАПЛІТЕ» та ін.
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
      <li>Володимир Сосюра - Мазепа (Поема)</li>
      <li>Володимир Сосюра - Третя рота</li>
      <li>Володимир Сосюра - Любіть Україну</li>
      <li>Володимир Сосюра - Васильки</li>      
    </ul>
  </div>
</div>

<?php 
require_once __DIR__."/templates/footer.php";
?>