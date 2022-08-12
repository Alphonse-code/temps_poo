
<?php
 if (empty($_SESSION['user'])) {
    header('location:Route.php?p=login&lang=fr');
}
 
if (isset($_POST['save'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $level = $_POST['level'];
    $tel = $_POST['tel'];
    $salaire = $_POST['salaire'];
    $psw = password_hash($_POST['psw'], PASSWORD_BCRYPT);
    App\Table\Users::addUsers($nom,$prenom, $mail, $level, $tel, $salaire, $psw);
    header('location: Route.php?p=list_users');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>TEMPS | USERS</title>
       <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
    </head>
    <body>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="accueil.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Users</li>
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
                <div class="panel-heading">Création compte d'utilisateur</div>
                <div class="panel-body">
                    <form  method="POST" id="form"  style="width: 90vh;margin-left: 20%;">     
                        <div class="form-group">
                            <label>Nom </label>
                            <input type="text" value="" class="form-control"  name="nom" >
                        </div>
                        <div class="form-group">
                            <label>Prénom </label>
                            <input type="text" value="" class="form-control" name="prenom">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="mail" value="" class="form-control"  name="mail">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="level" value="" >
                            <option value="2">Utilisateur</option>
                            <option value="8">Admin</option>
                            <option value="9">Super Admin</option>    
                        </select>
                        </div>
                        <div class="form-group">
                            <label>Télephone</label>
                            <input type="text" value="" class="form-control" name="tel">
                        </div>
                        <div class="form-group">
                            <label>Salaire</label>
                            <input type="text" value="" class="form-control" name="salaire">
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" value="" class="form-control" name="psw">
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