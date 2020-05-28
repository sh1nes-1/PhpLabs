<?php
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/PdoDao.php";

class UserDaoPdo extends PdoDao {
    const TABLE_NAME = "users";

    protected function getTableName() {
        return self::TABLE_NAME;
    }

    protected function associativeArrayToObject($arr) {
        return User::fromArray($arr);
    }

    protected function objectToAssociativeArray($obj) {
        return $obj->toArray();
    }

    /**
     * Gets one record with given username
     * 
     * @param string $username username of user
     * @return mixed object if record found, FALSE if record not found 
     */
    public function findOneWithUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM `{$this->getTableName()}` WHERE `username` = ?");
        $stmt->execute([$username]);
        
        $row = $stmt->fetch();
        if ($row === FALSE) {
            return FALSE;
        }        

        return $this->associativeArrayToObject($row);
    }    

}