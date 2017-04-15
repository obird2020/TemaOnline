<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/adminpart.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>temaonline | forgotten password</title>

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
  <div id="cp"></div>
  <div id="top"></div>
  <div id="middle">
  
  
  
 
  
    <form action="scripts/maill.php" method="post" id="instForm" name="instForm">
      <table width="384" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" id="log_res">&nbsp;</td>
  </tr>
  <tr>
    <td width="128" height="24" align="right">Email:</td>
    <td width="7">&nbsp;</td>
    <td><input class="entry" type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input class="but" type="submit" name="submit2" id="submit2" value="Submit" /></td>
  </tr>
    </table>
 </form>
 
 
 
 
 
  </div>
  <div id="bottom"></div>
  
  <div id="forgot"><span class="thelinks"><a href="index.php">Back to home page</a></span> | <span class="thelinks"><a href="login.php">Back to login page</a></span></div>
</div>
  
</div>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>