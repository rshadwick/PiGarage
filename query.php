<?php
require_once('mysqli_connect.php');

$sql = "SELECT ID, ROUND(Temp, 1) AS RoundedTemp, ROUND(Humidity, 1) as RoundedHumidity, DATE_FORMAT(RecordDate, '%a %b %e @ %h:%i %p') as RDate FROM GarageTemp ORDER BY ID DESC LIMIT 1";
$result = $conn->query($sql);
echo $result->num_rows;
//$pinStatus2 = shell_exec("gpio -g read 27");
$pinStatus2 = system('gpio -g read 22');
echo $pinStatus2;
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Garage Status</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');
        body {
        /*background-color: #484848;*/
        font-family: 'Open Sans', sans-serif;
        }
        .tablestyle{
            font-size:.8em;
        }
    </style>
  </head>

<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div id="" class="col-sm-5">
                    <div id="tempTable">
                        <!--<table class="tablestyle table table-condensed table-hover">
                            <tr>
                                <th> Temp </th>
                                <th> Humidity </th>
                                <th> Date </th>
                            </tr>
                        -->
                        <?php
                            /*
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
                            */
                        ?>
                        <!--
                        </table>-->
                    </div>

                    
                    
                        <a href="relayon.php">Data</a></br></br>
                        <button type="button" id="GarageBtn" class="btn btn-primary form-control">Relay ON</button>
                        <br />
                        <br />

                        <?php
                            //returns 0 = low; 1 = high
                            if ($pinStatus2 == 1) {
                                echo "<img id='garageImg' src='/images/garageGreen128.png'/>";
                            }
                            elseif ($pinStatus2 == 0) {
                                echo "<img id='garageImg' src='/images/garageRed128.png'/>";
                            }
                        ?>


                </div>
				<div class="col-md-6">
                
                    <!--<img src="/images/garageRed32.png" /><img src="/images/garageGreen64.png" /><img src="/images/garageGreen128.png" />-->
				</div>
			</div>
		</div>
	</div>
</div>
<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/src/loadingoverlay.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/extras/loadingoverlay_progress/loadingoverlay_progress.min.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() { /// Wait till page is loaded
            random_no();
            setInterval(random_no,60000)
            function random_no(){
                //$('#detailed').click(function(){
                    //$('#tempTable').hide('slow');
                    $("#tempTable").LoadingOverlay("show");
                    $('#tempTable').load('ajaxpulls/pullTemp.php #main', function() {
                        /// can add another function here
                    });
                    //$('#tempTable').show('slow');
                    setTimeout(function(){
                        $("#tempTable").LoadingOverlay("hide");
                    }, 3000);
                    
                //});
            }

            $('#GarageBtn').click(function(){
                var a = new XMLHttpRequest();
                a.open("GET","relayon.php");
                a.send();
            });
            $('#garageImg').click(function(){
                var a = new XMLHttpRequest();
                a.open("GET","relayon.php");
                a.send();
            });

        }); //// End of Wait till page is loaded
    </script>
  </body>
</html>