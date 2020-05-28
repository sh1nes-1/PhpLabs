<?php
require_once __DIR__."/../dao/PoemDaoPdo.php";

function getPoem() {
    if (!empty($_GET['id']) && is_numeric($_GET['id'])) {                
        $id = $_GET['id'];
        
        require_once __DIR__."/../../config/db.php";
        $poemDao = new PoemDaoPdo($db);

        $poem = $poemDao->getById($id);
        if ($poem != FALSE) {
            return $poem;
        }
    }

    header('Location: /');
    die();    
}
