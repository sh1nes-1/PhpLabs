<?php

class Position {
    private $id;
    private $position_name;

    /**
     * Converts associative array to object
     * 
     * @param Array $arr array with fields
     * @return object instance of Position
     */
    public static function fromArray($arr) {
        $obj = new Position();
        foreach ($arr as $key => $value) {
            $obj->{$key} = $value;
        }
        return $obj;
    }

    /**
     * 
     * @return array associative array with fields of this object
     */
    public function toArray() {
        return get_object_vars($this);
    }

    /**
     * Get the value of id
     */ 
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of position_name
     */ 
    public function getPositionName() {
        return $this->position_name;
    }

    /**
     * Set the value of position_name
     *
     * @return  self
     */ 
    public function setPositionName($position_name) {
        $this->position_name = $position_name;
        return $this;
    }
    
}