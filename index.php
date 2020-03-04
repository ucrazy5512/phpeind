<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
    <link rel="stylesheet" href="">
    <title>Calender</title>


</head>

<body>

    <div class="jumbotron">
        <div class="container">
            <h1>Verjaardag</h1>
            <form action="process.php" method="post">
                <div class="form-group">
                    <input type="text" name="fname" placeholder="Voornaam" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="lname" placeholder="Achternaam" class="form-control">
                </div>

                <h5>Jaar / Maand / Dag</h5>
                <?php

	echo '<select name="year" class="btn btn-danger dropdown-toggle pd-5 btn-lg m-2" >';
	  echo '<option></option>';
		for($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--){
		  echo "<option value='$i'>$i</option>";
        } 
        ?>
                <?php
	echo '</select>';
	echo '<select name="month" class="btn btn-danger dropdown-toggle pd-5 btn-lg m-2">';
		echo '<option></option>';
		for($i = 1; $i <= 12; $i++){
		  $i = str_pad($i, 2, 0, STR_PAD_LEFT);
			echo "<option value='$i'>$i</option>";
        }
        
    
    echo '</select>';
    
	echo '<select name="day" class="btn btn-danger dropdown-toggle pd-5 btn-lg m-2">';
	  echo '<option></option>';
		for($i = 1; $i <= 31; $i++){
		  $i = str_pad($i, 2, 0, STR_PAD_LEFT);
			echo "<option value='$i'>$i</option>";
		}
	echo '</select>';
?>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Voeg toe!</button>
            </form>
        </div>
        </div>
    </div>

    <div class="container">
        <div class="header p-5 text-center">
            <h1>Vergeet nooit meer iemands verjaardagsdatum!</h1>
            <p>Vergeet nooit meer je vrienden of families verjaardag met deze handig web applicatie gemaakt door Roy de
                Jong.  op het Drenthe College in assen. Door deze app te gebruiken ga je akkoord met de terms & service</p>
                <button id="success" class="btn btn-primary btn-lg">Koop Premium</button>
        </div>
    </div>



 <!-- Scripts !-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
    

  <script>
  	$(document).on('click', '#success', function(e) {
			swal(
				'Wilt u eerst meer information?',
				'Bij koop word er $50 van uw rekening geschreven',
				'info'
			)
		});
  </script>

</body>

</html>