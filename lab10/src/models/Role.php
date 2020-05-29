<?php

class Role {
    private $id;
    private $name;

    /**
     * Converts associative array to object
     * 
     * @param Array $arr array with fields
     * @return object instance of Role
     */
    public static function fromArray($arr) {
        $obj = new Role();
        foreach ($arr as $key => $value) {
            if (is_numeric($key)) continue;
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
     * @return  self
     */ 
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}