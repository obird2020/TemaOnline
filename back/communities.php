<?php include_once ('scripts/auth.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cp | categories</title>

<script type="text/javascript" src="scripts/mootools.js"></script>
	<script type="text/javascript">
		window.addEvent('domready', function(){
	                $('communityForm').addEvent('submit', function(e) {
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
	#categories {
		float:left;
		margin:0;
		padding:0;
		margin-top:50px;
	}
	#page {
		width:800px;
		margin:0 auto;
		padding:0;
		border:1px solid blue;
	}
	.tab {
		border-collapse:collapse;
		border: 1px solid #000000;
		text-align:left;	
	}
	.tab th {
	   background:#EBEBEB;	
	}
	.tab td {
	 	border:1px solid #000000;	
		padding:1px;
	}
	.tab td a{
	 	color:#000;
		text-decoration:none;
	}
	.tab td a:hover{
		text-decoration:underline;
	}
	
</style>
<link rel="stylesheet" type="text/css" href="../styles/cp.css" />
</head>

<body>

<div id="main">
<div id="cp">
  <h2>Communities | <span class="cp"><a href="cp.php">Back To Control Panel </a></span> | <span class="cp"><a href="../scripts/logout.php">Logout</a></span></h2> 
  </div>
<div id="top"></div>
<div id="middle">
 <form action="scripts/com_submit.php" method="post" name="communityForm" id="communityForm">
 <table width="384" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" align="center" id="log_res">&nbsp;</td>
  </tr>
  <tr>
    <td width="128" align="right">Category:</td>
    <td width="7">&nbsp;</td>
    <td width="160"><input class="ca" type="text" name="community" id="community" value="" /></td>
    <td width="79">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">
    <input class="but" type="submit" name="submit" id="submit" value="  Add  " />
    <input class="but" type="reset" name="reset" id="reset" value="Reset" />
    <br />
    <br />
    </td>
  </tr>
</table>

 </form>

</div>
<div id="bottom"></div>

</div>

</body>
</html>
