<?php

$id = $_REQUEST['id'];
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

$query = 'SELECT * FROM theW WHERE ID = "' . $id . '" LIMIT 1;';
$result = $conn->query($query);

$query = 'UPDATE theW SET Institution = "' . $inst . '",CollectionTitle  = "' . $coll . '",InstCollNum  = "' . $instcollnum . '",InclusiveDates  = "' . $incDates . '",Extent  = "' . $extent . '",SubjectHeadings  = "' . $subHeads . '",Descriptions  = "' . $desc . '",Link  = "' . $link . '",Notes  = "' . $notes . '" WHERE ID = "' . $id . '";';
if($conn->query($query) === TRUE){
    echo("Success");
}else{
    echo $query;
    echo("Fail");
}

?>