<?php
	session_start();
	include_once('scripts/conn.php');
	$inst = "SELECT * FROM institutions WHERE email = '" . $_SESSION['use_mail'] . "' AND password = '" . md5($_SESSION['use_pass']) . "'";
	$instq = mysql_query($inst) or die(mysql_error());
	$rrr = mysql_num_rows($instq) or die(mysql_error());
	$instr = mysql_fetch_array($instq) or die('could not select');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cp | institutions</title>
 <script type="text/javascript" src="back/scripts/mootools.js"></script>
	<script type="text/javascript">
		window.addEvent('domready', function(){
	                $('instForm').addEvent('submit', function(e) {
	                    new Event(e).stop();
	                    var log = $('log_res').empty().addClass('ajax-loading');
	                    this.send({
	                        update: log,
	                        onComplete: function() {
	                            log.removeClass('ajax-loading');
	                        }
	                    });
	                });
	            });
	</script>
    
<style type="text/css">
     h2 {
		 color:#900;
	 }
	.but {
		margin-top:10px;
		background-color:#900;
		color:#FFF;
	}
	.ca {
		margin:0;
		padding:0;
		border:1px solid #900;
	}
	.error {
			color:red;
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
	
	#institutions {
		margin:15px 0;
		padding:0;
		float:right;
	}
</style>
<link rel="stylesheet" type="text/css" href="styles/cp.css" />
</head>

<body>

<div id="main">
<div id="cp">
  <h2>Edit Institution | <span class="cp"><a href="scripts/logout.php">Logout</a></span></h2> 
  </div>
<div id="top"></div>
<div id="middle">




  <form action="scripts/inst.edit.php" method="post" name="instForm" id="instForm">
    <table width="384" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" align="center" id="log_res">&nbsp;</td>
  </tr>
  <tr>
    <td width="128" height="26" align="right">*Category:</td>
    <td width="7" colspan="2">&nbsp;</td>
    <td><label>
      
      
      <select name="cat" id="cat">
      	<?php
	  		$s = "SELECT * FROM categories WHERE id = '" . $instr['category_id'] . "'";
			$q = mysql_query($s) or die(mysql_error());
			$r = mysql_fetch_array($q)
      	?>
        <option value="<?php echo $r['id']; ?> selected="selected"><?php echo $r['category']; ?></option>
        <?php
			$sql = "SELECT * FROM categories ORDER BY category ASC";
			$query = mysql_query($sql) or die(mysql_error());
			while ($rows = mysql_fetch_array($query))
			{
		?>
        <option value="<?php echo $rows['id']; ?>" class="combo"><?php echo $rows['category']; ?></option>
        <?php
			}
		?>
        </select>
      
      
    </label></td>
    </tr>
  <tr>
    <td align="right" valign="top">*Community:</td>
    <td colspan="2">&nbsp;</td>
    <td>
      
      <select name="com" id="com" class="combo">
      <?php
	  		$s = "SELECT * FROM communities WHERE id = '" . $instr['community_id'] . "'";
			$q = mysql_query($s) or die(mysql_error());
			$r = mysql_fetch_array($q)
      	?>
        <option value="<?php echo $r['id']; ?> selected="selected"><?php echo $r['community']; ?></option>
        <?php
			$sq = "SELECT * FROM communities ORDER BY community ASC";
			$quer = mysql_query($sq) or die(mysql_error());
			while ($row = mysql_fetch_array($quer))
			{
		?>
        <option value="<?php echo $row['id']; ?>" class="combo"><?php echo $row['community']; ?></option>
        <?php
			}
	  ?>
        </select> 
      
      <br /></td>
  </tr>
  <tr>
    <td align="right">*Institution Name:</td>
    <td colspan="2">&nbsp;</td>
    <td><label>
      <input type="text" name="name" id="name" value="<?php echo $instr['name']; ?>" />
    </label></td>
  </tr>
  <tr>
    <td align="right" valign="top">Location:</td>
    <td colspan="2">&nbsp;</td>
    <td><label>
      <textarea name="loc" id="loc" cols="16" rows="2"><?php echo $instr['location']; ?></textarea>
    </label></td>
  </tr>
  <tr>
    <td height="16" align="right" valign="top">Address:</td>
    <td colspan="2">&nbsp;</td>
    <td><textarea name="address" id="address" cols="16" rows="3"><?php echo $instr['address']; ?></textarea></td>
  </tr>
  <tr>
    <td height="24" align="right">Telephone:</td>
    <td colspan="2">&nbsp;</td>
    <td><input type="text" name="phone" id="phone" value="<?php echo $instr['phone']; ?>"/></td>
  </tr>
  <tr>
    <td height="24" align="right">*Email:</td>
    <td colspan="2">&nbsp;</td>
    <td><input type="text" name="email" id="email" value="<?php echo $instr['email']; ?>"/></td>
  </tr>
  <tr>
    <td height="12" align="right">Website:</td>
    <td colspan="2">&nbsp;</td>
    <td><input type="text" name="website" id="website" value="<?php echo $instr['website']; ?>"/>
    </td>
    <td rowspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td align="right">Fax:</td>
    <td height="12" colspan="2">&nbsp;</td>
    <td><input type="text" name="fax" id="fax" value="<?php echo $instr['fax']; ?>"/></td>
    </tr>
    <tr>
    <td height="16" align="right" valign="top">Profile:</td>
    <td colspan="2">&nbsp;</td>
    <td><textarea name="profile" id="profile" cols="35" rows="10"><?php echo $instr['profile']; ?></textarea></td>
  </tr>
  <tr>
    <td height="24" align="right">*Password:</td>
    <td colspan="2">&nbsp;</td>
    <td><input type="password" name="pass" id="pass" value="<?php echo $_SESSION['use_pass']; ?>" /></td>
  </tr>
  <tr>
    <td height="16" align="right">*Confirm Password:</td>
    <td colspan="2">&nbsp;</td>
    <td><input type="password" name="conpass" id="conpass" value="<?php echo $_SESSION['use_pass']; ?>" /></td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td><input class="but" type="submit" name="submit2" id="submit2" value="  Edit  " /></td>
  </tr>
    </table>
 </form>
 
</div>
<div id="bottom"></div>
</div>

</body>
</html>