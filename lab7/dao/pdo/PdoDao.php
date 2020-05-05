<?php

abstract class PdoDao implements Dao {

    private PDO $db;

    abstract protected function getTableName();
    abstract protected function associativeArrayToObject();
    abstract protected function objectToAssociativeArray();

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Gets all records from table
     * 
     * @return Array array of objects
     */
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM `$this->getTableName()`");
        return array_map($this->associativeArrayToObject, $stmt->fetchAll());
    }

    /**
     * Gets one record with given id
     * 
     * @param int $id id of record
     * @return mixed object if record found, FALSE if record not found 
     */
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM `$this->getTableName()` WHERE `id` = ?");
        $stmt->execute([$id]);
        
        $row = $stmt->fetch();
        if ($row === FALSE) {
            return FALSE;
        }        

        return $this->associativeArrayToObject($row);
    }

    public function update($id, $obj) {
        $formatted_set_string = "";
        
        $arrayObj = $this->objectToAssociativeArray();
        foreach ($arrayObj as $key) {
            $formatted_set_string .= " $key = $arrayObj[$key]";
        }

        $stmt = $this->db->prepare("UPDATE `$this->getTableName()` SET ($formatted_set_string)");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM `$this->getTableName()` WHERE `id` = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

}