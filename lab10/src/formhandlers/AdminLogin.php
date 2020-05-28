<?php
require_once __DIR__."/../services/Auth.php";
require_once __DIR__."/../exceptions/AuthException.php";

class AdminLoginHandler {
    private static $form_error;

    public static function TryHandleForm() {    
        AdminLoginHandler::$form_error = "";
        
        if (isset($_POST['username'], $_POST['password'])) {        
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);    
            
            if (empty($username) || empty($password)) {
                AdminLoginHandler::$form_error = "Ім'я користувача та пароль мають бути заповнені!";
                return false;
            }
    
            try {            
                Auth::instance()->logIn($username, $password);
                return true;
            } catch (AuthException $e) {
                AdminLoginHandler::$form_error = "Не вдалося знайти користувача з таким іменем та паролем";
                return false;        
            } catch (Exception $e) { 
                AdminLoginHandler::$form_error = "Не вдалося виконати запит. Спробуйте пізніше.";
                return false;
            }
        }

        return false;
    }

    public static function getFormError() {
        return AdminLoginHandler::$form_error;
    }
}

