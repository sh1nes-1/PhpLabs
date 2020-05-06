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
    public function findAllWithFaculty($faculty_id) {
        $stmt = $this->db->prepare("SELECT * FROM `{$this->getTableName()}` WHERE `faculty_id` = ?");
        $stmt->execute([$faculty_id]);
        return array_map(function($arr) {
            return $this->associativeArrayToObject($arr);
        }, $stmt->fetchAll());
    }

    
    /**
     * Gets one lecturer with given first name
     * 
     * @param string $first_name first name of the lecturer
     * @return mixed object if record found, FALSE if record not found 
     */
    function findOneWithFirstName($first_name) {
        $stmt = $this->db->prepare("SELECT * FROM `{$this->getTableName()}` WHERE `first_name` = ?");
        $stmt->execute([$first_name]);
        
        $row = $stmt->fetch();
        if ($row === FALSE) {
            return FALSE;
        }        

        return $this->associativeArrayToObject($row);
    }
}