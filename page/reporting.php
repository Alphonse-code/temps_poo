?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>TEMPS | REPORTING</title>
        <link rel="shortcut icon" href="./images/temps.png" type="image/x-icon">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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

    </head>
    <body>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="index.jsp"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li class="active">Statistique</li>
                </ol>
            </div><!--/.row-->
             <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header text text-center"> STATISTIQUE </h3>
                </div>
            </div><!--/.row-->

             
            <div class="row">

            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">

                </div>
            </div><!--/.row-->

        
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel panel-heading">
                           <h3 class="text-center"> </h3> 
                        </div>
                        <div class="panel-body">

            <div class="row">
                 <div class="col-lg-6 col-md-3">  
                     <h4 style="text-align: center; color: #000; font-size:bold; font-weight:bold;">Nombre de minutes presté par projet </h4>    
                    <br><br><br>

                     <div id="piechart_3d" ></div>
                 </div>
                 <div class="col-lg-6 col-md-3">
                             <h4 style="text-align: center; color: #000; font-size:bold; font-weight:bold;">Nombre de minutes prestées par utilisateur sur intervalle de date</h4>
                                <input type="date" class="datepicker datepicker-sm" id="d_debut">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="date" class="datepicker datepicker-sm" id="d_fin">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="submit" class="btn btn-primary btn-lg" id="recherche_date" name="recherche_date">Recherche</button>

                            <div id="piechart_div" ></div>
                         
                 </div>
                 
             </div><!--/.row--> 
     </div>
          </div>
                </div>
            </div><!--/.row-->	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel panel-heading">
                          <h3 class="text-center"> Liste des utilisateur par date et temps presté</h3> 
                        </div>
                        <div class="panel-body">
                           
                            <table id="tbticket" class="table table-responsive">
                                <thead>  
                                    <tr>
                                        <th>ID utilisateur</th>
                                        <th>Utilisateur</th>
                                        <th>Date</th>
                                        <th>Temp presté <sub>(minutes)</sub></th>
                                        <th>Nom projet</th>
                                        <th>Cout supplémentaire</th>                 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $list = App\Table\Prestation::list_user_temps(); 
                                    
                                    if (!empty($list)): ?>
                                        <?php foreach($list as $li): ?>  
                                     <tr>
                                        <td><?= $li->id_user ?> </td>
                                        <td><?= $li->users ?> </td>
                                        <td><?= $li->date ?> </td>     
                                        <td><?= $li->temp_preste ?> </td>
                                        <td><?= $li->nom_projet?> </td>
                                        <td><?= $li->depense_sup ?> </td>
                                        </tr>
                                         <?php endforeach; ?>
                                  <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->	
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel panel-heading">
                          <h3 class="text-center"> Nombre de minutes presté par user par projet</h3> 
                        </div>
                        <div class="panel-body">
                          
                                <table id="minute" class="table table-responsive">
                                <thead>  
                                    <tr>
                                        <th>Projet</th>
                                        <th>Utilisateur</th>                 
                                        <th>Total temp presté <sub>(minutes)</sub></th>      
                                    </tr>
                                </thead>
                                 <tbody>  
                                    <?php $nombre = App\Table\Prestation::temps_prest_projet(); 
                                    
                                    if (!empty($nombre)): ?>
                                        <?php foreach($nombre as $nb): ?> 
                                        <tr>
                                            <td><?= $nb->nom_prj ?></td>
                                            <td><?= $nb->users ?></td>
                                            <td><?= $nb->total_minute ?></td>   
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
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["excel", "pdf"]
                }).buttons().container().appendTo('#tbticket_wrapper .col-md-6:eq(0)');
            });

                $(function () {
                $("#minute").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["excel", "pdf"]
                }).buttons().container().appendTo('#minute_wrapper .col-md-6:eq(0)');
            });
            
        </script>
        
<script type="text/javascript">
	$(document).ready(function() {
		$.ajax({
			url : "url.php?p=data",
			dataType : "JSON",
			success : function(result) {
                
				google.charts.load('current', {
					'packages' : [ 'corechart' ]
				});
				google.charts.setOnLoadCallback(function() {
					drawChart(result);
				});
			}
		});
		function drawChart(result) {
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Nom');
			data.addColumn('number', 'Total minutes');
			var dataArray = [];
			$.each(result, function(i, obj) {
				dataArray.push([ obj.nom, parseInt(obj.total_minute) ]);
			});
			data.addRows(dataArray);
            var piechart_options_3d = {
				width : 600,
				height : 400,
                is3D: true,
			};
            var piechart_3d = new google.visualization.PieChart(document
					.getElementById('piechart_3d'));
			piechart_3d.draw(data, piechart_options_3d);      
		}
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$.ajax({
			url : "url.php?p=data3",
			dataType : "JSON",
			success : function(result) {
                
				google.charts.load('current', {
					'packages' : [ 'corechart' ]
				});
				google.charts.setOnLoadCallback(function() {
					drawChart(result);
				});
			}
		});
		function drawChart(result) {
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Utilisateur');
			data.addColumn('number', 'Total minutes');
			var dataArray = [];
			$.each(result, function(i, obj) {
				dataArray.push([ obj.users, parseInt(obj.total_minute) ]);
			});
			data.addRows(dataArray);
            var piechart_options_3d = {
				width : 600,
				height : 400,
                pieHole: 0.4,
                is3D: true,
			};
            var piechart_3d = new google.visualization.PieChart(document
					.getElementById('piechart_div'));
			piechart_3d.draw(data, piechart_options_3d);      
		}
	});
</script>

<!-- recherche deux date  -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#recherche_date").click(function(){   
           
           $.ajax({
             url: 'url.php?p=data2', 
             dataType : "JSON",
             type:"POST",
             data: {datedebut: $("#d_debut").val(), datefin: $("#d_fin").val()},
             success: function(data){
               // console.log(data);
               google.charts.load('current', {
					'packages' : [ 'corechart' ]
				});
				google.charts.setOnLoadCallback(function() {
					draw_chart(data);
				});
             }
         });  

       function draw_chart(result){
            var data = new google.visualization.DataTable();
			data.addColumn('string', 'Utilisateur');
			data.addColumn('number', 'Total minutes');
			var dataArray = [];
			 $.each(result, function(i, obj) {
				dataArray.push([ obj.users, parseInt(obj.total_minute) ]);
			 });
			data.addRows(dataArray); 
            var piechart_options = {
				width : 600,
				height : 400,
                is3D: true,
                pieHole: 0.4,
			};
            var piechart_div = new google.visualization.PieChart(document.getElementById('piechart_div'));
			piechart_div.draw(data, piechart_options);
         }
   });
});
</script>
    </body>
</html>