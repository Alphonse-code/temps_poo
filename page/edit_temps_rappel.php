<?php
 if (empty($_SESSION['user'])) {
    header('location:Route.php?p=login&lang=fr');
}
$temps = App\Table\Notification::get_notificationsById($_GET['id']);

if (isset($_POST['save'])){  
    App\Table\Notification::editNotification($_GET['id'], $_POST['title'], $_POST['message'], $_POST['repeat']);
    header('location: Route.php?p=temps_rappel');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>TEMPS</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="accueil.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Temps de rappel</li>
                </ol>
            </div><!--/.row-->
            <div class="row">
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text text-center"></h3>
                </div>
            </div><!--/.row-->
            <div class="panel panel-default ">
                <div class="panel-heading">Mis à jour</div>
                <div class="panel-body">
                    
                    <form  method="POST" id="form"  style="width: 90vh;margin-left: 20%;">
                        <div class="form-group">
                            <label>Titre </label>
                            <input type="text" value="<?=$temps->getTitle()?>" class="form-control"  name="title" >
                        </div>
                        <div class="form-group">
                            <label>Message </label>
                            <input class="form-control" value="<?=$temps->getMessage()?>"  name="message">
                        </div>
                        <div class="form-group">
                            <label>Temps rappel<sub>(en heur)</sub> </label>
                            <input type="number" value="<?=$temps->getRepeat()?>" class="form-control" name="repeat">
                        </div>
                         	<input type="submit" class="btn btn-primary" name="save" value="submit">
                    </form>
                </div>
            </div>
        </div>
        </script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/bootstrap-table.js"></script>
    </body>
</html>