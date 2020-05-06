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

    public function getId() {
        return $this->id;
    }

    // TODO: implement getters and setters

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

}