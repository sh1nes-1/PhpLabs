<?php
require_once __DIR__ . "/../models/Poem.php";
require_once __DIR__ . "/PdoDao.php";

class PoemDaoPdo extends PdoDao {
    const TABLE_NAME = "poems";

    protected function getTableName() {
        return self::TABLE_NAME;
    }

    protected function associativeArrayToObject($arr) {
        return Poem::fromArray($arr);
    }

    protected function objectToAssociativeArray($obj) {
        return $obj->toArray();
    } 

}