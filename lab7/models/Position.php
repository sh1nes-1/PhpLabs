<?php

class Position {
    private $id;
    private $position_name;

    public function getId() {
        return $this->id;
    }

    // TODO: implement getters and setters

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
}