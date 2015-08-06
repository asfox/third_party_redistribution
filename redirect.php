<?php

session_start();

require_once("DB.php");
$connect_string = "mysql://XXX";
$db = DB::connect($connect_string);
$db->setFetchMode(DB_FETCHMODE_ASSOC);

$RedirectTo = $_REQUEST['RedirectTo'];

$newURL = $RedirectTo . ".php";
header("location: $newURL");

?>
