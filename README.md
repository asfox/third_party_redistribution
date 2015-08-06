# third_party_redistribution
A one-off implementation of an economic game to examine "altruistic redistribution" based on 3rd-party punishment tasks.

Redistribution Game
-------------------

This code runs the redistribution game that was used in our publication:
Weng HY, Fox AS, Shackman AJ, Stodola DE, Caldwell JK, Olson MC, Rogers GM, Davidson RJ (2013).  [Compassion training alters altruism and neural responses to suffering.](http://www.bi.wisc.edu/~fox/publications/Weng_PsychScience_2013.pdf) Psychological Science. 24(7):1171-1180 


**Task Description**
Here is the description from the article:

"Using anonymous online interactions, participants first observed a dictator (endowed with $10) transfer an unfair amount of money ($1) to a victim who had no money (Fig. 1a). After witnessing this violation of the fairness norm (Fehr & Fischbacher, 2003), participants could choose to spend any amount of their own endowment ($5) to compel the dictator to give twice that amount to the victim (Fig. 1b). Participants were paid the amount that was left in their endowment after making the decision"




**Task Code**
This task allows for three people to play the redistribution game over the internet in real-time, using a html, javascript, and php setup. The code works as outlined below and begins when participants are directed to index.php.

In practice, participants were sat in a computer lab and provided with their subject ID. Their subject ID, which they enter into the web-page, determines who they are interacting with and defines their role in each game. The number of thousands in a participants subject id determines their partners, i.e. 1001-1002-1003 play together, while 63001-63002-63003 play together. (Obviously, participants should not be allowed to see other participants id numbers.)

Adapted versions of this code were created to fix dictator offers, as well as to restrict the participants behavior to helping (only adding $ to victim) or punishing (only removing $ from dictator). <MAKE THESE AVAILABLE TOO?>

Ultimately, while you are welcome to use this code, it is a use-at-your-own-risk situation. 

If I were to do this again, I might use the otree.org framework. If you can figure out how to code with python/django, I’d recommend that. 

To use this code, you will need to adapt your code to connect to your own mysql server, as described in the requirements. 


**Requirements**
This task requires a web-server and a mysql database. Sadly, using this code will require you figuring out how to do this on your own. 

Your database must follow the schema in: "econ_game_schema.sql"

The code _will need to be adapted_ to connect to your database, the url for your database should be specified in the $connect\_string and replace mysql://XXX in all .php files where it occurs. 

To interact with the mysql database you will need to use DB.php (http://pear.php.net/package/DB/) and prototype.js (link???) which are both included in this git. 


Outline of web-page procedure.
_index.php_
- Welcomes participants.
- Starts a session, so that participants can be remembered across pages.


_startGame.php_
- Asks player to enter their subject id and which round they are participating in (i.e. first, second or third). 
- Determines the participants role in the game (dictator, victim, or participant; also known as participants 1-3) based on their subject id.
- Sends participants to assignSubject.php.

assignSubject.php
- The participant does not see this page. 
- Enters the player information into the database. 
- Immediately redirects participants to instructions.php.

instructions.php
- This provides players with the instructions for the game,
- Instructions are tailored to the role they will be playing, and presented across multiple screens. 
- Sends participants to playGame.php

playGame.php
- This is where the game is played. 
- Each participant sees only information for them. 
- The dictator transfers first.
- Once their information is entered into the database, that information is presented to the victim and participant. 
- The participant then has an opportunity to redistribute. 
- Once the participant’s choice is in the database, the final payout information is shown to all participants. 
- To accomplish this, behind the scenes this page loads a number of other scripts. 
- checkForP1.php and checkForP3.php
- These are called by playGame.php, the participant does not see these pages.
- These scripts update the page when the database is updated by other players.
    - _setTransfer.php_
        - These are called by playGame.php, the participant does not see these pages.
        - This script adds the dictator and participant’s choices into the database. 
    - _computePayment.php_
        - These are called by playGame.php, the participant does not see these pages.
        - This script is used to compute subject payments.
        - Once the game is over complete, playGame.php sends participants to endGame.php

_endGame.php_
- Participants are thanked.
- All session information is destroyed.
- Participants are redirected to the index.php page. 


