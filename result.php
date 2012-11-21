<?php

session_start();

if(!isset($_SESSION['user_id']))
{
	die('You are not logged in. Please <a href="./">log in</a>.');
}

$title='Results - Online examination system';
require('./template/header.php');
require_once('./includes/db_connect.php');

$db = db_connect();
$qr = $db->prepare("SELECT q_correct_ans FROM questions WHERE q_id = ?");

echo '<h2> Congratulations! You have completed the test.</h2>';

$incorrect = array();

for ($i=1; $i<=5; $i++)
{
	$qr->execute(array($_POST["q$i"]));
	$result = $qr->fetch(PDO::FETCH_ASSOC);
	if( (int) $_POST["a$i"] != (int) $result['q_correct_ans']) // If given answer doesn't match with correct answer
	{
		$incorrect[$_POST["q$i"]] = array($_POST["a$i"], $result['q_correct_ans']); // Push incorrect answer and correct answer into array
	}
}
echo "You have scored " . (5 - count($incorrect)) . " out of 5.<br /><br />";

if(count($incorrect) > 0)
{
	echo "<h3>Your incorrect answers are :</h3>";

	foreach($incorrect as $key => $value)
	{
		$qr = $db->prepare("SELECT q_body, q_ans$value[0], q_ans$value[1] FROM questions WHERE q_id = ?");
		$qr->execute(array($key));
		$result = $qr->fetch(PDO::FETCH_ASSOC);
		
		echo '<div class="inc_ques">' . $result['q_body'] . '</div>';
		echo '<div class="inc_ans">Your answer: ' . $result["q_ans$value[0]"] . '</div>';
		echo '<div class="corr_ans">Correct answer: ' . $result["q_ans$value[1]"] . '</div>';
	}
}

require('./template/footer.php');	
	
?>
	
