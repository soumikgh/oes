<?php

session_start();

if(!isset($_SESSION['user_id']))
{
	die('You are not logged in. Please <a href="./">log in</a>.');
}

$title='Questions - Online examination system';
require('./template/header.php');
require_once('./includes/db_connect.php');

$db = db_connect();
$qr = $db->prepare("SELECT q_body, q_ans1, q_ans2, q_ans3, q_ans4 FROM questions WHERE q_id = ?");
$qs = array();

echo '<form name="questions" method="post" action="result.php">';

for ($i=1; $i<=5; $i++)
{
	while(in_array($qno = rand(1, 10), $qs)); //Find a number not in the array
	$qs[] = $qno; //Push the number into the array
	echo '<input type="hidden" name="q' . $i . '" value="' . $qno . '" />';
	
	$qr->execute(array($qno));
	$result = $qr->fetch(PDO::FETCH_ASSOC);
	echo '<div class="question">' . $result['q_body'] . '</div>';
	echo '<div class="answer">';
	for ($j=1; $j<=4; $j++)
	{
		echo '<input type="radio" name="a' . $i . '" value="'. $j . '" />' . $result["q_ans$j"];
	}
	echo '</div>';
}
echo '<input type="submit" value="Submit" onClick="return validateAnswers()" />';
require('./template/footer.php');
?>
