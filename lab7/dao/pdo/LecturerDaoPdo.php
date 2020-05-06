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

    /**
     * Gets all lecturers with given faculty from table
     * 
     * @return Array array of objects
     */
    public function findAllWithFaculty($facultyId) {
        $stmt = $this->db->prepare("SELECT * FROM `{$this->getTableName()}` WHERE `faculty_id` = ?");
        $stmt->execute([$facultyId]);
        return array_map(function($arr) {
            return $this->associativeArrayToObject($arr);
        }, $stmt->fetchAll());
    }

}