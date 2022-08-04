
<?php

date_default_timezone_set('Europe/Paris');
if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $id_user = $_POST['id_user'];
    $message = $_POST['message'];
    $repetition = $_POST['repetition'];
    $next_time = date('Y-m-d H:i:s');
    App\Table\Notification::saveNotification("$title", "$message", "$next_time.", "$repetition", "$id_user");
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
        <link href="css/datepicker3.css" rel="stylesheet">
    </head>
    <body>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="accueil.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Projet</li>
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
                <div class="panel-heading">Création temps de rappel</div>
                <div class="panel-body">
                    <form  method="POST" id="form"  style="width: 90vh;margin-left: 20%;">
                        
                        <div class="form-group">
                            <label>Titre</label>
                            <input type="text" value="" class="form-control"  name="title" >
                        </div>
                      
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" value=""  name="message"></textarea>
                        </div>
                     
                        <div class="form-group">
                            <label>Repetition en (Heure)</label>
                            <input type="number" class="form-control" name="repetition">
                        </div>
                        <div class="form-group">
                            <label>Utilisateur</label>  
                               <select class="form-control" name="id_user" value="" >
                              <?php  $users = App\Table\Users::list_utilisateur();
                               if (!empty($users)): ?>
                                <?php foreach($users as $usr): ?>
                                <option value="<?= $usr->id_user; ?>"><?= $usr->nom .' '. $usr->prenom; ?></option>
                               <?php endforeach; ?>
                               <?php endif; ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                    </form>
                </div>
            </div>
        </div>
         <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/bootstrap-table.js"></script>
    </body>
</html>