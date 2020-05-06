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

    /**
     * Gets one record with given name
     * 
     * @param string $name name of faculty
     * @return mixed object if record found, FALSE if record not found 
     */
    public function findOneWithName($faculty_name) {
        $stmt = $this->db->prepare("SELECT * FROM `{$this->getTableName()}` WHERE `faculty_name` = ?");
        $stmt->execute([$faculty_name]);
        
        $row = $stmt->fetch();
        if ($row === FALSE) {
            return FALSE;
        }        

        return $this->associativeArrayToObject($row);
    }

}