<?php

class Degree {
    private $id;
    private $degree_name;

    /**
     * Converts associative array to object
     * 
     * @param Array $arr array with fields
     * @return object instance of Degree
     */
    public static function fromArray($arr) {
        $obj = new Degree();
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
     * Get the value of degree_name
     */ 
    public function getDegreeName() {
        return $this->degree_name;
    }

    /**
     * Set the value of degree_name
     *
     * @return  self
     */ 
    public function setDegreeName($degree_name) {
        $this->degree_name = $degree_name;
        return $this;
    }
    
}