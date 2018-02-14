<?php
require_once('../mysqli_connect.php');

$sql = "SELECT DoorDown, DoorUP FROM GarageTime ORDER BY ID DESC LIMIT 1";

$result = $conn->query($sql);
//echo $result->num_rows;
?>		

<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "Temp: " . $row["Temp"]. " - Humidity: " . $row["Humidity"]. " " . $row["lastname"]. "<br>";
        //echo "<br /><br /><div>" . $row["DoorUP"]. "</div><br /><div>" . $row["DoorDown"]. "</div><br /><br />";
        $stringTest = $row["DoorUP"];
        $stringTest2 = $row["DoorDown"];
        //echo $row["DoorUP"] . "";
        echo "<br /><br />";
        echo $stringTest;
        echo "<br /><br />";
        echo $stringTest2;
        //echo $row["DoorUP"] . "<br />";
        //$interval = $row["DoorUP"]->diff($row["DoorDown"]);
        //$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
        echo "<br /><br />";
        if ($stringTest > $stringTest2) {
            $diff = abs(strtotime($stringTest) - strtotime($stringTest2));
            echo "Up is Greater<br />";
        }
        else{
           $diff = abs(strtotime($stringTest2) - strtotime($stringTest));
           echo "Down is Greater<br />";
        }
        
        $years   = floor($diff / (365*60*60*24)); 
        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
        $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 

        printf("%d days, %d hours, %d minuts\n, %d seconds\n", $days, $hours, $minuts, $seconds); 
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</table>