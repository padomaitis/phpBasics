<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 3/21/2017
 * Time: 8:19 AM
 */

namespace lib\Magic;

class User
{
    public $name;
    public $email;
    private $password;

    public function __construct($name, $email, $password)
    {
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
    }

    public function __destruct()
    {
        echo $this->name." user is destroyed<br>";
    }

    public function __get($name){
        if(property_exists($this, $name)){
            return $this->$name;
        }
    }

    public function __set($name, $value){
        if(property_exists($this, $name)){
            $this->$name=$value;
        }
    }

    public function __isset($name){
        if(!isset($this->$name)){
        echo "You should set the value to ".$name." <br>";
        }
        return isset($this->$name);
    }
    public function __unset($name){
        unset($this->$name);
    }

    public function __sleep()
    {
        echo "Serializing...<br>";
        return array("name", "email");
    }
    public function __wakeup() {
        echo "<br>Password was hidden <br>";
    }
    public function __clone()
    {
        $this->name = $this->name."2";
        $this->email=$this->email."2";
        unset($this->password);
        echo "After cloning set Password for user ".$this->name."<br>";
    }


}