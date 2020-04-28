<?php

$coll = $_REQUEST["q"];
$email = $_REQUEST["r"];
$comm = $_REQUEST["s"];
$docID = $_REQUEST["t"];

$conn = new mysqli("localhost", "root", "", "seniorProject");

$query = "SELECT ID FROM MSUComment ORDER BY ID DESC LIMIT 0, 1;";
$result = $conn->query($query);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $next = $row["ID"] + 1;
}

$add = 'INSERT INTO MSUComment(ID, Email, DocumentID, Document, Comment) VALUES("' . $next . '", "' . $email . '", "' . $docID . '", "' . $coll . '", "' . $comm . '");';
if ($conn->query($add) === TRUE) {
    echo "Inserted";
} else {
    echo "Error Inserting";
}


?>