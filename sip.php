<?php

//connection to the database-- servername, username, password, database\

$servername="localhost";

$username="root";

$password="";

$database="tax";

//crud operate

$conn=new mysqli($servername, $username, $password, $database);

//display an error message

if($conn -> connect_error){

die("connection failed:".$conn->connect_error); //when the connection string is not correct

}

//fetch from the table where the amount is max(highest) and the date=today

$today=date('Y-m-d');

//$date='2024-01-10'; //convert this into a date using the php date function

//SELECT

$sql="select * from taxees where date='$today' and amount=(select max(amount) from taxees where date='$today')";

$run=mysqli_query($conn, $sql);
//This is a comment
//if not

if(!$run){

echo "Error" .$conn->error;

}

elseif($run->num_rows>0){

//fetchone

while($row=$run->fetch_assoc()){

$name=$row['name'];

$phone=$row['phone'];

$amount=$row['amount'];
$profile= $row['profile'];

}

}

?>



<!doctype html>
<html>
    <head>
        <title>Highest taxed.</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="jumbotron">
            <center>
                <h1>The highest taxation is:<?php echo $amount; ?></h1>
                <h3>The most taxed individual is <?php echo $name; ?><br>Their contact information is <?php echo $phone; ?></h3>
                <img src="uploaded/<?php echo $profile; ?>" alt="This is a picture." style="height:400px;width:400px;">
            </center>
        </div>
    </body>
</html>