
<?php

if (isset($_POST['save'])) {
    $nom = $_POST['nom'];
    $localisation = $_POST['localisation'];
    $date_debut = $_POST['date_debut'];
    $date_fin_theorique = $_POST['date_fin_theorique'];
    $date_fin_reel = $_POST['date_fin_reel'];
   $result = App\Table\Projet::createProject($nom, $localisation,$date_debut,$date_fin_theorique,$date_fin_reel);
    header('location: Route.php?p=list_projet');   
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>TEMPS</title>
        <link href="../public/css/bootstrap.min.css" rel="stylesheet">  
        <link href="../public/css/styles.css" rel="stylesheet">
        <link href="../public/css/datepicker3.css" rel="stylesheet">   
    </head>
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

               

                <div class="panel-heading">Création de nouveau projet</div>
                <div class="panel-body">
                    <form  method="POST" id="form"  style="width: 90vh;margin-left: 20%;">
                        
                        <div class="form-group">
                            <label>Nom projet</label>
                            <input type="text" value="" class="form-control"  name="nom" >
                        </div>
                      
                        <div class="form-group">
                            <label>Localisation </label>
                            <input class="form-control" value=""  name="localisation" id="localisation">
                        </div>

                        <div class="form-group">
                            <label>Date début du projet</label>
                            <input type="date" value="" class="form-control" id="date_debut" name="date_debut">
                        </div>
                        <div class="form-group">
                            <label>Date fin théorique</label>
                            <input type="date" value="" class="form-control" id="date_fin_theorique" name="date_fin_theorique">
                        </div>
                        <div class="form-group">
                            <label>Date fin réel</label>
                            <input type="date" value="" class="form-control" id="date_fin_reel" name="date_fin_reel">
                        </div>
                         	<input type="submit" class="btn btn-primary" name="save" value="submit">
                        
                    </form>
                </div>
            </div>
        </div>

       
        </script>
        <script src="../public/js/jquery-1.11.1.min.js"></script>
        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/bootstrap-datepicker.js"></script>
        <script src="../public/js/bootstrap-table.js"></script>
      
    </body>
</html>