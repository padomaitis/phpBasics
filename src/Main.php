<?php


spl_autoload_register(function ($class){
    $path = "";
    if(substr_count($class,"\\")==2) {
        $path = __DIR__ . "/" . $class . ".php";
    }
    elseif (substr_count($class,"\\")==1){
        $path = __DIR__ . "/lib/" . $class . ".php";
    }
    elseif (substr_count($class,"\\")==0){
        $path = __DIR__ . "/lib/Magic/" . $class . ".php";
    }
    if (file_exists($path)) {
        require_once($path);
    }
});
