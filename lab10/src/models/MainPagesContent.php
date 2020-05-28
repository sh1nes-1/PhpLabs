<?php

class MainPagesContent {
    private $id;
    private $photo;
    private $text;

    /**
     * Converts associative array to object
     * 
     * @param Array $arr array with fields
     * @return object instance of MainPagesContent
     */
    public static function fromArray($arr) {
        $obj = new MainPagesContent();
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
     * @return  self
     */ 
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto() {
        return $this->photo;
    }

    /**
     * Set the value of photo
     * @return  self
     */ 
    public function setPhoto($photo) {
        $this->photo = $photo;
        return $this;
    }

    /**
     * Get the value of text
     */ 
    public function getText() {
        return $this->text;
    }

    /**
     * Set the value of text
     * @return  self
     */ 
    public function setText($text) {
        $this->text = $text;
        return $this;
    }
}