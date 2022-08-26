<?php
$lg_url = $_SESSION['lang'];

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
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="shortcut icon" href="images/temps.png" type="image/x-icon">
    <link href="css/styles.css" rel="stylesheet">
    <script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
</head>
<body>
    <input type="hidden" id="val_lang" value="<?php echo $lg_url; ?>" />
     <?php if (!empty($users)): ?>
        <nav class="navbar navbar-inverse navbar-fixed-top fondo-color" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                   
                    <a class="navbar-brand text text-center" href="#"><span><img src="./images/log.png" alt="ANDINE GROUPE" style="width: 100%;height: 30px;"> </span> </a>
                    <div class="user-menu">
                        <div class="pull-right"> 
                            <select class="fondo-color" name="lang" id="lang" style="border: 0px solid #ccc;">
                                <option value="fr">FR&emsp;fr</option>
                                <option value="en">🇺🇸&emsp;en</option>
                                <option value="es">🇪🇸&emsp;es</option>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text text-info"><?php echo '' .
                                $_SESSION['user']['nom'] .
                                ' ' .
                                $_SESSION['user']['prenom'] .
                                ''; ?>&nbsp;&nbsp;&nbsp;&nbsp; <a href="Route.php?p=logout" name="logout" class="glyphicon glyphicon-log-out text-info"><?= $lang['nav_logout'] ?></a></span>
                        </div>
                         </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar ">
                <ul class="nav menu">
                    <li><img src="images/temps.png" width="250px" height="100px" alt="TEMPS"/> </li>
                    <?php if ($_SESSION['user']['level'] == 2){ ?>
                    <li><a href="Route.php?p=home&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-home"></span> <?= $lang['s_home_pg'] ?></a></li>
                    <?php } ?>
                    
                    <?php if (
                    $_SESSION['user']['level'] == 9 ||
                    $_SESSION['user']['level'] == 8
                ) { ?>
                    <li> <a href="Route.php?p=dashboard&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-dashboard"></span><?= $lang['s_dashboard'] ?></a></li>
                    <li><a href="Route.php?p=u_avantage&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-pencil"></span><?= $lang['s_avtg_pg'] ?></a></li>
                    <li><a href="Route.php?p=user_avtg&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-check"></span><?= $lang['s_avtg_usr_pg'] ?></a></li>
                    <li><a href="Route.php?p=cout_min&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-bookmark"></span><?= $lang['s_cout_pg'] ?></a></li>
                    <li><a href="Route.php?p=list_projet&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-check"></span><?= $lang['s_prj_pg'] ?></a></li>
                    <li><a href="Route.php?p=user_projet&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-tasks"></span><?= $lang['s_tsk_pg'] ?></a></li>
                    <li><a href="Route.php?p=list_users&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-user"></span><?= $lang['s_usr_pg'] ?></a></li>
                    <li><a href="Route.php?p=reporting&lang=<?= $lg_url ?>"><span class="glyphicon glyphicon-indent-right"></span><?= $lang['s_stats_pg'] ?></a></li>
                    <?php } ?>
    </div> <!--/.sidebar-->  
        <?php endif; ?>
        <?= $content ?>  
  <script>
         function replaceURLParameter(key, value) {
    // value = value.split(' ').join('-'); //replaces spaces with dashes
    var parameter = key + "=" + value;
    var url = window.location.href;
    var urlparts = url.split('?');
    var finalUrl = false;

    if (urlparts.length >= 2) {
        /*url has parameters*/
        var pars = urlparts[1].split(/[&;]/g);
        var exists = false;
        pars.forEach(function (element, index) {
            var k = element.split('=')[0];
            var v = element.split('=')[1];
            if (k == key) {
                exists = true;
                if (!value)
                    pars.splice(index, 1);
                else
                    pars[index] = parameter;
            }
        });

        if (exists) {
            finalUrl = urlparts[0] + "?";
            pars.forEach(function (elem, index) {
                finalUrl += elem;
                if (index != pars.length)
                    finalUrl += "&";
            });
        }

        if (!exists) {
            /* The parameter to add doesnt exists but we have others. */
            finalUrl = url + '&' + parameter;
            finalUrl = setPage(1, finalUrl);
        }
    }

    if (urlparts.length < 2) {
        /*url without parameters*/
        finalUrl = url + "?" + parameter;
    }
    console.log(finalUrl);
    window.location.href=finalUrl
   // return finalUrl;
}
    $(document).ready(function() {
        var val_lang = $('#val_lang').val();
        $('#lang').val(val_lang);
    $("#lang").change(function(){
        var v =$('#lang').val();

        console.log(String(v));
        replaceURLParameter('lang',v)
        $.ajax({
            type: 'POST',
            data:  { "select" : $('#lang').val()}
            
        })
    })
});

  </script>
  </body>
</html>
