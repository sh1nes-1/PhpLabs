<?php
require_once __DIR__."/../dao/MainPagesContentDaoPdo.php";

class EditMainPageHandler {
    private static $form_error;
    private static $short_bio;

    public static function tryHandleForm($db) {
        EditMainPageHandler::$form_error = "";
        EditMainPageHandler::$short_bio = "";

        if (!empty($_POST['short_bio'])) {
            EditMainPageHandler::$short_bio = $_POST['short_bio'];

            $target_dir = __DIR__."/../../public/upload/";
            $filename = basename($_FILES["portrait"]["name"]);
            $target_file = $target_dir . $filename;
            //$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            $mainPagesPdo = new MainPagesContentDaoPdo($db);    

            if ($_FILES["portrait"]["tmp_name"] != "" && $_FILES["portrait"]["tmp_name"] != null) {
                $check = getimagesize($_FILES["portrait"]["tmp_name"]);
                if ($check !== false) {
                    if (!move_uploaded_file($_FILES["portrait"]["tmp_name"], $target_file)) {
                        EditMainPageHandler::$form_error = "Не вдалося завантажити зображення";
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
                ->setText(EditMainPageHandler::$short_bio);

            $mainPagesPdo->update($mainPagesContent);
        }
    }

    public static function getFormError() {
        return EditMainPageHandler::$form_error;
    }

    public static function getShortBio() {
        return EditMainPageHandler::$short_bio;
    }
}