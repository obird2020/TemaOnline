<?php
	session_start();
	//codes for editing institutions by owners themselves
	include_once ('conn.php');
	
	//check if category already exists in database
	$exists = false;
	$select = "SELECT * FROM institutions WHERE name != '" . $_SESSION['name'] . "'";
	$execute = mysql_query($select) or die(mysql_error());

	while ($rows = mysql_fetch_array($execute))
	{
		if ($_POST['name'] == $rows['name'])
		{
			$exists = true;
		}
	}
	
	
	$mail = false;
	$selec = "SELECT * FROM institutions WHERE email != '" . $_SESSION['use_mail'] . "'";
	$execut = mysql_query($selec) or die(mysql_error());

	while ($rows = mysql_fetch_array($execut))
	{
		if ($rows['email'] == $_POST['email'])
		{
			$mail = true;
		}
	}
	
	function alpha_numeric($str)
	{
		return ( ! preg_match("/^([-a-z0-9])+$/i", $str)) ? FALSE : TRUE;
	}

	function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}
	
	
	if ($_POST['name']=='' || $_POST['email']=='' || $_POST['pass']=='')
	{
		$errors[] = '**enter all fields with asterisks**';
	}
	else if ($exists == true)
	{
		$errors[] = '**' . $_POST['name'] .' already exists**';
	}
	else if (valid_email($_POST['email'])==FALSE)
	{
		$errors[] = '**supply a valid email address**';
	}
	else if ($mail == true)
	{
		$errors[] = '**email already exists**';	
	}
	else if ($_POST['pass'] != $_POST['conpass'])
	{
		$errors[] = '**passwords do not match**';	
	}

	if(is_array($errors))
	{
		while (list($key,$value) = each($errors))
		{
			echo '<blink><span class="error">'.$value.'</span></blink><br /><br />';
		}
	}
	else {
		//insert value into database
		$sql = "UPDATE institutions SET category_id = '" . $_POST['cat'] . "', community_id = '" . $_POST['com'] . "', name = '" . addslashes($_POST['name']) . "', location = '" . addslashes($_POST['loc']) . "', phone = '" . $_POST['phone'] . "', email = '" . addslashes($_POST['email']) . "', fax = '" . $_POST['fax'] . "', website = '" . addslashes($_POST['website']) . "', profile = '" . addslashes($_POST['profile']) . "', address = '" . addslashes($_POST['address']) . "', password = '" . md5(addslashes($_POST['pass'])) . "' WHERE name = '" . $_SESSION['name'] . "' AND email = '" . $_SESSION['use_mail'] . "' AND password = '" . md5($_SESSION['use_pass']) . "'";
		
		$query = mysql_query($sql) or die(mysql_error());
		
		$_SESSION['use_mail'] = $_POST['email'];
		$_SESSION['use_pass'] = $_POST['pass'];
		$_SESSION['name'] = $_POST['name'];
			
		echo '<blink>**' . $_POST['name'] . ' update successful!**</blink><br /><br />';
	}

?>