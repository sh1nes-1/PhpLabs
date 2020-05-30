<?php
require_once __DIR__ . "/../models/SiteHead.php";
require_once __DIR__ . "/PdoDao.php";

class SiteHeadDaoPdo extends PdoDao {
    const TABLE_NAME = "site_head";

    protected function getTableName() {
        return self::TABLE_NAME;
    }

    protected function associativeArrayToObject($arr) {
        return SiteHead::fromArray($arr);
    }

    protected function objectToAssociativeArray($obj) {
        return $obj->toArray();
    } 

}