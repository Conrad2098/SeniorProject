<?php

$val = $_REQUEST["q"];
$cat = $_REQUEST["cat"];

$conn = new mysqli("localhost", "root", "", "seniorProject");

$query = "SELECT * FROM theW WHERE " . $cat . " LIKE '%" . $val . "%';";
$result = $conn->query($query);
if(!$result){
    echo "<h2 style='text-align:center;'>No Results Matching Search<h2>";
}

if(mysqli_num_rows($result) != 0){
    echo "<table id='resTable' style='width: 80%; text-align: center; margin-left: auto; margin-right: auto'>
    <tr style='color: #174074; font-size: 20px;'>
        <th>Collection Title</th>
        <th>Institution</th>
        <th>Dates</th>
        <th>Subject Headings</th>
    </tr>";
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        if($row['InclusiveDates'] == NULL){
            $dates = "None";
        }else{
            $dates = $row['InclusiveDates'];
        }
        if($row['SubjectHeadings'] == NULL){
            $SH = "None";
        }else{
            $SH = $row['SubjectHeadings'];
        }

        echo "
        <tr style='height: 100px'>
            <td style='color: #333333'>" . $row['CollectionTitle'] . "</td>
            <td style='color: #333333'>" . $row['Institution'] . "</td>
            <td style='color: #333333'>" . $dates . "</td>
            <td style='color: #333333'>" . $SH . "</td>
        </tr>";
    }
    echo "</table>";
}
?>