<?php

$pass = $_REQUEST['q'];
$email = $_REQUEST['r'];

$conn = new mysqli("localhost", "root", "", "seniorProject");
if ($conn->connect_error){
    echo("Connection Error");
}

$query = "SELECT * FROM WUser WHERE Email = '$email' AND Authorized = '1';";
$result = $conn->query($query);

if(!$result){
    echo("Error");
}else if(mysqli_num_rows($result) > 1){
    echo("Error");
}else{
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        $enPass = $row["Pass"];

        if(password_verify($pass, $enPass)){
            $query = "DELETE FROM WUser WHERE Email = '$email' AND Pass = '$enPass';";
            if($conn->query($query) === TRUE){
                echo("Account deleted.");
            }else{
                echo("Error");
            }
            
        }else{
            echo("Wrong Password");
        }
    }
}

?>