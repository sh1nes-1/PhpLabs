<?php
require_once __DIR__."/../dao/PoemDaoPdo.php";
require_once __DIR__."/../services/Auth.php";

class AddPoemHandler {
    private static $form_error;

    public static function tryHandleForm() {    
        AddPoemHandler::$form_error = "";
                
        if (isset($_POST['poem_name'], $_POST['poem_content'])) {                    
            $poem_name = htmlspecialchars($_POST['poem_name']);
            $poem_content = htmlspecialchars($_POST['poem_content']);    
            
            if (empty($poem_name) || empty($poem_content)) {
                AddPoemHandler::$form_error = "Всі поля мають бути заповнені!";
                return false;
            }
            
            $poemDao = new PoemDaoPdo(Auth::instance()->getDb());

            $poem = new Poem();
            $poem->setName($poem_name)
                 ->setContent($poem_content);

            $poemDao->insert($poem);
            return true;
        }

        return false;
    }

    public static function getFormError() {
        return AddPoemHandler::$form_error;
    }
}
