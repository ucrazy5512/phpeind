<?php 

include_once 'includes/connect.inc.php';

if(isset($_POST['submit'])) {

    //Post variables
    $fname = $_POST['fname']; 
    $lname = $_POST['lname']; 
    
    $year = $_POST['year']; 
    $month = $_POST['month']; 
    $day = $_POST['day']; 
    
    //Alle post variabelen in een string zetten genaamd fullbirthday
    $fullbday = "$year-$month-$day"; 
    $bday=date("Y-m-d",strtotime($fullbday));




    //Checkingif inputs are empty 
    if(empty($fname) || empty($lname )) {
        Header("Location: index.php?error=emptyfields");
    } else {
        $conn->query("INSERT INTO bday (fname, lname, bday)  VAlUES ('$fname', '$lname', '$bday')");
        header("Location: overzicht.php");
        header("Refresh: overzicht.php");
    }
}


//Als er op delete word geklikt 
if(isset($_GET['delete'])) { 
    $id = $_GET['delete']; 

    //Delete de record waar id de id uit de url is 
    $conn->query("DELETE FROM bday WHERE id=$id") or die($conn->error());

    //Stuurde gebruiker terug 
    Header("Location: overzicht.php");
    Header("Location: overzicht.php");
}






?> 