<?php
	require_once('./includes/db_connect.php');
	global $question_posted_id;
	$title='Question Paper - Answer the following questions';
	require_once('./template/header.php');
	$db = db_connect();
	$qr = $db->prepare("SELECT * from questions");
	$qr->execute();  //execution of the sql
	$qr->fetch(PDO::FETCH_ASSOC);  //Saving the sql query outout as associative array in variable $qr
	$rand = rand(1,10); //For Random Question Generation
	
	if(in_array($question_posted_id) == $rand) //Not sure
	{
		$qr->execute(); //Not sure about this line	
	}
	else
	{
		echo "<div class='question'>".$qr['question']."</div><br >"; ?>
        <form name="answer" method="post" action="">
        <?php 
		echo "<div class='answer'><input type='radio' name='answer' value='".$qr['ans1']."' /><input type='radio' name='answer' value='".$qr['ans2']."' /><br /><input type='radio' name='answer' value='".$qr['ans3']."' /><input type='radio' name='answer' value='".$qr['ans4']."' />"; 
		?>
        </form>
        <?php
		$question_posted_id[] = $qr['q_id'];  //Not sure
	}
	require_once('./template/footer.php');
?>