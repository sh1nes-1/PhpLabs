<?php
require_once __DIR__."/../dao/UserDaoPdo.php";
require_once __DIR__."/../services/Auth.php";

class AddUserHandler {
    private static $form_error;

    public static function tryHandleForm() {    
        AddUserHandler::$form_error = "";
                
        if (isset($_POST['username'], $_POST['password'], $_POST['role_id'])) {                                
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $role_id = htmlspecialchars($_POST['role_id']);    
            
            if (empty($username) || empty($role_id) || empty($password)) {
                AddUserHandler::$form_error = "Всі поля мають бути заповнені!";
                return false;
            }
            
            $userDao = new UserDaoPdo(Auth::instance()->getDb());

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $user = new User();
            $user           
                ->setUsername($username)
                ->setPassword($hashed_password)
                ->setRoleId($role_id);

            try {
                $userDao->insert($user);
            } catch (Exception $e) {
                AddUserHandler::$form_error = "Не вдалося додати користувача з такими значеннями!";
                return false;
            }
            
            return true;
        }

        return false;
    }

    public static function getFormError() {
        return AddUserHandler::$form_error;
    }
}
