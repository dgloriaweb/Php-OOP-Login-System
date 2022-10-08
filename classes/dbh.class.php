<?php

class dbh{
    protected function connect(){
        try{
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=phpoop',$username, $password);
            return $dbh;


        } catch(PDOException $e){
            print "Error connecting to database: " . $e->getMessage();
            die();
        }
    }
}