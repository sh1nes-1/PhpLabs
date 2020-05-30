<?php
require_once __DIR__."/../dao/PoemDaoPdo.php";
require_once __DIR__."/../services/Auth.php";

class EditPoemHandler {
    private static $form_error;

    public static function getPoem() {
        if (!empty($_GET['id']) && is_numeric($_GET['id'])) {                
            $id = $_GET['id'];
            
            $poemDao = new PoemDaoPdo(Auth::instance()->getDb());
    
            $user = $poemDao->getById($id);
            if ($user != FALSE) {
                return $user;
            }
        }
    
        header('Location: ./');
        die(); 
    }

    public static function tryHandleForm() {    
        EditPoemHandler::$form_error = "";
                
        if (isset($_POST['poem_id'], $_POST['poem_name'], $_POST['poem_content'])) {                    
            $poem_id = htmlspecialchars($_POST['poem_id']);
            $poem_name = htmlspecialchars($_POST['poem_name']);
            $poem_content = htmlspecialchars($_POST['poem_content']);    
            
            if (empty($poem_id) || empty($poem_name) || empty($poem_content)) {
                EditPoemHandler::$form_error = "Всі поля мають бути заповнені!";
                return false;
            }
            
            $poemDao = new PoemDaoPdo(Auth::instance()->getDb());
            $poem = $poemDao->getById($poem_id);

            if ($poem === FALSE) {
                EditPoemHandler::$form_error = "Такої поеми не знайдено!";
                return false;
            }

            $poem
                ->setName($poem_name)
                ->setContent($poem_content);

            $poemDao->update($poem);
            return true;
        }

        return false;
    }

    public static function getFormError() {
        return EditPoemHandler::$form_error;
    }
}
