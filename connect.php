<?php
    $dsn="mysql:host=localhost;dbname = lb_1;charset=utf8";
    $username="root";
    $password="";
    try
    {
        $dbh = new PDO($dsn,$username,$password);
    }
    catch(PDOException $e)
    {
        print "Error!:". $e->getMessage()."<br>";
    die();
    }
