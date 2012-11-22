<?php

session_start();

if(!isset($_SESSION['user_id']))
{
	die('You are not logged in. Please <a href="./">log in</a>.');
}

elseif(!isset($_POST['qSubmit']))
{
	die('You have not given the exam. Please proceed to the <a href="./exam.php">exam page</a>.');
}

$title='Results - Online examination system';
require('./template/header.php');
require_once('./includes/db_connect.php');

$db = db_connect();
$qr = $db->prepare("SELECT q_correct_ans FROM questions WHERE q_id = ?");

echo '<h2 class="heading"><span id="green">Congratulations!</span> You have completed the test.</h2>';
echo '<div class="resultBody">';

$attempted = array();
$unattempted = array();
$incorrect = array();

for ($i=1; $i<=5; $i++) // Find out attempted questions and store them in $attempted
{
	if(isset($_POST["a$i"]))
	{
		$attempted[] = $i;
	}
	else
	{
		$unattempted[] = $i;
	}
}	

foreach ($attempted as $i)
{
	$qr->execute(array($_POST["q$i"]));
	$result = $qr->fetch(PDO::FETCH_ASSOC);
	if( (int) $_POST["a$i"] != (int) $result['q_correct_ans']) // If given answer doesn't match with correct answer
	{
		$incorrect[$_POST["q$i"]] = array($i, $_POST["a$i"], $result['q_correct_ans']); // Push question no., incorrect answer and correct answer into array
	}
}
echo "<div class='center'>You have scored :<strong> " . (count($attempted) - count($incorrect)) . " out of 5.</strong></div><br /><br />";

if(count($incorrect) > 0)
{
	echo "<h3>Your incorrect answers are :</h3>";

	foreach($incorrect as $key => $value)
	{
		$qr = $db->prepare("SELECT q_body, q_ans$value[1], q_ans$value[2] FROM questions WHERE q_id = ?");
		$qr->execute(array($key));
		$result = $qr->fetch(PDO::FETCH_ASSOC);
		
		echo '<strong><font color="#C00">Q' . $value[0] . ')</font></strong><span class="inc_ques">' . $result['q_body'] . '</span>';
		echo '<div class="inc_ans">Your answer: ' . $result["q_ans$value[1]"] . '</div>';
		echo '<div class="corr_ans">Correct answer: ' . $result["q_ans$value[2]"] . '</div>';
	}
}

if(count($unattempted) > 0)
{
	echo "<h3>Your unattempted answers are :</h3>";
	
	$qr1 = $db->prepare("SELECT q_correct_ans FROM questions WHERE q_id = ?");

	foreach($unattempted as $value)
	{
		$qr1->execute(array($_POST["q$value"]));
		$result1 = $qr1->fetch(PDO::FETCH_ASSOC);
		
		$qr2 = $db->prepare("SELECT q_body, q_ans$result1[q_correct_ans] FROM questions WHERE q_id = ?");
		$qr2->execute(array($_POST["q$value"]));
		$result2 = $qr2->fetch(PDO::FETCH_ASSOC);
		
		echo '<span class="inc_ques_no">Q' . $value . ')</span><span class="inc_ques">' . $result2["q_body"] . '</span>';
		echo '<div class="corr_ans">Correct answer: ' . $result2["q_ans$result1[q_correct_ans]"] . '</div>';
	}
}

echo '</div><div id="endMessage">Thank you for using our test system.</div>';
echo '<div class="center"><a href="./exam.php">[ Re-take the test ]</a></div>';
require('./template/footer.php');	
	
?>
	
