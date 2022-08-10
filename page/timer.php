 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMPS | TIMER</title>
        <link rel="stylesheet" href="../public/css/timer.css">
        <link rel="shortcut icon" href="./images/temps.png" type="image/x-icon">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->

      <script src="../public/js/jquery-3.6.0.min.js"></script>
      <script src="../public/js/notification.js"></script>
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
        <style>#seconds, #miliseconde,#minute, .dots{
    font-size: 2em;
    font-weight: bold;
}</style>
</head>
<body onload="to_start();">


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Timer</li>
                </ol>
            </div><!--/.row-->
                 <div class="panel panel-default ">
                <div class="panel-heading">Chronomètre</div>
                <div class="panel-body">
<input type="hidden" id="time" data-heure="<?= $_GET['hd'] ?>" data-id="<?= $_GET['id_prj'] ?>">
     <div class="container">
   
        <div class="timerDisplay" id="last_time">
                
            </div>
                <div class="buttons">   
                    <!--<form action="" method="post"> -->
                    <button id="pauseTimer" name="stop" class="btn btn-warning btn-lg">Stop</button>
                  <!-- </form> -->
                </div>
            </div>  
            <h1 id="time"></h1>
    </div>
    </div>
    </div>
  <script>
    $(document).ready(function () {
        $("#pauseTimer").click(function () {
         localStorage.removeItem('last_time');
           
            $.ajax({
                url: 'url.php?p=timer_action',
                type: 'POST',
                data: { heure:$('#time').data('heure'),id:$('#time').data('id')  },
                success: function (result) {
                    console.log("Sending..."); 
                     alert('Chronomètre stop');
                    document.location.href="Route.php?p=home&lang=fr";
                    localStorage.removeItem('last_time');
                }  
            });
        });
    });
</script>
<script src="../public/js/chrono.js"></script>
<script>
window.onunload = () => {
   var timer = document.getElementById("last_time");    
   var last_time = timer.innerHTML;
   localStorage.setItem('last_time',last_time);
};
</script>
</body>
</html>