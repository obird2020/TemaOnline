<?php
	include_once('../back/scripts/functions.php');
	
	if ($_POST['email']=='')
	{
		$errors[] = '**enter your email address**';
	}
	
	else if (valid_email($_POST['email'])==FALSE)
	{
		$errors[] = '**supply a valid email address**';
	}
	else if (insin($_POST['email'])==FALSE)
	{
		$errors[] = '**sorry, wrong email address**';	
	}
	
	if(is_array($errors))
	{
		while (list($key,$value) = each($errors))
		{
			
			echo '<blink><span class="error">'.$value.'</span></blink><br /><br />';
		}
	}
	else {
		//send mail
		//$to = $_POST['email'];
		//$subject = 'temaOnline account info';
		//$body = 'your account password is: ' . md5($r['password']);
		//mail($to, $subject, $body) or die('Sorry, could not send mail. Try again later');
		echo '<blink>**password sent to your mail**</blink><br /><br />';
	}
?>