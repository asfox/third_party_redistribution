<?php 
session_start();
$subject_id = $_SESSION['subject_id'];
$game_id= $_SESSION['game_id'];
$player_id= $_SESSION['player_id'];
$p1_pass = $_SESSION['p1_pass'];
$p3_pass = $_SESSION['p3_pass'];

$num_groups = $_SESSION['num_groups'];
$p1_startAmt = $_SESSION['p1_startAmt'];
$p3_startAmt = $_SESSION['p3_startAmt'];
$p1_exchangeRate = $_SESSION['p1_exchangeRate'];
$p3_exchangeRate = $_SESSION['p3_exchangeRate'];
?>
<html>
<head><title>wait test</title>
<script type = "text/javascript" src="prototype.js"> </script>

<script type = "text/javascript">
<!--
function validate_transfer( myForm, myInput, myMaxVal ) {
    <?php 
        if( $player_id == 1 ) {
            echo('myMaxVal = ' . $p1_startAmt . ' ; ' );
        } else { echo('myMaxVal = ' . $p3_startAmt . ' ; ' ); 
        }
    ?>
	if( checkMyNumericResponse(myInput, myMaxVal) == true ) {
		return true;
	} else {
		return false;
	}
}

function updateOtherFields( box1, box2 ) {
    <?php 
        if( $player_id == 1 ) {
            echo('myMaxVal = ' . $p1_startAmt . ' ; ' );
        } else { echo('myMaxVal = ' . $p3_startAmt . ' ; ' ); 
        }
    ?>
	
	if( checkMyNumericResponse( box1, myMaxVal ) ) {
		box2.value = myMaxVal - box1.value;
		return true;
	} else {
		return false;
	}
}

function updateOtherFields_p3( box1, box2, box3 ) {
    <?php 
        if( $player_id == 1 ) {
            echo('myMaxVal = ' . $p1_startAmt . ' ; ' );
        } else { echo('myMaxVal = ' . $p3_startAmt . ' ; ' ); 
        }
    ?>

	if( checkMyNumericResponse( box1, myMaxVal ) ) {
		box2.value = box1.value;
		box3.value = myMaxVal - box1.value;
		return true;
	} else {
		return false;
	}
}

function checkMyNumericResponse(inputBox, myMaxVal, myMinVal)
{
	// Set min and max values.
	if(!myMaxVal) myMaxVal = 10;
	if(!myMinVal) myMinVal = 0;

    <?php if( $player_id == 3) { echo "myMaxVal = (" . $p1_startAmt . " - " . "p1_pass)/" . $p3_exchangeRate . " + 0;"; } ?>
	
	// Get the input text.
	inputString = inputBox.value;
	
	// Check the input string...
	if( !isNaN(parseInt(inputString)) ) {
		if( parseInt( inputString ) >= myMinVal && parseInt( inputString ) <= myMaxVal )  {
			msgStr = 'This number works...';
			return true;
		} else {
			msgStr = 'Please input a number between ' + myMinVal + ' and ' + myMaxVal + '.';
			alert(msgStr);
			inputBox.value = msgStr;
			return false;
		}
	} else {    
		msgStr = 'Invalid Input';
		alert(msgStr);
		inputBox.value = msgStr;
		return false;
	}
}

function checkForP1() {
    <?php echo( "var game_id = " . $game_id . "\n" ); ?>
    var url="checkForP1.php?game_id="+game_id;
  
    var req = new Ajax.Request(url, 
      {onComplete:function(request){eval(request.responseText)},
      evalScripts:true, asynchronous:true});
}
function checkForP3() {
    <?php echo( "var game_id = " . $game_id . "\n" ); ?>
    var url="checkForP3.php?game_id="+game_id;
  
    var req = new Ajax.Request(url, 
      {onComplete:function(request){eval(request.responseText)},
      evalScripts:true, asynchronous:true});
}

