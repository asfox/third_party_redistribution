<?php
require_once("DB.php");

session_start();
$game_id = $_SESSION['game_id'];
$player_id = $_SESSION['player_id'];

$connect_string = "mysql://XXX";
$db = DB::connect($connect_string);
$db->setFetchMode(DB_FETCHMODE_ASSOC);

$transfer_amount = $_REQUEST['transfer_amount']+0;
$RedirectTo = $_REQUEST['RedirectTo'];

if( $player_id == 1 ) {
    $query = "UPDATE datas SET p1_pass = ? WHERE subject_id = ?";
    $_SESSION['p1_pass'] = $transfer_amount;
} elseif( $player_id == 3 ) {
    $query = "UPDATE datas SET p3_pass = ? WHERE subject_id = ?";
    $_SESSION['p3_pass'] = $transfer_amount;
}

$result = $db->query($query, array($transfer_amount, $game_id));

$newURL = $RedirectTo . ".php";
header("location: $newURL");

// echo "<pre>";
// echo "$game_id\n";
//echo "$player_id\n";
// echo "$transfer_amount\n\n\n";
// var_dump($result);
// $query = "SELECT * FROM datas";
// $result = $db->getAll($query);
// var_dump($result);
?>
