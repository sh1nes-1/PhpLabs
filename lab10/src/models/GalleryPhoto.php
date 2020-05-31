<?php

class GalleryPhoto {
    private $id;
    private $photo_url;
    
    /**
     * Converts associative array to object
     * 
     * @param Array $arr array with fields
     * @return object instance of GalleryPhoto
     */
    public static function fromArray($arr) {
        $obj = new GalleryPhoto();
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
     * Get the value of photo_url
     */ 
    public function getPhotoUrl() {
        return $this->photo_url;
    }

    /**
     * Set the value of photo_url
     * @return  self
     */ 
    public function setPhotoUrl($photo_url) {
        $this->photo_url = $photo_url;
        return $this;
    }
}