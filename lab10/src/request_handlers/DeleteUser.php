<?php
require_once __DIR__."/../dao/UserDaoPdo.php";
require_once __DIR__."/../services/Auth.php";

class DeleteUserHandler {
    public static function HandleRequest() {
        if (!empty($_GET['id'])) {                    
            $id = htmlspecialchars($_GET['id']);

            $userDao = new UserDaoPdo(Auth::instance()->getDb());
            $user = $userDao->getById($id);

            if ($user === FALSE) {
                return;
            }

            $userDao->delete($user->getId());
            return;
        }
    }
}