
<?php
$lg = $_SESSION['lang'];
 
 if (empty($_SESSION['user'])) {
    header('location:Route.php?p=login&lang=fr');
}
 
if (isset($_POST['save'])) {
    $nom = $_POST['nom'];
    $montant = $_POST['montant'];
    App\Table\Avantage::insert_avtg($nom,$montant);
    header('location: Route.php?p=u_avantage');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>TEMPS | USERS</title>
       <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="Route.php?p=home"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Avantage</li>
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
                <div class="panel-heading">Nouvelle avantage</div>
                <div class="panel-body">
                    <form  method="POST" id="form"  style="width: 90vh;margin-left: 20%;">     
                        <div class="form-group">
                            <label>Nom </label>
                            <input type="text" value="" class="form-control"  name="nom" >
                        </div>
                        <div class="form-group">
                            <label>Montant de l'avantage </label>
                            <input type="text" value="" class="form-control" name="montant">
                        </div>
                         	<input type="submit" class="btn btn-primary" name="save" value="submit"> 
                    </form>
                </div>
            </div>
        </div>
       <script src="../public/js/jquery-1.11.1.min.js"></script>
        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/bootstrap-datepicker.js"></script>
        <script src="../public/js/bootstrap-table.js"></script>
    </body>
</html>