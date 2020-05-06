<?php
require_once __DIR__ . "/../../models/Degree.php";
require_once __DIR__ . "/../DegreeDao.php";
require_once __DIR__ . "/PdoDao.php";

class DegreeDaoPdo extends PdoDao implements DegreeDao {
    const TABLE_NAME = "degrees";

    protected function getTableName() {
        return self::TABLE_NAME;
    }

    protected function associativeArrayToObject($arr) {
        return Degree::fromArray($arr);
    }

    protected function objectToAssociativeArray($obj) {
        return $obj->toArray();
    }

}