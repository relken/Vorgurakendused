<?php
session_start();
require_once('head.html');
  
$dirname = "pildid/";
$images = glob($dirname."*.jpg");  

$page = "";
if (!empty($_GET['page'])) {
  $page = $_GET['page'];
}

switch($page){
	case "galerii":
		include("galerii.html");
	break;
	case "vote":
		include("vote.html");
	break;
	case "tulemus":
		include("tulemus.html");
	break;
	default:
		include("pealeht.html");
	break;
}
require_once('foot.html');
?>