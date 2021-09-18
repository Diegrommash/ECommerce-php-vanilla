<?php

function controllers_autoLoad ($classname){
    include 'controllers/' . $classname . '.php';
}

spl_autoload_register('controllers_autoLoad');