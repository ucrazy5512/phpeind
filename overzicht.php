<?php

include 'includes/connect.inc.php'; 

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
    <title>Overzicht - Vierjaardagen</title>
</head>
<body>
    <?php
   $result = $conn->query("SELECT * FROM bday") or die($conn->error);

 
   ?>
   <?php




//Calculating the date function 
function calculate($id) { 
    $conn = new mysqli("localhost", "root", "", "eindopdracht"); 
    //QUERIES 
    $naam = $conn->query("SELECT * FROM bday WHERE id = '$id'");
    while($row = $naam->fetch_assoc()): 

        //Today
        $datetime = new DateTime(date("Y-m-d"));
        //Date in the databse  
        $dbdate = new DateTime(date($row["bday"]));
        //Subtracting the date from database from today to get current age 
        $interval = $datetime->diff($dbdate);
        $diffInYears   = $interval->y;
        echo($diffInYears);

        break;
    endwhile; 
} // Eind van de functie 


   


?> 


<div class="container">
   <div class="jumbotron">
   <h1 class="text-center">Uw vrienden: </h1>
   </div>
   <br>




   <?php


     while($row = $result->fetch_assoc()): ?>
     <div class="card  p-3 m-2">
        <div class="card-title"><b>Naam: <?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </b></div>
        <hr>
        <div class="card-content"><b>Geboorte datum: </b><?php echo $row['bday']; ?>  </div>
        <div class="card-info"><b>Datum vandaag:</b> <?php echo date('Y-m-d'); ?></div>
        <div class="card-info"></div>
        <div class="card-info"><b><?php echo $row['fname']  ?> is:   </b><?php echo calculate($row["id"]);?> Jaar oud</div>
        <div class="card-info"><a id="success"  href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger m-2">Verwijderen</a><a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary ">Veranderen</a></div>
    
     </div>
     <?php endwhile; ?>


     <div class="card p-2 m-5">
   <button onclick="location.href = 'index.php';" id="myButton" class="btn btn-info" >Voeg nieuwe vierjaardag toe</button>
   </div>
   </div>


   </div>
   <br>
<script>



$('a').click(function(e)) {
    e.preventDefault();
    swal(
				'Success',
				'You clicked the <b style="color:green;">Success</b> button!',
				'success'
			)
}
</script>


 <!-- Scripts !-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js">
        <script>
        
        </script>
</body>
</html>