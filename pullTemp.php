<?php
require_once('../mysqli_connect.php');

$sql = "SELECT ID, ROUND(Temp, 1) AS RoundedTemp, ROUND(Humidity, 1) as RoundedHumidity, DATE_FORMAT(RecordDate, '%a %b %e @ %h:%i %p') as RDate FROM GarageTemp ORDER BY ID DESC LIMIT 1";
$result = $conn->query($sql);
echo $result->num_rows;
?>		
<table id="main" class="tablestyle table table-condensed table-hover">
    <tr>
        <th> Temp </th>
        <th> Humidity </th>
        <th> Date </th>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "Temp: " . $row["Temp"]. " - Humidity: " . $row["Humidity"]. " " . $row["lastname"]. "<br>";
        echo "<tr><td>" . $row["RoundedTemp"]. "&deg;F <img src='/images/thermometerGray16.png'/></td><td>" . $row["RoundedHumidity"]. "%</td><td>" . $row["RDate"]. "</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</table>