
<!-- DataTables -->
        <link rel="stylesheet" href="../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style --> 
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="Route.php?p=home&lang=fr"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active"><?= $lang['s_avtg_pg'] ?></li>
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
                    <h3 class="page-header text text-center"><?= $lang['list_avtg'] ?></h3>
                </div>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel panel-heading">
                            <a class="btn btn-primary" href="Route.php?p=new_avantage"><?= $lang['btn_new_avtg'] ?></a>                    
                        </div>
                        <div class="panel-body">                  
                            <table id="tbticket" class="table table-responsive">
                                <thead>  
                                    <tr>
                                        <th><?= $lang['id'] ?></th>
                                        <th><?= $lang['name_avtg'] ?></th>
                                        <th><?= $lang['montant_avtg'] ?></th>
                                        <th class="text text-center"> <?= $lang['tabl_action'] ?></th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    <?php $list_avt = App\Table\Avantage::list_avt();                            
                                    if (!empty($list_avt)): ?>
                                        <?php foreach($list_avt as $avt): ?>  
                                    <tr>     
                                    <td><?= $avt->id_avantage; ?></td>
                                    <td><?= $avt->nom_avantage; ?></td>
                                    <td><?= $avt->montant_avantage; ?></td>
                                    <td class="text text-center">
                                        <a href="Route.php?p=update_avantage&id=<?=$avt->id_avantage; ?>" class='btn btn-success btn-sm glyphicon glyphicon-edit' title='Modifier'></a> &nbsp;&nbsp;&nbsp;&nbsp; 
                                        <a href="Route.php?p=delete_avtg&id=<?=$avt->id_avantage; ?>" class='btn btn-danger btn-sm glyphicon glyphicon-trash' title='Supprimer'></a>
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
   <script src="plugins/jquery/jquery.min.js"></script>
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