<?php
require_once __DIR__ . "/../Dao.php";

abstract class PdoDao implements Dao {
    protected PDO $db;

    abstract protected function getTableName();
    abstract protected function associativeArrayToObject($arr);
    abstract protected function objectToAssociativeArray($obj);

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Gets all records from table
     * 
     * @return Array array of objects
     */
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM `{$this->getTableName()}`");
        return array_map(function($arr) {
            return $this->associativeArrayToObject($arr);
        }, $stmt->fetchAll());
    }

    /**
     * Gets one record with given id
     * 
     * @param int $id id of record
     * @return mixed object if record found, FALSE if record not found 
     */
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM `{$this->getTableName()}` WHERE `id` = ?");
        $stmt->execute([$id]);
        
        $row = $stmt->fetch();
        if ($row === FALSE) {
            return FALSE;
        }        

        return $this->associativeArrayToObject($row);
    }

    /**
     * Creates record in table
     * 
     * @param object $obj instance of object
     * @return int id of created object
     */
    function insert($obj) {
        return NULL;
    }

    /**
     * Updates record in table
     * 
     * Uses $obj->getId() function to get id
     * 
     * @param object $obj instance of object with $id filled
     * @return int count of affected rows
     */
    public function update($obj) {
        $formatted_set_string = "";
        
        $arrayObj = $this->objectToAssociativeArray($obj);
        foreach ($arrayObj as $key) {
            $formatted_set_string .= " $key = $arrayObj[$key],";
        }

        $stmt = $this->db->prepare("UPDATE `{$this->getTableName()}` SET ($formatted_set_string) WHERE `id` = ?");
        $stmt->execute([$obj->getId()]);
        return $stmt->rowCount();
    }
    
    /**
     * Deletes record from table
     * 
     * @param int $id id of record
     * @return int count of affected rows
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM `{$this->getTableName()}` WHERE `id` = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

}