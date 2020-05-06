<?php
require_once __DIR__ . "/Model.php";

class Lecturer implements Model {
    private $id;
    private $first_name;
    private $last_name;
    private $surname;
    private $birthday;
    private $salary;
    private $faculty_id;
    private $degree_id;
    private $position_id;

    /**
     * Converts associative array to object
     * 
     * @param Array $arr array with fields
     * @return object instance of Lecturer
     */
    public static function fromArray($arr) {
        $obj = new Lecturer();
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
     * Get the value of first_name
     */ 
    public function getFirstName() {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirstName($first_name) {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLastName() {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLastName($last_name) {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * Get the value of surname
     */ 
    public function getSurname() {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname) {
        $this->surname = $surname;
        return $this;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday() {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * Get the value of salary
     */ 
    public function getSalary() {
        return $this->salary;
    }

    /**
     * Set the value of salary
     *
     * @return  self
     */ 
    public function setSalary($salary) {
        $this->salary = $salary;
        return $this;
    }

    /**
     * Get the value of faculty_id
     */ 
    public function getFacultyId() {
        return $this->faculty_id;
    }

    /**
     * Set the value of faculty_id
     *
     * @return  self
     */ 
    public function setFacultyId($faculty_id) {
        $this->faculty_id = $faculty_id;
        return $this;
    }

    /**
     * Get the value of degree_id
     */ 
    public function getDegreeId() {
        return $this->degree_id;
    }

    /**
     * Set the value of degree_id
     *
     * @return  self
     */ 
    public function setDegreeId($degree_id) {
        $this->degree_id = $degree_id;
        return $this;
    }

    /**
     * Get the value of position_id
     */ 
    public function getPositionId() {
        return $this->position_id;
    }

    /**
     * Set the value of position_id
     *
     * @return  self
     */ 
    public function setPositionId($position_id) {
        $this->position_id = $position_id;
        return $this;
    }
    
}