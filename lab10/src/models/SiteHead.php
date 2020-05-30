<?php

class SiteHead {
    private $id;
    private $author_full_name;
    private $description;
    
    /**
     * Converts associative array to object
     * 
     * @param Array $arr array with fields
     * @return object instance of SiteHead
     */
    public static function fromArray($arr) {
        $obj = new SiteHead();
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
     * Get the value of author_full_name
     */ 
    public function getAuthorFullName() {
        return $this->author_full_name;
    }

    /**
     * Set the value of author_full_name
     * @return  self
     */ 
    public function setAuthorFullName($author_full_name) {
        $this->author_full_name = $author_full_name;
        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set the value of description
     * @return  self
     */ 
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }
}