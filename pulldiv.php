

<a id="detailed">LINK</a>
<p>
<div id="main">Hello - This is my main Div that will be reloaded using Jquery.</div>
</p>

<div id="garagePull">

</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/src/loadingoverlay.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/extras/loadingoverlay_progress/loadingoverlay_progress.min.js"></script>

<script type="text/javascript" language="javascript">
$(document).ready(function() { /// Wait till page is loaded
    random_no();
    setInterval(random_no,60000)
    function random_no(){
        //$('#detailed').click(function(){
            $("#main").LoadingOverlay("show");
            $('#main').load('pullTemp.php #main', function() {
                /// can add another function here
            });
            setTimeout(function(){
                $("#main").LoadingOverlay("hide");
            }, 3000);

            $("#garagePull").LoadingOverlay("show");
            $('#garagePull').load('pullSensor.php #garageImg', function() {
                /// can add another function here
            });
            setTimeout(function(){
                $("#garagePull").LoadingOverlay("hide");
            }, 3000);

        //});
    }
}); //// End of Wait till page is loaded
</script>