<?php include_once ('auth.php'); ?>
<?php
	include_once ('../../scripts/conn.php');
	include('functions.php');
	
	if ($_POST['cat']=='' || $_POST['com']=='' || $_POST['name']=='' || $_POST['email']=='')
	{
		$errors[] = '**enter all fields with asterisks**';
	}
	else if ($exists == true)
	{
		$errors[] = '**' .$_POST['name'] .' already exists**';
	}
	else if (valid_email($_POST['email'])==FALSE)
	{
		$errors[] = '**supply a valid email address**';
	}
	else if ($mail == true)
	{
		$errors[] = '**email already exists**';	
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
		$sql = "INSERT INTO institutions (category_id, community_id, name, email, password) VALUES ('" . $_POST['cat'] . "','" . $_POST['com'] . "', '" . addslashes($_POST['name']) . "', '" . addslashes($_POST['email']) . "', '" . md5('12345') . "')";
		
		$query = mysql_query($sql) or die(mysql_error());
		echo '<blink>**' . $_POST['name'] . ' successfully added to institutions!**</blink><br /><br />';
	}

?>