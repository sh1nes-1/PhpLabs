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

    /**
     * Gets one record with given name
     * 
     * @param string $name name of degree
     * @return mixed object if record found, FALSE if record not found 
     */
    public function findOneWithName($degree_name) {
        $stmt = $this->db->prepare("SELECT * FROM `{$this->getTableName()}` WHERE `degree_name` = ?");
        $stmt->execute([$degree_name]);
        
        $row = $stmt->fetch();
        if ($row === FALSE) {
            return FALSE;
        }        

        return $this->associativeArrayToObject($row);
    }

}