<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tax";

$conn = new mysqli($servername, $username, $password, $database);

if($conn -> connect_error){
    die("connection failed:". $conn->connect_error);

}
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name= $_POST['jina'];
    $phone= $_POST['phone'];
    $items= $_POST['namba'];
    $cost= $_POST['good'];
    $date= $_POST['siku'];

    $uploadsdir='uploaded/';
    $uploaded=$_FILES['profile']['name'];
    $uploadspath=$uploadsdir.$uploaded;
    if(move_uploaded_file($_FILES['profile']['tmp_name'], $uploadspath)){
        echo '<script>';
        echo'alert("file uploaded successfully")';
        echo 'window.location.href="index.php"';
        echo '</script>';
    }
    else{
        echo "Error";
    }





    $sql="insert into taxees(name, phone, items, amount, date,profile)values('$name', '$phone', '$items', '$cost', '$date', '$uploaded')";

    $run=mysqli_query($conn,$sql);

    if($run){
        echo"<script>alert('item added to the database'): window.location.href='index.php';</script>";
    }
}
?>








<!doctype html>
<html>
    <head>
        <title>Taxees.</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
     <center>
        <h1>Taxes</h1>
     </center>
     <form action="" method="POST" style="width:500px;" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Customer Name.</label>
            <input type="text" name="jina" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Total cost of goods.</label>
            <input type="number" name="good" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Number of goods.</label>
            <input type="number" name="namba" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Phone Number.</label>
            <input type="number" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="">date.</label>
            <input type="date" name="siku" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Customer profile..</label>
            <input type="file" name="profile" class="form-control">
        </div>
        <input type="submit" value="submit-information" class="form-control btn btn-primary">
        

     </form>
     <a href="sip.php" class="btn btn-success" >View highest

    </body>
</html>