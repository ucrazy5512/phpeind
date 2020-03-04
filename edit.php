<?php 

include_once 'includes/connect.inc.php';
?> 

<?php 

$id = $_GET['edit']; 
$edit = $conn->query("SELECT * FROM bday WHERE id = '$id'"); 


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
    <title>Document</title>
</head>
<body>



<?php 

if(isset($_GET['submit'])) {
    
    //Variables 
    $firstName = $_GET['fname']; 
    $lname = $_GET['lname']; 
    
    $year = $_GET['year']; 
    $month = $_GET['month']; 
    $day = $_GET['day']; 
    $id = $_GET['edit'];
    
    //Alle post variabelen in een string zetten genaamd fullbirthday
    $fullbday = "$year-$month-$day"; 
    $bday=date("Y-m-d",strtotime($fullbday));

    $sql = "UPDATE bday SET fname='$firstName', lname='$lname', bday='$bday' WHERE id = $id";
    echo $sql;
    $conn->query($sql);
    Header("Location: overzicht.php");
}

?>

<div class="jumbotron">
   <h1 class="text-center">Verander Waardes</h1>
    <div class="container text-center">
    <?php while($row = $edit->fetch_assoc()):  ?> 
        <form action="edit.php" method="GET">
            <div class="form-group">

              <input type="text" name="fname" value="<?php echo $row['fname'] ?>">
            </div>
            <div class="form-group">
              <input type="text" name="lname" value="<?php echo $row['lname'] ?>">
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

            echo '<input type="hidden" name="edit" value="' . $id . '">'
?>




            <div class="form-group">
             <input type="submit" value="submit" name="submit" class="btn btn-primary">
            </div>
        </form>
    <?php

    endwhile;
    ?> 
    </div>

    <?php 




?> 
</div>
</body>
</html>