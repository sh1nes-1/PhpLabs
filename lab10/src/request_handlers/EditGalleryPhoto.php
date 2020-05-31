<?php
require_once __DIR__."/../dao/GalleryPhotoDaoPdo.php";
require_once __DIR__."/../services/Auth.php";

class EditGalleryPhotoHandler {
    private static $form_error;

    public static function getGalleryPhoto() {
        if (!empty($_GET['id']) && is_numeric($_GET['id'])) {                
            $id = $_GET['id'];
            
            $galleryPhotoDao = new GalleryPhotoDaoPdo(Auth::instance()->getDb());
    
            $galleryPhoto = $galleryPhotoDao->getById($id);
            if ($galleryPhoto != FALSE) {
                return $galleryPhoto;
            }
        }
    
        header('Location: ./');
        die(); 
    }

    public static function TryHandleDeleteRequest() {
        if (!empty($_POST['id'])) {                    
            $id = htmlspecialchars($_POST['id']);

            $galleryPhotoDao = new GalleryPhotoDaoPdo(Auth::instance()->getDb());
            $galleryPhoto = $galleryPhotoDao->getById($id);

            if ($galleryPhoto === FALSE) {
                EditGalleryPhotoHandler::$form_error = "Фото не знайдено!";
                return false;
            }

            $galleryPhotoDao->delete($galleryPhoto->getId());
            return true;
        }
    }

    public static function getFormError() {
        return EditGalleryPhotoHandler::$form_error;
    }
}