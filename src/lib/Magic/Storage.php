<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 3/21/2017
 * Time: 8:20 AM
 */

namespace lib\Magic;


class Storage
{
    private $dataStorage;
    public static $names;

    public function __construct()
    {
        $this->dataStorage = [];
        self::$names =[];
    }

    public static function __set_state($an_array)
    {
        $storage = new Storage();
        foreach ($an_array as $name){
            array_push($storage->dataStorage, $name);
        }
        return $storage;
    }

    public function __toString()
    {
        if(empty($this->dataStorage)){
            return "Sorry storage is empty at the moment<br>";
        }
        $string ="";
        foreach ($this->dataStorage as $u){
            $string.=$u->name." ".$u->email."<br>";
        }
        return $string;
    }

    public function __invoke($obj)
    {
        array_push($this->dataStorage, $obj);
        array_push(self::$names, $obj->name);
    }
    private function erase(){
        $this->dataStorage=[];
    }
    public function __call($method, $param = null ){
        if($method =="erase"){
            echo "<br>It's a private method ".$method."<br>";
            $this->erase();
            return;
        }
        echo "<br>Storage object has no method ".$method."<br>";

    }

    private static function getUser(){
        return self::$names;
    }
    public static function  __callStatic($method, $param = null){

        if($method=="getUser"){
            return self::getUser();
        }
        echo "<br>Storage object has no static method ".$method."<br>";

    }

    public function __debugInfo()
    {

        return array($this->dataStorage);
    }
}