<?php
require_once __DIR__."/../dao/MainPagesContentDaoPdo.php";

class EditShortBioHandler {
    private static $form_error;
    private static $short_bio;

    public static function tryHandleForm($db) {
        EditShortBioHandler::$form_error = "";
        EditShortBioHandler::$short_bio = "";

        if (!empty($_POST['short_bio'])) {
            EditShortBioHandler::$short_bio = $_POST['short_bio'];

            $target_dir = __DIR__."/../../public/upload/";
            $filename = basename($_FILES["portrait"]["name"]);
            $target_file = $target_dir . $filename;
            //$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            $mainPagesPdo = new MainPagesContentDaoPdo($db);    

            if ($_FILES["portrait"]["tmp_name"] != "" && $_FILES["portrait"]["tmp_name"] != null) {
                $check = getimagesize($_FILES["portrait"]["tmp_name"]);
                if ($check !== false) {
                    if (!move_uploaded_file($_FILES["portrait"]["tmp_name"], $target_file)) {
                        EditShortBioHandler::$form_error = "Не вдалося завантажити зображення";
                        return;
                    }   
                }
            } else {
                $filename = $mainPagesPdo->getById(1)->getPhoto();
            }                                

            $mainPagesContent = new MainPagesContent();
            $mainPagesContent
                ->setId(1)
                ->setPhoto($filename)
                ->setText(EditShortBioHandler::$short_bio);

            $mainPagesPdo->update($mainPagesContent);
        }
    }

    public static function getFormError() {
        return EditShortBioHandler::$form_error;
    }

    public static function getShortBio() {
        return EditShortBioHandler::$short_bio;
    }
}