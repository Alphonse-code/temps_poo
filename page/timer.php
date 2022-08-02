 
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
<body onload="timer();">

<?php if(isset($_POST['stop']))
{
    date_default_timezone_set('Europe/Paris');
    $heure_fin = date('H:i:s');
    $date = date('Y-m-d');
    $id_user = $_SESSION['user']['id'];
    $heure_debut = $_GET['hd'];
    $id_prj = $_GET['id_prj'];
    // maitre à jour prestaion 
    App\Table\Prestation::update_prestation($date, $heure_debut, $heure_fin,$id_user);
   $salair_user = App\Table\User::getSalaireById($id_user); 
   $karama = null;
   $cout = null;
   foreach($salair_user as $sl){
    $karama =iconv('UTF-8', 'ISO-8859-1//IGNORE', $sl->salaire);
   }
  
   $cout_min = App\Table\Prestation::calcule_cout_minute($date, $heure_debut, $heure_fin);
  foreach($cout_min as $cm){
    $cout = $cm->cout_minute;
   }
   // somme avantage par user 
   $somme_avt = App\Table\Avantage::somme_avantage($id_user);
   $total = null;
   foreach($somme_avt as $cm){
    $total = $cm->total;
   }
   
    $co_par_min = ($karama * 12 + $total) / 80640;

    // total nombre de minute par user dans une date donné
    $total_minute = App\Table\Prestation::total_minute($id_user, $date);
    $total_min = null;
    foreach($total_minute as $tm){
        $total_min = $tm->tot_min;
    }
    $coutmin = $co_par_min * $total_min;
    App\Table\Cout::insert_cout($id_user, $date, $coutmin);
    header('Location:Route.php?p=home');
}
    ?>
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
                00 : 00 : 00 
            </div>
                <div class="buttons">   
                    <form action="" method="post">
                    <button id="pauseTimer" name="stop" class="btn btn-warning btn-lg">Stop</button>
                   </form>
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
                url: 'timer_action.php',
                type: 'POST',
                data: { heure:$('#time').data('heure'),id:$('#time').data('id')  },
                success: function (result) {
                    console.log("Sending...");
                   // alert('Chronomètre stop');
                    document.location.href="Route.php?p=home";
                    localStorage.removeItem('last_time');
                }  
            });
        });
    });
</script>
<script src="../public/js/timer.js"></script>
<script>
window.onunload = () => {
   var timer = document.getElementById("last_time");    
   var last_time = timer.innerHTML;
   localStorage.setItem('last_time',last_time);
};
</script>
</body>
</html>