<?php

$conn = new mysqli("localhost", "root", "", "seniorProject");

$query = "SELECT * FROM WComment WHERE ID > '0';";
$result = $conn->query($query);
if(!$result){
    echo "<br><br><h2 style='text-align:center;'>No Comments<h2><br><br>";
}else{
    if(mysqli_num_rows($result) != 0){
        echo "<table id='verifyTable' style='width: 100%; text-align: center; margin-left: auto; margin-right: auto'>
        <tr style='font-size: 26px; color: #174074'>
            <style>th: {max-width: 250px;}</style>
    
            <th style='width: 10%; text-align: center;'>E-Mail</th>
            <th style='width: 25%; text-align: center;'>Document</th>
            <th style='width: 40%; text-align: center;'>Comment</th>
            <th style='width: 20%; text-align: center;'>Remove?</th>
        </tr>";

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo "<tr style='min-height: 75px;'>
            <td style='width: 10%;'>" . $row['Email'] . "</td>
            <td style='width: 25%;'>" . $row['Document'] . "</td>
            <td style='width: 40%;' id='Comment" . $row['ID'] . "'>" . $row['Comment'] . "</td>
            <td style='width: 20%;'><button onclick='removeComment(" . $row['ID'] . ")'>Remove</button></td>
        </tr>";
        }
    }else{
        echo "<br><br><h2 style='text-align:center;'>No Comments<h2><br><br>";
    }
}


?>