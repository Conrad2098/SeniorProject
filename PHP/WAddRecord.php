<?php

$inst = $_REQUEST['q'];
$coll = $_REQUEST['r'];
$instcollnum = $_REQUEST['s'];
$incDates = $_REQUEST['t'];
$extent = $_REQUEST['u'];
$subHeads = $_REQUEST['v'];
$desc = $_REQUEST['w'];
$link = $_REQUEST['x'];
$notes = $_REQUEST['y'];


$conn = new mysqli("localhost", "root", "", "seniorProject");
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT ID FROM theW ORDER BY ID DESC LIMIT 0, 1;";
$result = $conn->query($query);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $next = $row["ID"] + 1;
}

$query = 'INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES(' . $next . ',"' . $inst . '","' . $coll . '","' . $instcollnum . '","' . $incDates . '","' . $extent . '","' . $subHeads . '","' . $desc . '","' . $link . '","' . $notes . '");';
if($conn->query($query) === TRUE){
    echo("Success");
}else{
    echo $query;
    echo("Fail");
}

?>