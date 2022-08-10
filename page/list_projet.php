<?php 

if (empty($_SESSION['user'])) {
    header('location:Route.php?p=login');
} 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>TEMPS | PROJET</title>

         <link rel="shortcut icon" href="./images/temps.png" type="image/x-icon">
    
<!-- DataTables -->
        <link rel="stylesheet" href="../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
       
        </head>
    <body>
     
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="index.jsp"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Projet</li>
                </ol>
            </div><!--/.row-->
            <div class="row">

            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">

                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header text text-center">Liste des projet</h3>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel panel-heading">
                            <a class="btn btn-primary" href="Route.php?p=new_projet&lang=<?=$_SESSION['lang']?>">Créer projet</a>
                        </div>
                        <div class="panel-body">
                         
                            <table id="tbticket" class="table table-responsive">
                                <thead>  
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom projet</th>
                                        <th>Localisation</th>  
                                        <th>Date début</th>
                                        <th>Date fin</th>
                                        <th class="text text-center"> Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php $list_prj = App\Table\Projet::listProjects(); 
                                    
                                    if (!empty($list_prj)): ?>
                                        <?php foreach($list_prj as $prj): ?>   
                                    <tr>
                                        <td><?= $prj->id_prj; ?></td>
                                        <td><?= $prj->nom; ?></td>
                                        <td><?= $prj->localisation; ?></td>
                                        <td><?= $prj->date_debut; ?></td>
                                        <td><?= $prj->date_fin_reel; ?></td>
                                        <td class="text text-center">
                                            <a href="Route.php?p=edit_projet&lang=<?=$_SESSION['lang']?>&id=<?= $prj->id_prj; ?>" class='btn btn-success btn-sm glyphicon glyphicon-edit' title='Modifier'></a> &nbsp;&nbsp;&nbsp;&nbsp; 
                                            <a href="Route.php?p=delete_projet&id=<?= $prj->id_prj; ?>" class='btn btn-danger btn-sm glyphicon glyphicon-trash' title='Supprimer'></a>
                                        </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->	
        </div><!--/.main-->

        <script src="../public/js/jquery-1.11.1.min.js"></script>
        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/bootstrap-datepicker.js"></script>
        <script src="../public/js/bootstrap-table.js"></script>
        <script src="../public/plugins/jquery/jquery.min.js"></script>
        <script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>    
        <script src="../public/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="../public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="../public/plugins/jszip/jszip.min.js"></script>
        <script src="../public/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="../public/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="../public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="../public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        
        <script>
            $(function () {
                $("#tbticket").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["excel", "pdf"]
                }).buttons().container().appendTo('#tbticket_wrapper .col-md-6:eq(0)');
            });
        </script>
        
    </body>
    
</html>