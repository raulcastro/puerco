<?php
// var_dump($_SERVER);

// 	error_reporting(E_ALL);
// 	ini_set("display_errors", 1);

$root = $_SERVER['DOCUMENT_ROOT'];
require_once 'backends/public.php';
require_once ($root.'/views/Layout_View.php');

$section = "about";

$data 		= $backend->loadBackend($section);
// 	var_dump($data);
$view 		= new Layout_View($data);

echo $view->printHTMLPage($section);