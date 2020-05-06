<?php
require_once __DIR__ . "/../../models/Faculty.php";
require_once __DIR__ . "/../FacultyDao.php";
require_once __DIR__ . "/PdoDao.php";

class FacultyDaoPdo extends PdoDao implements FacultyDao {
    const TABLE_NAME = "faculties";

    protected function getTableName() {
        return self::TABLE_NAME;
    }

    protected function associativeArrayToObject($arr) {
        return Faculty::fromArray($arr);
    }

    protected function objectToAssociativeArray($obj) {
        return $obj->toArray();
    }

}