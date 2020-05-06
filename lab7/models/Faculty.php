<?php

class Faculty {
    private $id;
    private $faculty_name;

    /**
     * Converts associative array to object
     * 
     * @param Array $arr array with fields
     * @return object instance of Faculty
     */
    public static function fromArray($arr) {
        $obj = new Faculty();
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
     * Get the value of faculty_name
     */ 
    public function getFacultyName() {
        return $this->faculty_name;
    }

    /**
     * Set the value of faculty_name
     *
     * @return  self
     */ 
    public function setFacultyName($faculty_name) {
        $this->faculty_name = $faculty_name;
        return $this;
    }
    
}