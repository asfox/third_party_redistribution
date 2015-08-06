<?php
require_once("DB.php");

session_id();
session_start();

$connect_string = "mysql://XXX";
$db = DB::connect($connect_string);
$db->setFetchMode(DB_FETCHMODE_ASSOC);

$subject_id = $_REQUEST['subject_id'];
$game_id= $_REQUEST['game_id'];
$player_id= $_REQUEST['player_id'];
$RedirectTo = $_REQUEST['RedirectTo'];

$query = "SELECT subject_id FROM datas WHERE subject_id = ?";
$result= $db->getOne($query, array($game_id));
if( is_null($result) ) {
    $query = "INSERT INTO datas (subject_id) VALUES (?)";
    $result = $db->query($query, array($game_id));
} 

if( $player_id == 1 ) {
    $query = "UPDATE datas SET p1_id = ? WHERE subject_id = ?";
} elseif( $player_id == 2 ) {
    $query = "UPDATE datas SET p2_id = ? WHERE subject_id = ?";
} elseif( $player_id == 3 ) {
    $query = "UPDATE datas SET p3_id = ? WHERE subject_id = ?";
}
$result = $db->query($query, array($subject_id, $game_id));


$_SESSION['subject_id'] = $subject_id;
$_SESSION['game_id'] = $game_id;
$_SESSION['player_id'] = $player_id;
////$_SESSION['participant_num'] = $participant_num;

$newURL = $RedirectTo . ".php";
header("location: $newURL");

// echo "$result\n";
// $query = "SELECT * FROM give_take";
// $result = $db->getAll($query);
// var_dump($result);

////$result = $db->getAll($query);
////var_dump($result);

?>
