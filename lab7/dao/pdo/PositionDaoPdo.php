<?php
require_once __DIR__ . "/../../models/Position.php";
require_once __DIR__ . "/../PositionDao.php";
require_once __DIR__ . "/PdoDao.php";

class PositionDaoPdo extends PdoDao implements PositionDao {
    const TABLE_NAME = "positions";

    protected function getTableName() {
        return self::TABLE_NAME;
    }

    protected function associativeArrayToObject($arr) {
        return Position::fromArray($arr);
    }

    protected function objectToAssociativeArray($obj) {
        return $obj->toArray();
    }

}