<?php
require_once __DIR__ . "/../models/Role.php";
require_once __DIR__ . "/PdoDao.php";

class RoleDaoPdo extends PdoDao {
    const TABLE_NAME = "roles";

    protected function getTableName() {
        return self::TABLE_NAME;
    }

    protected function associativeArrayToObject($arr) {
        return Role::fromArray($arr);
    }

    protected function objectToAssociativeArray($obj) {
        return $obj->toArray();
    } 

}