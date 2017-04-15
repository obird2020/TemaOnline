<?php include_once ('auth.php'); ?>
<?php
	include_once ('../../scripts/conn.php');
	
	//check if category already exists in database
	$exists = false;
	$select = "SELECT * FROM communities WHERE community = '" . $_POST['community'] . "'";
	$execute = mysql_query($select) or die(mysql_error());
	if ($rows = mysql_num_rows($execute) > 0)
	{
		$exists = true;
	}
	
	if ($_POST['community']=='')
	{
		$errors[] = '**enter community**';
	}
	else if ($exists == true)
	{
		$errors[] = '**community ' .$_POST['community'] .' already exists**';
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
		$sql = "INSERT INTO communities (community) VALUES ('" . stripslashes(addslashes($_POST['community'])) . "')";
		$query = mysql_query($sql) or die(mysql_error());
		echo '<blink>**community ' . $_POST['community'] . ' successfully added to communities!**</blink><br /><br />';
	}
?>