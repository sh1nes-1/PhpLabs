<?php
require_once __DIR__ . "/../models/GalleryPhoto.php";
require_once __DIR__ . "/PdoDao.php";

class GalleryPhotoDaoPdo extends PdoDao {
    const TABLE_NAME = "gallery";

    protected function getTableName() {
        return self::TABLE_NAME;
    }

    protected function associativeArrayToObject($arr) {
        return GalleryPhoto::fromArray($arr);
    }

    protected function objectToAssociativeArray($obj) {
        return $obj->toArray();
    } 

}