<?php
require_once("DB.php");

session_start();
$subject_id = $_SESSION['subject_id'];
$game_id = $_SESSION['game_id'];
$player_id = $_SESSION['player_id'];

$connect_string = "mysql://XXX";
$db = DB::connect($connect_string);
$db->setFetchMode(DB_FETCHMODE_ASSOC);

$query = "SELECT p3_pass FROM datas WHERE subject_id = ? AND p3_pass IS NOT NULL";

$transfer_amount = $db->getOne($query, array($game_id));
if (!is_null($transfer_amount)) {
  // We found one!
  $_SESSION['p3_pass'] = $transfer_amount;
  echo( "finishGame( $transfer_amount )");
}
else {
  echo ("window.setTimeout('checkForP3()', 2000);");
//  $result = $db->getAll($query);
//  echo(var_dump($result));
  
}

?>
