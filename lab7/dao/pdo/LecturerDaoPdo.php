<?php
require_once __DIR__ . "/../../models/Lecturer.php";
require_once __DIR__ . "/../LecturerDao.php";
require_once __DIR__ . "/PdoDao.php";

class LecturerDaoPdo extends PdoDao implements LecturerDao {
    const TABLE_NAME = "lecturers";

    protected function getTableName() {
        return self::TABLE_NAME;
    }

    protected function associativeArrayToObject($arr) {
        return Lecturer::fromArray($arr);
    }

    protected function objectToAssociativeArray($obj) {
        return $obj->toArray();
    }

    public function findAllWithFaculty($facultyId) {
        return NULL;
    }

}