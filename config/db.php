<?php

class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'ECommercePrueba');
        $db->query("SET NAMES 'utf8'"); /*->$query("SET NAMES 'utf8'");*/
        return $db;
    }
    
}

