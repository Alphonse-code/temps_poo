
<!-- DataTables -->
        <link rel="stylesheet" href="../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <!-- Theme style -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.min.css" integrity="sha512-y4S4cBeErz9ykN3iwUC4kmP/Ca+zd8n8FDzlVbq5Nr73gn1VBXZhpriQ7avR+8fQLpyq4izWm0b8s6q4Vedb9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.min.js" integrity="sha512-7x7HoEikRZhV0FAORWP+hrUzl75JW/uLHBbg2kHnPdFmScpIeHY0ieUVSacjusrKrlA/RsA2tDOBvisFmKc3xw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<body>
       <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="index.jsp"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Utilisateur</li>
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
                    <h3 class="page-header text text-center">Liste des projet et des personne assigner</h3>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel panel-heading">
                            <a class="btn btn-primary" href="Route.php?p=new_task">Ajouté</a>
                        </div>
                        <div class="panel-body">
                            <table id="tbticket" class="table table-responsive">
                                <thead>  
                                    <tr>   
                                        <th>Utilisateur</th>
                                        <th>Projet</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                <?php $list_uprj = App\Table\Tache::listUsersProject(); 
                                    
                                    if (!empty($list_uprj)): ?>
                                        <?php foreach($list_uprj as $u_prj): ?> 
                                    <tr>
                                        <td><?= $u_prj->users; ?></td>
                                        <td><?= $u_prj->nP; ?></td>
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
                   
                }).buttons().container().appendTo('#tbticket_wrapper .col-md-6:eq(0)');
            });
        </script>
        
    </body>
</html>