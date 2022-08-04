<?php

if (isset($_SESSION['user']['nom'])) {
    $users = $_SESSION['user']['nom'];
}

setlocale(LC_ALL, 'fr_FR');
?>
<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMPS | DASHBOARD</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="shortcut icon" href="./images/temps.png" type="image/x-icon">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
     <?php if (!empty($users)): ?>
        <nav class="navbar navbar-inverse navbar-fixed-top fondo-color" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand text text-center" href="#"><span><img src="./images/log.png" alt="ANDINE GROUPE" style="width: 100%;height: 30px;"> </span> </a>
                    <div class="user-menu">
                        <div class="pull-right">  
                            <span class="text text-info"><?php echo '' .
                                $_SESSION['user']['nom'] .
                                ' ' .
                                $_SESSION['user']['prenom'] .
                                ''; ?>&nbsp;&nbsp;&nbsp;&nbsp; <a href="Route.php?p=logout" name="logout" class="glyphicon glyphicon-log-out text-info">Déconnecter</a></span>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar ">
                <ul class="nav menu">
                    <li><img src="images/temps.png" width="250px" height="100px" alt="TEMPS"/> </li>
                    <li><a href="Route.php?p=home"><span class="glyphicon glyphicon-home"></span> ACCUEIL</a></li>
                <?php if (
                    $_SESSION['user']['level'] == 9 ||
                    $_SESSION['user']['level'] == 8
                ) { ?>
                    <li><a href="Route.php?p=u_avantage"><span class="glyphicon glyphicon-pencil"></span>AVANTAGE</a></li>
                    <li><a href="Route.php?p=user_avtg"><span class="glyphicon glyphicon-check"></span>AVANTAGE UTILISATEUR</a></li>
                    <li><a href="Route.php?p=temps_rappel"><span class="glyphicon glyphicon-dashboard"></span>TEMP RAPPEL</a></li>
                    <li><a href="Route.php?p=cout_min"><span class="glyphicon glyphicon-bookmark"></span>COUT</a></li>
                    <li><a href="Route.php?p=list_projet"><span class="glyphicon glyphicon-check"></span>PROJET</a></li>
                    <li><a href="Route.php?p=user_projet"><span class="glyphicon glyphicon-tasks"></span>TÂCHE</a></li>
                    <li><a href="Route.php?p=list_users"><span class="glyphicon glyphicon-user"></span>UTILISATEUR</a></li>
                    <li><a href="Route.php?p=reporting"><span class="	glyphicon glyphicon-indent-right"></span>STATISTIQUES</a></li>
                    <?php } ?>
    </div> <!--/.sidebar-->  

        <?php endif; ?>
        <?= $content ?>
       
  </body>
</html>
