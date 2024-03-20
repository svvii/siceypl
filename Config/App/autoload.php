<?php
spl_autoload_register(function($class){
    if (file_exists("config/App/".$class.".php")){
            require_once "config/App/".$class.".php";
    }
})

?>