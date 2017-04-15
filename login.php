<?php 
	session_start();
	ob_start();
	include_once('scripts/conn.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/adminpart.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>temaonline | login</title>

<style type="text/css">
#forgot {
	margin:0;
	padding:0;
	float:left;
	margin-top:15px;
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
.thelinks a:link {
	margin:0;
	padding:0;
	color:#000;
	text-decoration:none;
}
.thelinks a:hover {
	color:#000;	
	text-decoration:underline;
}
.thelinks a:visited {
	color:#000;	
}
.error {
			color:red;
			margin:0;
			padding:0;
	}

</style>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="styles/cp.css" />
<!-- InstanceParam name="OptionalRegion1" type="boolean" value="true" -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div id="main">
  <div id="cp"><img src="images/userlogin.png" /></div>
  <div id="top"></div>
  <div id="middle">
  
  
    <?php
  	if (isset($_POST['log']))
	{
		 $query = "SELECT * FROM institutions WHERE email = '" . $_POST['username'] . "' AND password = '" . md5($_POST['pass']) . "'";			 
		 $result = mysql_query($query) or die(mysql_error());
		 $row = mysql_fetch_array($result);
		 
		if (mysql_num_rows($result) == 1)
		{   
			$_SESSION['use_mail'] = $_POST['username'];
			$_SESSION['use_pass'] = $_POST['pass'];
			$_SESSION['name'] = $row['name'];
			header("Refresh: 0; URL=" . $_POST['redirect'] . "");
		}
				 
		else
		{   
  ?>
  
  <form action="login.php" method="post" name="login">
   <table width="387" border="0" cellpadding="1" cellspacing="0">
  <tr>
    <td colspan="3" align="center" id="log_res"><blink> invalid email or password </blink></td>
    </tr>
  <tr>
    <td width="139" align="right">Email:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="username"></label>
      <input class="entry" type="text" name="username" id="username" value="<?php echo $_POST['username']; ?>"/></td>
  </tr>
  <tr>
    <td align="right">Password:</td>
    <td>&nbsp;</td>
    <td><label for="pass"></label>
      <input class="entry" type="password" name="pass" id="pass" value="<?php echo $_POST['pass']; ?>"/></td>
  </tr>
  <tr>
    <td><input name="redirect" type="hidden" id="redirect" value="<?php echo $_POST['redirect']; ?>" /></td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="log" id="log" value="Login" />
      <input class="but" type="reset" name="reset" id="login2" value="Reset" /></td>
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
		if (isset($_GET['redirect'])) 
		{
             $redirect = $_GET['redirect'];
        }
		else
		{				   	   
			$redirect = "institutions.edit.php";			     
		}
  ?>

  <form action="login.php" method="post" name="login">
   <table width="387" border="0" cellpadding="1" cellspacing="0">
  <tr>
    <td colspan="3" align="center" id="log_res">&nbsp;</td>
    </tr>
  <tr>
    <td width="139" align="right">Email:</td>
    <td width="8">&nbsp;</td>
    <td width="219"><label for="username"></label>
      <input class="entry" type="text" name="username" id="username" /></td>
  </tr>
  <tr>
    <td align="right">Password:</td>
    <td>&nbsp;</td>
    <td><label for="pass"></label>
      <input class="entry" type="password" name="pass" id="pass" /></td>
  </tr>
  <tr>
    <td><input name="redirect" type="hidden" id="redirect" value="<?php echo $redirect; ?>" /></td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="log" id="log" value="Login" />
      <input class="but" type="reset" name="reset" id="login2" value="Reset" /></td>
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
  
  <div id="forgot"><span class="thelinks"><a href="forgetpass.php">Forgotten password</a></span>? | <span class="thelinks"><a href="notyet.php">Not yet registered</a></span>? | <span class="thelinks"><a href="index.php">Back to home page</a></span></div>
</div>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
<?php ob_end_flush(); ?>