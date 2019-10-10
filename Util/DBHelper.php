<?php


class DBHelper
{
    public static function createConnection(){
        $link = new PDO("mysql:host=localhost;dbname=pwl20191","root","");
        $link->setAttribute(0,false);
        $link->setAttribute(3,2);
        return $link;
    }
}