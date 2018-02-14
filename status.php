<!DOCTYPE htmkl>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/masterstyle.css" rel="stylesheet">
    <style>
      body{background-color: #0D1B2A;}
      .panel-heading{background-color: #415A77 !important;}
      .panel{border:none !important;}
      .panel-body{background-color: #E0E1DD !important;}
      .label-pill {
          padding-right: .6em;
          padding-left: .6em;
          border-radius: 10rem;
          margin-left: 5px;
        }
        .cust-danger-pills > .active > a, .cust-danger-pills > .active > a:hover {
            background-color: #f0ad4e !important;
            border-color: #eea236 !important;
        }
        .cust-success-pills > .active > a, .cust-success-pills > .active > a:hover {
            background-color: #5cb85c !important;
            border-color: #5cb85c !important;
        }
    </style>
  </head>

<?php $pinStatus2 = shell_exec("gpio -g read 27"); ?>
<?php $pinStatusR = shell_exec("gpio -g read 17"); ?>
  <body>
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-3">
    		</div>
    		<div class="col-md-6">
          <br>
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<h3 class="panel-title">
                <ul class="nav nav-pills <?php

                      //print($pinStatusR);
                      if ($pinStatusR == 1) {
                          echo "cust-success-pills";
                      }
                      elseif ($pinStatusR == 0) {
                          echo "cust-danger-pills";
                      }
                 ?>
                  ">
          				<li class="active">
          					 <a href="#"> <span class="label label-pill
                       <?php
                         //returns 0 = low; 1 = high
                         if ($pinStatus2 == 1) {
                             echo "label-info ";
                         }
                         elseif ($pinStatus2 == 0) {
                             echo "label-danger ";
                         }
                       ?>
                       pull-right">
                       <?php
                         //returns 0 = low; 1 = high
                         if ($pinStatus2 == 1) {
                             echo "On";
                         }
                         elseif ($pinStatus2 == 0) {
                             echo "Off";
                         }
                       ?>
                     </span>

                       <?php

                             //print($pinStatusR);
                             if ($pinStatusR == 1) {
                                 echo "Closed";
                             }
                             elseif ($pinStatusR == 0) {
                                 echo "Open";
                             }
                        ?>
                     </a>
          				</li>
          			</ul>
    					</h3>
    				</div>
    				<div class="panel-body">
              <button type="button" id="RelayOn" class="btn btn-primary form-control">Relay ON</button></br></br>
              <button type="button" id="RelayOff" class="btn btn-info form-control">Relay OFF</button></br>
    				</div>
    			</div>

    		</div>
    		<div class="col-md-3">
    		</div>
    	</div>
    </div>
  </body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#RelayOn').click(function(){
      $('#RelayOn').removeClass("btn btn-primary");
      $('#RelayOn').addClass("btn btn-success");
      $('#RelayOff').removeClass("btn btn-warning");
      $('#RelayOff').addClass("btn btn-info");
      var a = new XMLHttpRequest();
      a.open("GET","relayon.php");
      a.send();
    });
    $('#RelayOff').click(function(){
      $('#RelayOn').removeClass("btn btn-success");
      $('#RelayOn').addClass("btn btn-primary");
      $('#RelayOff').removeClass("btn btn-info");
      $('#RelayOff').addClass("btn btn-warning");
      var a = new XMLHttpRequest();
      a.open("GET","relayoff.php");
      a.send();
    });
  });
</script>

</html>
