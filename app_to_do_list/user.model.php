<?php

class User{
    private $id;
    private $name;
    private $email;
    private $pass;
    
    public function __get($attribute){
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        $this->$attribute = $value;
    }

}

?>