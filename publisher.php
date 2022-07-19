<?php
header('Content-Type: application/json'); 
header('Cache-Control: no-cache, must-revalidate');
include('connect.php');

    $db = "lb_1";
    if (isset($_POST['publisher'])) $publisher = $_POST['publisher'];
    else $publisher = 'RANOK';


    try {
        $sql = "SELECT $db.literature.name as book,$db.literature.ISBN,$db.literature.publisher,$db.literature.year,$db.literature.quantity FROM $db.literature WHERE publisher = :publisher";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':publisher' => $publisher));
        $timetable = $sth->fetchAll(PDO::FETCH_NUM);
        echo json_encode($timetable);
    } catch (PDOException $e) {
        
        die("Error!:" . $e->getMessage() . "<br>");
    }
    ?>
 