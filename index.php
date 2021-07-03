<?php
$insert = false ;
if( isset($_POST['fname'])){

$server = "localhost";
$username = "root";
$pass = "";
$con = new mysqli($server, $username, $pass);
$con->select_db("trip");

if (!$con) {
    die ( "Connection to this database failed due to " . mysqli_connect_error());
}

// echo " Success connecting to database !!";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$rollno = $_POST['rollno'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$stream = $_POST['stream'];


$sql = " INSERT INTO `trip` (`fname`, `lname`, `rollno`, `phone`, `email`, `stream`,`dt`) VALUES ('$fname', '$lname', '$rollno', '$phone', '$email', '$stream', current_timestamp())"; 


if($con->query($sql) == true){
    //echo "Successfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error ";
}

$con->close() ;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Benne&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet" >
</head>
<body>
    <img class="image" src="bg.png" alt="University">
    <div class="main-container">
        <div class="instructions">
            <h3> TRIP TO CANADA FORM</h2>
            <p id="p1">Enter your details below in order to register for Semster-Exchange 2021-22 and click the Submit button to intiate your process. </p>
            <p id="p2"> Note: Students enrolled in Semester-6 only are eligible for this program. </p>

            <?php
                if( $insert == true ){
                    echo " <p class='submitmsg' style=' color: blue; font-weight: 600;'>Thank you for registering with us. Our team will contact you within 24 hours.</p> ";
                }
            ?>              
        </div>
        <form action="index.php" method="post">

            <label for="fname">First Name : </label>
            <input type="text" name="fname" id="fname" placeholder="Enter here">
    
            <label for="lname">Last Name : </label>
            <input type="text" name="lname" id="lname" placeholder="Enter here">
    
            <label for="rollno">Enrollment Number : </label>
            <input type="number" name="rollno" id="rollno" placeholder="Enter here" step="1">
    
            <label for="phone">Contact Number : </label>
            <input type="phone" name="phone" id="phone" placeholder="Enter here">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter here">

            
            <p class="p3">Stream: 
                <br>
            
            <input type="radio" name="stream" id="CSE" value="CSE">
            <label for="CSE">CSE</label>
           
            <input type="radio" name="stream" id="IT" VALUE="IT">
            <label for="IT">IT</label>
            
            <input type="radio" name="stream" id="ECE" VALUE="ECE">
            <label for="ECE">ECE</label>
           
            <input type="radio" name="stream" id="EEE" VALUE="EEE">
            <label for="EEE">EEE</label>
        </p>

        <button class="btn sub">Submit</button>
        <!-- <button class="btn res">Reset</button> -->

        </form>
    </div>
   

    
    <script src="script.js"></script>

</body>

</html>