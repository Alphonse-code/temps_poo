<?php
 if (empty($_SESSION['user'])) {
    header('location:Route.php?p=login&lang=fr');
}
$projet = App\Table\Projet::findByProjectId($_GET['id']);

if (isset($_POST['save'])) {
    $id = $_GET['id'];
    $nom = $_POST['nom'];
    $local = $_POST['localisation'];
    $d_debut = $_POST['date_debut'];
    $df_theo = $_POST['date_fin_theorique'];
    $df_reel = $_POST['date_fin_reel'];
    $df_rapel = $_POST['rappel'];
    App\Table\Projet::updateProjet($id, $nom, $local, $d_debut, $df_theo, $df_reel,$df_rapel );
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
                <div class="panel-heading">Mis à jour</div>
                <div class="panel-body">
                    <form  method="POST" id="form"  style="width: 90vh;margin-left: 20%;">
                        
                        <div class="form-group">
                            <label>Nom projet</label>
                            <input type="text" value="<?= $projet->getNom() ?>" class="form-control"  name="nom" >
                        </div>
                      
                        <div class="form-group">
                            <label>Localisation </label>
                            <input class="form-control" value="<?= $projet->getLocalisation() ?>"  name="localisation" id="localisation">
                        </div>

                        <div class="form-group">
                            <label>Date début du projet</label>
                            <input type="date" value="<?= $projet->getDateDebut() ?>" class="form-control" id="date_debut" name="date_debut">
                        </div>
                        <div class="form-group">
                            <label>Date fin théorique</label>
                            <input type="date" value="<?= $projet->getDateFinTheorique() ?>" class="form-control" id="date_fin_theorique" name="date_fin_theorique">
                        </div>
                        <div class="form-group">
                            <label>Date fin réel</label>
                            <input type="date" value="<?= $projet->getDateFin() ?>" class="form-control" id="date_fin_reel" name="date_fin_reel">
                        </div> 
                        <div class="form-group">
                            <label>Temps rappel<sub>(minutes)</sub> </label>
                            <input type="number" value="<?= $projet->getRappel() ?>" class="form-control"  name="rappel">
                        </div> 
                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                    </form>
                </div>
            </div>
        </div>

        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/jquery-1.11.1.min.js"></script>
        <script src="../public/js/bootstrap-datepicker.js"></script>
        <script src="../public/js/bootstrap-table.js"></script>
    </body>
</html>