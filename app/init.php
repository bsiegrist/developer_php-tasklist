<?php

//sessions starten
session_start();


//autoloader
function my_autoload($class_name){
    $file = 'classes/'.$class_name.'.php';
    require_once($file);
}

spl_autoload_register('my_autoload');


// Funktion die einen Array schön darstellt
function print_array($array) {
    echo '<pre>' . print_r($array, true) . '</pre>';
}


?>