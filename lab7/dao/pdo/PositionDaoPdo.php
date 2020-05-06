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

    /**
     * Gets one record with given name
     * 
     * @param string $name name of position
     * @return mixed object if record found, FALSE if record not found 
     */
    public function findOneWithName($position_name) {
        $stmt = $this->db->prepare("SELECT * FROM `{$this->getTableName()}` WHERE `position_name` = ?");
        $stmt->execute([$position_name]);
        
        $row = $stmt->fetch();
        if ($row === FALSE) {
            return FALSE;
        }        

        return $this->associativeArrayToObject($row);
    }    

}