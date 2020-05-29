<?php
require_once __DIR__."/../dao/UserDaoPdo.php";
require_once __DIR__."/../services/Auth.php";

class EditUserHandler {
    private static $form_error;

    public static function getUser() {
        if (!empty($_GET['id']) && is_numeric($_GET['id'])) {                
            $id = $_GET['id'];
            
            $userDao = new UserDaoPdo(Auth::instance()->getDb());
    
            $user = $userDao->getById($id);
            if ($user != FALSE) {
                return $user;
            }
        }
    
        header('Location: ./');
        die(); 
    }

    public static function tryHandleForm() {    
        EditUserHandler::$form_error = "";
                
        if (isset($_POST['id'], $_POST['username'], $_POST['role_id'])) {                    
            $id = htmlspecialchars($_POST['id']);
            $username = htmlspecialchars($_POST['username']);
            $role_id = htmlspecialchars($_POST['role_id']);    
            
            if (empty($username) || empty($role_id) || empty($id)) {
                EditUserHandler::$form_error = "Ім'я користувача та роль мають бути заповнені!";
                return false;
            }
            
            $userDao = new UserDaoPdo(Auth::instance()->getDb());
            $user = $userDao->getById($id);

            if ($user === FALSE) {
                EditUserHandler::$form_error = "Такого користувача не знайдено!";
                return false;
            }

            $user
                ->setUsername($username)
                ->setRoleId($role_id);

            $userDao->update($user);
            return true;
        }

        return false;
    }

    public static function getFormError() {
        return EditUserHandler::$form_error;
    }
}
