<?php
App\Table\Avantage::delete_avantage($_GET['id']);
header('Location: Route.php?p=u_avantage');
