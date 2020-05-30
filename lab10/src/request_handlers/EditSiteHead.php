<?php
require_once __DIR__."/../dao/SiteHeadDaoPdo.php";
require_once __DIR__."/../services/Auth.php";

class EditSiteHeadHandler {
    private static $form_error;

    public static function tryHandleForm() {    
        EditSiteHeadHandler::$form_error = "";
                
        if (isset($_POST['author_full_name'], $_POST['description'])) {                    
            $author_full_name = htmlspecialchars($_POST['author_full_name']);
            $description = htmlspecialchars($_POST['description']);    
            
            if (empty($author_full_name) || empty($description)) {
                EditSiteHeadHandler::$form_error = "Всі поля мають бути заповнені!";
                return false;
            }
            
            $siteHeadDao = new SiteHeadDaoPdo(Auth::instance()->getDb());

            $siteHead = new SiteHead();
            $siteHead
                ->setId(1)
                ->setAuthorFullName($author_full_name)
                ->setDescription($description);

            $siteHeadDao->update($siteHead);
            return true;
        }

        return false;
    }

    public static function getFormError() {
        return EditSiteHeadHandler::$form_error;
    }
}