function finishGame( transfer_amount ) {
    p3_pass = transfer_amount;

    document.getElementById('decisionFormP1').style.visibility='hidden';
    document.getElementById('decisionFormP3').style.visibility='hidden';
    document.getElementById('instructionText').style.visibility='hidden';

    <?php echo('p1_gets = ' . $p1_startAmt . '-parseInt(p1_pass)-(parseInt(p3_pass)*' . $p3_exchangeRate . ');' );  ?>
    <?php echo('p2_gets = 0+(parseInt(p1_pass)*' . $p1_exchangeRate . ')+(parseInt(p3_pass)*' . $p3_exchangeRate .');' ); ?>
    <?php echo('p3_gets = ' . $p3_startAmt  . '-parseInt(p3_pass);' ); ?>
    msgStr = "<center><?php if( $player_id==1){ echo('You get:');} else {echo('Participant 1 gets:');}?> " + p1_gets + "<br> <?php if( $player_id==2){ echo('You get:');} else {echo('Participant 2 gets:');}?> " + p2_gets + "<br><?php if( $player_id==3){ echo('You get:');} else {echo('Participant 3 gets:');}?> " + p3_gets + "<br><br><a href='endGame.php'>Click Continue</a></center>\n";
    document.getElementById('finalText').innerHTML=msgStr;
    document.getElementById('finalText').style.visibility='visible';
}

function updateInstruction( transfer_amount ) {
    p1_pass = transfer_amount;
    <?php echo( "var player_id = " . $player_id . ";\n" ); ?>
    if( player_id == 2 ) {
        msgStr = "<p>Participant 1 made his/her decision and <strong>transferred " + transfer_amount + " points</strong> to you.<br>Please wait for Participant 3.</p>";
    } else if( player_id == 3 ) {
        msgStr = "<p>Participant 1 made his/her decision and <strong>transferred " + transfer_amount + " points</strong> to Participant 2.</p>";
        <?php if( $player_id == 3) { echo "myMaxVal = (" . $p1_startAmt . " - " . "p1_pass)/" . $p3_exchangeRate . " + 0;"; } ?>
        document.getElementById('decisionFormP3').innerHTML= document.getElementById('decisionFormP3').innerHTML.replace(/XXX/g, myMaxVal);
        document.getElementById('decisionFormP3').style.visibility='visible';
    } else if( player_id == 1 ) {
        msgStr = "<p>You made your decision and <strong>transferred " + transfer_amount + " points</strong> Participant 2.<br>Please wait for Participant 3.</p>";
    }
    document.getElementById('instructionText').innerHTML=msgStr;
    document.getElementById('instructionText').style.visibility='visible';
    if( player_id == 1 ) checkForP3();
    if( player_id == 2 ) checkForP3();
}

function startGame() {
    <?php echo( "var player_id = " . $player_id . ";\n" ); ?>
    <?php echo("var p1_check = "); 
        if( !is_null($p1_pass)) { echo( $p1_pass . ";\n" ); 
        } else { echo("-1;\n");} ?>

    <?php echo("var p3_check = "); 
        if( !is_null($p3_pass)) { echo( $p3_pass . ";\n" ); 
        } else { echo("-1;\n");} ?>


    <?php echo("p1_exchangeRate = " . $p1_exchangeRate. ";\n"); ?>
    <?php echo("p3_exchangeRate = " . $p3_exchangeRate. ";\n"); ?>

    if( player_id==1 ) {
        if( p1_check != -1 ) {
            p1_pass = parseInt(p1_check)+0;
            updateInstruction( p1_pass );
        } else {
            document.getElementById('decisionFormP1').style.visibility='visible';
        }
    } else if( player_id == 3) {
        if( p3_check != -1 ) {
            p1_pass = parseInt(p1_check)+0;
            finishGame( parseInt(p3_check)+0 )
        } else {
            document.getElementById('instructionText').style.visibility='visible';
            window.setTimeout('checkForP1()', 1000);
        }
    } else {
        document.getElementById('instructionText').style.visibility='visible';
        window.setTimeout('checkForP1()', 1000);
    }
}

//-->
</script>
<link href="decisionGame.css" rel="stylesheet" type="text/css">
</head>

<body onload="startGame()">

<center>
<table class="main">
<tr class="highlight"><td align="left"><strong>Decision Making Task</strong></td></tr>
<tr><td valign="top" align="left" height="400">


<p></p>
<div class="instructionText" id="instructionText" style="visibility:hidden;"> 
<p>Please wait while Participant 1 makes their decision... </p>
</div>

