<?php

$old = $_REQUEST['q'];
$new = $_REQUEST['r'];
$email = $_REQUEST['s'];

$eNew = password_hash($new, PASSWORD_DEFAULT);

$conn = new mysqli("localhost", "root", "", "seniorProject");
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
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

        if(password_verify($old, $enPass)){
            $query = "UPDATE WUser SET Pass = '$eNew' WHERE Email = '$email' AND Authorized = '1';";
            $result = $conn->query($query);
            echo("PasswordChanged");
        }else{
            echo("WrongOld");
        }
    }
}
?>