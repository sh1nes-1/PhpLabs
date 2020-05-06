<?php

class Faculty {
    private $id;
    private $faculty_name;

    public function getId() {
        return $this->id;
    }

    // TODO: implement getters and setters

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
}