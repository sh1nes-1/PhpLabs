<?php
require_once __DIR__ . "/../models/MainPagesContent.php";
require_once __DIR__ . "/PdoDao.php";

class MainPagesContentDaoPdo extends PdoDao {
    const TABLE_NAME = "main_page_contents";

    protected function getTableName() {
        return self::TABLE_NAME;
    }

    protected function associativeArrayToObject($arr) {
        return MainPagesContent::fromArray($arr);
    }

    protected function objectToAssociativeArray($obj) {
        return $obj->toArray();
    } 

}