<div id="finalText" class="finalText" style="visibility:hidden;" style="visibility:hidden;"> 
<p>Final Result... </p>
</div>

<div id="decisionFormP3" class="instructionText" style="visibility:hidden; top:100px">
<p>How do you want to divide up your points?
<br><br>
<?php echo('How many of your ' . $p3_startAmt . ' points do you want to transfer from Participant 1 to Participant 2 (you may only spend up to XXX)?') ?>

<br><br>
<FORM name="transferFormP1" onSubmit="validate_transfer(this, transfer_amount);" action='setTransfer.php' METHOD=POST  >
<?php 
echo( '<input type="hidden" name="subject_id" id="subject_id" value="' .  $subject_id . '">' );
echo( '<input type="hidden" name="game_id" id="game_id" value="' .  $game_id . '">' );
echo( '<input type="hidden" name="game_id" id="player_id" value="' .  $player_id. '">' );
?>
<input type="hidden" name="RedirectTo" value="playGame"> 
<center>
<table class="inset" >
<tr><td align="right">I transfer </td>
<td><input type="text" name="transfer_amount" size="30" value="Insert Amount..." onFocus="if(isNaN(parseInt(this.value)))this.value=''; this.style.background='#ffffcd';" onBlur="this.style.background='#ffffff';" onChange="updateOtherFields_p3( transfer_amount, P2_gets, P3_keeps);" ></td>


<td align="left"> points from Participant 1.</td>

</tr>
<tr>
<td align="right">I transfer </td>
<td><input class="unchangeable" disabled type="text" name="P2_gets" size="30" value="..." onFocus="if(isNaN(parseInt(this.value)))this.value='';" ></td>
<td align="left"> points to Participant 2.</td>
</tr>
<tr>
<td align="right">And keep </td>
<td><input class="unchangeable" disabled type="text" name="P3_keeps" size="30" value="..." onFocus="if(isNaN(parseInt(this.value)))this.value='';" ></td>
<td align="left"> points.</td>
</tr>
<tr>

</tr>
<tr>
<td colspan="3" align="right"><input type="button" value="Click here to see how much you transfer/keep" onclick=""><br><input type="submit" value="Transfer" name="mySubmit"></td>

</tr>
</table>
</center>
</form>

</p>
</div>


<div id="decisionFormP1" class="instructionText" style="visibility:hidden;">
<p>How do you want to divide up your points?
<br><br>
<?php echo('How many points (from 0 to ' . $p1_startAmt . ') do you want to transfer to Participant 2, and how many do you want to keep') ?>
<br><br>
<FORM name="transferFormP1" onSubmit="validate_transfer(this, transfer_amount);" action='setTransfer.php' METHOD=POST  >
<?php 
echo( '<input type="hidden" name="subject_id" id="subject_id" value="' .  $subject_id . '">' );
echo( '<input type="hidden" name="game_id" id="game_id" value="' .  $game_id . '">' );
echo( '<input type="hidden" name="game_id" id="player_id" value="' .  $player_id. '">' );
?>
<input type="hidden" name="RedirectTo" value="playGame"> 
<center>
<table class="inset">
<tr><td align="right">I transfer </td>
<td><input type="text" name="transfer_amount" size="30" value="Insert Amount..." onFocus="if(isNaN(parseInt(this.value)))this.value=''; this.style.background='#ffffcd';" onBlur="this.style.background='#ffffff';" onChange="updateOtherFields( transfer_amount, keepBox );" ></td>
<td align="left"> points.</td>

</tr>
<tr>
<td align="right">And keep </td>
<td><input class="unchangeable" disabled type="text" name="keepBox" size="30" value="..." onFocus="if(isNaN(parseInt(this.value)))this.value='';" ></td>
<td align="left"> points.</td>
</tr>
<tr>

</tr>
<tr>
<td colspan="3" align="right"><input type="button" value="Click here to see how much you transfer/keep" onclick=""><br><input type="submit" value="Transfer" name="mySubmit"></td>

</tr>
</table>
</center>
</form>

</p>
</div>


</td>
</tr>
<tr class="highlight">
<td align="right">
<?php 
  echo "<div class='footer'>", $subject_id, "_", $game_id, "_", $player_id, "</div>";
?>
</td></tr>

</table>
</center>


</body>

</html>
