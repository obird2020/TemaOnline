<?php
	session_start();
	include_once ('../scripts/conn.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/adminpart.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>temaonline | login update</title>
<style type="text/css">
h2 {
	margin:0;
	padding:0;
	float:right;	
}
.but {
		margin-top:10px;
		background-color:#900;
		color:#FFF;
	}
	
.entry {
	margin:0;
	padding:0;
	border:1px solid #000;
}
.entry:hover {
		border:1px solid #903;
		background-color:#FC9;
}
.entry:focus {
		border:1px solid #903;
		background-color:#FC9;
}
.error {
			color:red;
			margin:0;
			padding:0;
	}
	.err {
			color:#FFF;
			margin:0;
			padding:0;
	}
.cp a{
			color:#666;
			margin:0;
			padding:0;
			text-decoration:none;
			font-size:13px;
	}
	.cp a:visited{
			color:#666;
			margin:0;
			padding:0;
			text-decoration:none;
	}
	.cp a:hover{
			text-decoration:underline;
	}
</style>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="../styles/cp.css" />
<!-- InstanceParam name="OptionalRegion1" type="boolean" value="true" -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div id="main">
  <div id="cp"><img src="../images/admin.png" /> <h2> | <span class="cp"><a href="cp.php">Main Admin Page</a></span> | <span class="cp"><a href="../scripts/logout.php">Logout</a></span></h2></div>
  <div id="top"></div>
  <div id="middle">
   <?php
  	if (isset($_POST['log']))
	{
		 if ($_POST['ouser'] == '' || $_POST['opass'] == '' || $_POST['nuser'] == '' || $_POST['npass'] == '')
		 {
	?>		
		
    <form action="loginupdate.php" method="post" name="login">
   <table width="387" border="0" cellpadding="1" cellspacing="0">
  <tr>
    <td class="error" colspan="3" align="center" id="log_res"><blink> **please enter all required fields** </blink><br /><br /></td>
    </tr>
  <tr>
    <td width="139" align="right">Old Username:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="text" name="ouser" id="ouser" value="<?php echo $_POST['ouser']; ?>"/></td>
  </tr>
  <tr>
    <td width="139" align="right">Old Password:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="password" name="opass" id="opass" value="<?php echo $_POST['opass']; ?>"/></td>
  </tr>
  <tr>
    <td width="139" align="right"> New Username:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="text" name="nuser" id="nuser" value="<?php echo $_POST['nuser']; ?>"/></td>
  </tr>
  <tr>
    <td align="right">New Password:</td>
    <td>&nbsp;</td>
    <td><label for="npass"></label>
      <input class="entry" type="password" name="npass" id="npass" value="<?php echo $_POST['npass']; ?>"/></td>
  </tr>
  <tr>
    <td align="right">Confirm Password:</td>
    <td>&nbsp;</td>
    <td><label for="npass"></label>
      <input class="entry" type="password" name="cpass" id="cpass" value="<?php echo $_POST['cpass']; ?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="log" id="log" value="Update" />
      <input class="but" type="reset" name="reset" id="login2" value=" Reset " /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </table>
  </form> 
        
   <?php     	
		 }
		 else if ($_POST['ouser'] != $_SESSION['adname'] || $_POST['opass'] != $_SESSION['adpass'])
		 {
	?>		 
		
    <form action="loginupdate.php" method="post" name="login">
   <table width="387" border="0" cellpadding="1" cellspacing="0">
  <tr>
    <td class="error" colspan="3" align="center" id="log_res"><blink> **invalid old username or password** </blink><br /><br /></td>
    </tr>
  <tr>
    <td width="139" align="right">Old Username:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="text" name="ouser" id="ouser" value="<?php echo $_POST['ouser']; ?>"/></td>
  </tr>
  <tr>
    <td width="139" align="right">Old Password:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="password" name="opass" id="opass" value="<?php echo $_POST['opass']; ?>"/></td>
  </tr>
  <tr>
    <td width="139" align="right"> New Username:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="text" name="nuser" id="nuser" value="<?php echo $_POST['nuser']; ?>"/></td>
  </tr>
  <tr>
    <td align="right">New Password:</td>
    <td>&nbsp;</td>
    <td><label for="npass"></label>
      <input class="entry" type="password" name="npass" id="npass" value="<?php echo $_POST['npass']; ?>"/></td>
  </tr>
  <tr>
    <td align="right">Confirm Password:</td>
    <td>&nbsp;</td>
    <td><label for="npass"></label>
      <input class="entry" type="password" name="cpass" id="cpass" value="<?php echo $_POST['cpass']; ?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="log" id="log" value="Update" />
      <input class="but" type="reset" name="reset" id="login2" value=" Reset " /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </table>
  </form>    	 
			 
   <?php			 
		 }
		 else if ($_POST['npass'] != $_POST['cpass'])
		 {
			 
   ?>		 
			 
    <form action="loginupdate.php" method="post" name="login">
   <table width="387" border="0" cellpadding="1" cellspacing="0">
  <tr>
    <td class="error" colspan="3" align="center" id="log_res"><blink> **passwords do not match** </blink><br /><br /></td>
    </tr>
  <tr>
    <td width="139" align="right">Old Username:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="text" name="ouser" id="ouser" value="<?php echo $_POST['ouser']; ?>"/></td>
  </tr>
  <tr>
    <td width="139" align="right">Old Password:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="password" name="opass" id="opass" value="<?php echo $_POST['opass']; ?>"/></td>
  </tr>
  <tr>
    <td width="139" align="right"> New Username:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="text" name="nuser" id="nuser" value="<?php echo $_POST['nuser']; ?>"/></td>
  </tr>
  <tr>
    <td align="right">New Password:</td>
    <td>&nbsp;</td>
    <td><label for="npass"></label>
      <input class="entry" type="password" name="npass" id="npass" value="<?php echo $_POST['npass']; ?>"/></td>
  </tr>
  <tr>
    <td align="right">Confirm Password:</td>
    <td>&nbsp;</td>
    <td><label for="npass"></label>
      <input class="entry" type="password" name="cpass" id="cpass" value="<?php echo $_POST['cpass']; ?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="log" id="log" value="Update" />
      <input class="but" type="reset" name="reset" id="login2" value="   Reset   " /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </table>
  </form>
    
    		 
   <?php		 
		 }
		 else
		 {
			 $sql = "UPDATE login SET username = '" . $_POST['nuser'] . "', password = '" . md5($_POST['npass']) . "'";
			 $query = mysql_query($sql) or die(mysql_error());
			 
			 $_SESSION['adname'] = $_POST['nuser'];
			 $_SESSION['adpass'] = $_POST['npass'];
			 
	?>		
    <form action="loginupdate.php" method="post" name="login">
   <table width="387" border="0" cellpadding="1" cellspacing="0">
  <tr>
    <td class="err" colspan="3" align="center" id="log_res"><blink> **login info successfully updated** </blink><br /><br /></td>
    </tr>
  <tr>
    <td width="139" align="right">Old Username:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="text" name="ouser" id="ouser" value="<?php echo $_POST['ouser']; ?>"/></td>
  </tr>
  <tr>
    <td width="139" align="right">Old Password:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="password" name="opass" id="opass" value="<?php echo $_POST['opass']; ?>"/></td>
  </tr>
  <tr>
    <td width="139" align="right"> New Username:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="text" name="nuser" id="nuser" value="<?php echo $_POST['nuser']; ?>"/></td>
  </tr>
  <tr>
    <td align="right">New Password:</td>
    <td>&nbsp;</td>
    <td><label for="npass"></label>
      <input class="entry" type="password" name="npass" id="npass" value="<?php echo $_POST['npass']; ?>"/></td>
  </tr>
  <tr>
    <td align="right">Confirm Password:</td>
    <td>&nbsp;</td>
    <td><label for="npass"></label>
      <input class="entry" type="password" name="cpass" id="cpass" value="<?php echo $_POST['cpass']; ?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="log" id="log" value="Update" />
      <input class="but" type="reset" name="reset" id="login2" value="  Reset  " /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </table>
  </form>		
			
	<?php		
			 
		 }
	}
	else
	{
?>		
	
    
     <form action="loginupdate.php" method="post" name="login">
   <table width="387" border="0" cellpadding="1" cellspacing="0">
 
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="139" align="right">Old Username:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="text" name="ouser" id="ouser"/></td>
  </tr>
  <tr>
    <td width="139" align="right">Old Password:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="password" name="opass" id="opass"/></td>
  </tr>
  <tr>
    <td width="139" align="right"> New Username:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="ouser"></label>
      <input class="entry" type="text" name="nuser" id="nuser"/></td>
  </tr>
  <tr>
    <td align="right">New Password:</td>
    <td>&nbsp;</td>
    <td><label for="npass"></label>
      <input class="entry" type="password" name="npass" id="npass"/></td>
  </tr>
  <tr>
    <td align="right">Confirm Password:</td>
    <td>&nbsp;</td>
    <td><label for="npass"></label>
      <input class="entry" type="password" name="cpass" id="cpass"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="log" id="log" value="Update" />
      <input class="but" type="reset" name="reset" id="login2" value="  Reset  " /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </table>
  </form>	
		
<?php		
	}
  ?>
  
  </div>
  <div id="bottom"></div>
</div>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>