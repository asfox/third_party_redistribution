<?php 
session_start();
session_destroy();

session_start();
$subject_id = $_SESSION['subject_id'];
$game_id= $_SESSION['game_id'];
$player_id= $_SESSION['player_id'];
$p1_pass = $_SESSION['p1_pass'];
$p3_pass = $_SESSION['p3_pass'];

if (isset($_GET['num_groups'])) {
    $num_groups= $_GET['num_groups'] + 0;
} else {
    $num_groups=3;
}

$p1_startAmt = 100;
$p3_startAmt = 50;
$p1_exchangeRate = 1;
$p3_exchangeRate = 2;
$_SESSION['num_groups'] = $num_groups;
$_SESSION['p1_startAmt'] = $p1_startAmt;
$_SESSION['p3_startAmt'] = $p3_startAmt;
$_SESSION['p1_exchangeRate'] = $p1_exchangeRate;
$_SESSION['p3_exchangeRate'] = $p3_exchangeRate;
?>
<html>
<head><title>wait test</title>

<script type = "text/javascript">
<!--
function validate_transfer( myForm, subjNum, gameNum, game_id, player_id, numGroups)
	{
	if( assignSubj( subjNum, gameNum, game_id, player_id, numGroups ) == true ) {
		return true;
	} else {
		return false;
	}
}

function assignSubj( subjNum, gameNum, game_id, player_id , numGroups) {
	if(!numGroups) { 
        <?php echo('numGroups=' . $num_groups . ' + 0;' ); ?> 
    } else { numGroups = numGroups.value; }

    subjNum = subjNum.value;
    gameNum = gameNum.value;

    fullSubjNum = subjNum;
    sectionNum = Math.floor(subjNum/1000);
    subjNum = subjNum - (sectionNum*1000);

    playerType = 1 + (Math.floor((subjNum-1)/numGroups));

    if( gameNum == 1 ) {
        assignedGame = 1 + ((subjNum-1)%numGroups);
        playerNum = playerType;
    } else if( gameNum == 2 ) {
        if(playerType == 1) {
            playerNum = 3;
            assignedGame = 1 + ((subjNum+1)%numGroups);
        } else if( playerType == 2 ) {
            playerNum = 1;
            assignedGame = 1 + ((subjNum-1)%numGroups);
        } else {
            playerNum = 2;
            assignedGame = 1 + ((subjNum)%numGroups);
        }
    } else {
        if(playerType == 1) {
            playerNum = 2;
            assignedGame = 1 + ((subjNum+1)%numGroups);
        } else if( playerType == 2 ) {
            playerNum = 3;
            assignedGame = 1 + ((subjNum)%numGroups);
        } else {
            playerNum = 1;
            assignedGame = 1 + ((subjNum-1)%numGroups);
        }
    }
    
    game_id.value = (sectionNum*1000) + (gameNum-1)*numGroups + assignedGame ;
    player_id.value = playerNum;
    
    msgStr = 'subject_id=' + subjNum + '\ngame_id=' + game_id.value + ' and player_id=' + player_id.value + '.';

    return true;
}

//-->
</script>
</head>

<link href="decisionGame.css" rel="stylesheet" type="text/css">
<body>

<center>
<table class="main">
<tr class="highlight"><td align="left"><strong>Decision Making Task</strong></td></tr>
<tr><td valign="top" align="center">
<br>
<FORM name="newSubject" onSubmit="validate_transfer(this, subject_id, round_num, game_id, player_id);" action='assignSubject.php' METHOD=POST  >

<input type="hidden" name="game_id" value=""> 
<input type="hidden" name="player_id" value=""> 

<input type="hidden" name="RedirectTo" value="instructions"> 
<table class="inset" cellpadding="10" bgcolor="#eeeeff" >
<tr><td align="right">Subject ID: </td>
<td><input type="text" name="subject_id" size="30" value="" ></td>
</tr>
<tr>
<td align="right">Game Number:</td>
<td><input type="text" name="round_num" size="30" value="" ></td>
</tr>
<tr>
<td colspan="3" align="right"><input type="submit" value="Finish" name="mySubmit"></td>
</tr>
</table>

</form>

<table cellpadding="10" >
<tr>
<td align="left">
You will be playing 3 games. <br><br>
Please enter Game Numbers as follows:<br>
First game you play: 1<br>
Second game you play: 2<br>
Thrid game you play: 3<br>
</td></tr></table>
</p>
</td>
</tr>
<tr class="highlight">
<td align="right">
<?php 
 echo "<div class='footer'>", $subject_id, "_", $participant_num, "</div>";
 ?>
</td></tr>
</table>
</center>


</body>

</html>








