<?php
require_once __DIR__."/../dao/GalleryPhotoDaoPdo.php";
require_once __DIR__."/../services/Auth.php";

class AddGalleryPhotoHandler {
    private static $form_error;

    public static function tryHandleForm() {    
        AddGalleryPhotoHandler::$form_error = "";
                
        if (isset($_POST['add'])) {
            $target_dir = __DIR__."/../../public/upload/";
            $filename = basename($_FILES["photo"]["name"]);

            if (strlen($filename) < 1) {
                AddGalleryPhotoHandler::$form_error = "Спочатку виберіть зображення!";
                return false;
            } 

            $target_file = $target_dir . $filename;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                AddGalleryPhotoHandler::$form_error = "Допустимі тільки JPG, JPEG, PNG файли!";
                return false;
            }
            
            $galleryPhotoPdo = new GalleryPhotoDaoPdo(Auth::instance()->getDb());    

            if ($_FILES["photo"]["tmp_name"] != "" && $_FILES["photo"]["tmp_name"] != null) {
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if ($check !== false) {
                    if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                        AddGalleryPhotoHandler::$form_error = "Не вдалося завантажити зображення";
                        return false;
                    }   
                }
            }
            
            $galleryPhoto = new GalleryPhoto();
            $galleryPhoto->setPhotoUrl($filename);

            $galleryPhotoPdo->insert($galleryPhoto);
            return true;
        }
        
        return false;
    }

    public static function getFormError() {
        return AddGalleryPhotoHandler::$form_error;
    }
}
