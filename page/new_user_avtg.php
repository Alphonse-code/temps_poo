
<?php
if (isset($_POST['save'])) {
    $id_user = $_POST['id_user'];
    $id_avantage = $_POST['id_avantage'];
    App\Table\Avantage::insert_user_avantage($id_user, $id_avantage);
    header('location: Route.php?p=user_avtg');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>TEMPS | USERS AVTG</title>
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
                <div class="panel-heading">Avantage de l'utilisateur </div>
                <div class="panel-body">
                    <form  method="POST" id="form"  style="width: 90vh;margin-left: 20%;">
                         <div class="form-group">
                            <label>Utilisateur</label>    
                            <select class="form-control" name="id_user" value="" >
                                  <?php  $users = App\Table\Users::listUsers();
                               if (!empty($users)): ?>
                                <?php foreach($users as $usr): ?>
                                <option value="<?= $usr->id_user; ?>"><?= $usr->nom .' '. $usr->prenom; ?></option>
                               <?php endforeach; ?>
                               <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Avantage</label>    
                            <select class="form-control" name="id_avantage" value="" >
                             <?php  $avantage = App\Table\Avantage::list_avt();
                               if (!empty($avantage)): ?>
                                <?php foreach($avantage as $avtg): ?>
                                <option value="<?= $avtg->id_avantage; ?>"><?= $avtg->nom_avantage; ?></option>
                               <?php endforeach; ?>
                               <?php endif; ?>
                            </select>
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