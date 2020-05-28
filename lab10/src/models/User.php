<?php

class User {
    private $id;
    private $username;
    private $password;
    private $role_id;

    /**
     * Converts associative array to object
     * 
     * @param Array $arr array with fields
     * @return object instance of User
     */
    public static function fromArray($arr) {
        $obj = new User();
        foreach ($arr as $key => $value) {
            $obj->{$key} = $value;
        }
        return $obj;
    }

    public function isAdmin() {
        return $this->getRoleId() == 0;
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
     * Get the value of username
     */ 
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set the value of username
     * @return  self
     */ 
    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set the value of password
     * @return  self
     */ 
    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }    

    /**
     * Get the value of password
     */ 
    public function getRoleId() {
        return $this->role_id;
    }

    /**
     * Set the value of role_id
     * @return  self
     */ 
    public function setRoleId($role_id) {
        $this->role_id = $role_id;
        return $this;
    }       
}