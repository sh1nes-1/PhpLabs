<?php
require_once __DIR__."/../../src/services/Utils.php";
?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  

    <link rel="stylesheet" href="/assets/css/bootstrap.css?hash=<?= Utils::get_file_hash(__DIR__."/../assets/css/bootstrap.css"); ?>">
    <link rel="stylesheet" href="/assets/css/main.css?hash=<?= Utils::get_file_hash(__DIR__."/../assets/css/main.css"); ?>">
    <link rel="stylesheet" href="/assets/css/ekko-lightbox.css?hash=<?= Utils::get_file_hash(__DIR__."/../assets/css/ekko-lightbox.css"); ?>">
    
    <script type="text/javascript" src="/assets/js/jquery-3.4.1.slim.min.js?hash=<?= Utils::get_file_hash(__DIR__."/../assets/js/jquery-3.4.1.slim.min.js"); ?>"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.js?hash=<?= Utils::get_file_hash(__DIR__."/../assets/js/bootstrap.js"); ?>"></script>    
    <script type="text/javascript" src="/assets/js/ekko-lightbox.js?hash=<?= Utils::get_file_hash(__DIR__."/../assets/js/ekko-lightbox.js"); ?>"></script>        
    <script type="text/javascript" src="/assets/js/main.js?hash=<?= Utils::get_file_hash(__DIR__."/../assets/js/main.js"); ?>"></script>

    <title>ВОЛОДИМИР МИКОЛАЙОВИЧ СОСЮРА</title>
</head>
<body>
<div class="container">    
    <!-- top menu  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="row">
      <div class="col">
        <div class="row">
        <div class="col">
            <a class="navbar-brand" href="/">ВОЛОДИМИР МИКОЛАЙОВИЧ СОСЮРА</a>
        </div>   
        </div>
        <div class="row">
        <div class="col">
            <h5 class="text-secondary">видатний український письменник</h5>
        </div>   
        </div>
      </div>
    </div>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarColor01">
        <ul class="navbar-nav">
        <li class="nav-item <?= empty($is_nav_page_main) ? '' : 'active'; ?>">
            <a class="nav-link top-menu-link" href="/">Головна</a>
        </li>
        <li class="nav-item <?= empty($is_nav_page_bio) ? '' : 'active'; ?>">
            <a class="nav-link top-menu-link" href="/biography.php">Біографія</a>
        </li>
        <li class="nav-item <?= empty($is_nav_page_gallery) ? '' : 'active'; ?>">
            <a class="nav-link top-menu-link" href="/gallery.php">Галерея</a>
        </li>
        <!-- TODO: show only if user is admin -->
        <li class="nav-item <?= empty($is_nav_page_admin) ? '' : 'active'; ?>">
            <a class="nav-link top-menu-link" href="/admin/">Панель адміністратора</a>
        </li>        
        </ul>
    </div>
    </nav>

    <div class="jumbotron content">
    
      <ol class="breadcrumb">
        <?php
        foreach ($breadcrumb_path as $key => $value): 
            if ($key != array_key_last($breadcrumb_path)):
        ?>            
            <li class="breadcrumb-item"><a href="<?= $value; ?>"><?= $key; ?></a></li>
        <?php
            else:
        ?>
            <li class="breadcrumb-item active"><?= $key; ?></li>
        <?php
            endif;
        endforeach; 
        ?>
      </ol>