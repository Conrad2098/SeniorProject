<?php

$pass = $_REQUEST['q'];
$email = $_REQUEST['r'];

$conn = new mysqli("localhost", "root", "", "seniorProject");
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM msuUser WHERE Email = '$email' AND Authorized = '1';";
$result = $conn->query($query);

if(!$result){
    echo("Error");
}else if(mysqli_num_rows($result) > 1){
    echo("Error");
}else{
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        $enPass = $row["Pass"];

        if(password_verify($pass, $enPass)){
            $query = "DELETE FROM msuUser WHERE Email = '$email' AND Pass = '$enPass';";
            $result = $conn->query($query);
            echo("Account deleted.");
        }else{
            echo("Wrong Password");
        }
    }
}

?>