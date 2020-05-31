<?php
require_once __DIR__."/../dao/MainPagesContentDaoPdo.php";

class EditBiographyHandler {
    private static $form_error;
    private static $biography;

    public static function tryHandleForm($db) {
        EditBiographyHandler::$form_error = "";
        EditBiographyHandler::$biography = "";

        if (!empty($_POST['biography'])) {
            EditBiographyHandler::$biography = $_POST['biography'];

            $target_dir = __DIR__."/../../public/upload/";
            $filename = basename($_FILES["portrait"]["name"]);
            $target_file = $target_dir . $filename;
            //$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            $mainPagesPdo = new MainPagesContentDaoPdo($db);    

            if ($_FILES["portrait"]["tmp_name"] != "" && $_FILES["portrait"]["tmp_name"] != null) {
                $check = getimagesize($_FILES["portrait"]["tmp_name"]);
                if ($check !== false) {
                    if (!move_uploaded_file($_FILES["portrait"]["tmp_name"], $target_file)) {
                        EditBiographyHandler::$form_error = "Не вдалося завантажити зображення";
                        return false;
                    }   
                }
            } else {
                $filename = $mainPagesPdo->getById(2)->getPhoto();
            }                                

            $mainPagesContent = new MainPagesContent();
            $mainPagesContent
                ->setId(2)
                ->setPhoto($filename)
                ->setText(EditBiographyHandler::$biography);

            $mainPagesPdo->update($mainPagesContent);
            return true;
        }

        return false;
    }

    public static function getFormError() {
        return EditBiographyHandler::$form_error;
    }

    public static function getBiography() {
        return EditBiographyHandler::$biography;
    }
}