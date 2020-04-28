<?php

$comment = $_REQUEST['q'];

$conn = new mysqli("localhost", "root", "", "seniorProject");
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$query = 'SELECT * FROM WComment WHERE Comment = "' . $comment . '";';
$result = $conn->query($query);

if(!$result){
    echo("Fail");
}else{
    $query = 'DELETE FROM WComment WHERE Comment = "' . $comment . '";';
    if ($conn->query($query) === TRUE) {
        echo "Removed ";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>