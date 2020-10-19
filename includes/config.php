<?php

// Tillåt följande:
header('Content-Type: application/json');
//header('Access-Control-Allow-Origin: http://www.raggmunkar.se/portfolio/admin/admin.php');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Inkludera 
include("classes/dbh.class.php");
include("classes/portfolio.class.php");
include("classes/control.class.php");
include("classes/view.class.php");

