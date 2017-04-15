<?php include_once ('scripts/auth.php'); ?>
<?php
	include_once ('../scripts/conn.php'); 	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cp | institutios</title>
<style type="text/css">
table {
	padding:0;
	margin:0;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
}
th {
	padding-top:2px;
	padding-bottom:2px;
	padding-left:4px;
	background-color:#999;
	text-align:left;	
}
td {
	padding-top:2px;
	padding-bottom:2px;
	padding-left:4px;
	border:1px solid #999;	
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
	
	.style10 a{
		color:#000;	
	}
	.style10 a:visited{
		color:#000;	
	}
	.style10 a:hover{
		color:#333;	
	}
</style>
<link rel="stylesheet" type="text/css" href="../styles/cp.css" />

</head>

<body>

<h2>Institutions | <span class="cp"><a href="cp.php">Back To Control Panel </a></span>| <span class="cp"><a href="../scripts/logout.php">Logout</a></span></h2>
<p>&nbsp;</p>
<div id="cp">
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th width="210">Name</th>
    <th width="93">Community</th>
    <th width="164">Category</th>
    <th width="141">Email</td>
    <th width="108">Telephone</th>
    <th width="84">&nbsp;</th>
    </tr>
  
   <?php 
	$rowsperpage = 50;
    $pagenum = 1;
   
    if(isset($_GET['pag']))
    {
       $pagenum = $_GET['pag'];
    }
    $offset = ($pagenum - 1) * $rowsperpage;
    $query = "SELECT * FROM institutions ORDER BY community_id, category_id, name ASC"." LIMIT $offset, $rowsperpage";
	$result = mysql_query($query) or die(mysql_error());
	while ($rows = mysql_fetch_array($result))
	{
		//to get community
		$sql = 'select community from communities where id='.$rows['community_id'];
		$sq = mysql_query($sql) or die(mysql_error());
		$roo = mysql_fetch_array($sq);
		
		//to get category
		$s = 'select category from categories where id='.$rows['category_id'];
		$q = mysql_query($s) or die(mysql_error());
		$ro = mysql_fetch_array($q);
  ?>
  
  <tr>
    <td><?php echo $rows['name']; ?></td>
    <td><?php echo $roo['community']; ?></td>
    <td><?php echo $ro['category']; ?></td>
    <td><?php echo $rows['email']; ?></td>
    <td><?php echo $rows['phone']; ?></td>
    <td><a href="institutions.delete.php?id=<?php echo $rows['id']; ?>&name=<?php echo $rows['name']; ?>&pag=<?php echo $_REQUEST['pag']; ?>">Delete</a></td>
    </tr>
  
 <?php
	}
 ?>
  <tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  
  <?php
   $query = "SELECT COUNT(*) AS numrows FROM institutions ORDER BY community_id, category_id, name ASC";
   $result = mysql_query($query) or die(mysql_error());
   $rows = mysql_fetch_array($result, MYSQL_ASSOC);
   $numrows = $rows['numrows'];
   
   // how many pages we have when using paging?
    $maxPage = ceil($numrows/$rowsperpage);

   // print the link to access each page
   $self = $_SERVER['PHP_SELF'];
   $nav  = '';
   
   $pagetotal = 10; // maximum page numbers to display at once, must be an odd number
   $pagelimit = ($pagetotal - 1)/2;
   $pagemax = $pagetotal > $maxPage?$maxPage:$pagetotal;

   if ($pagenum - $pagelimit < 1) {
      $pagemin = 1;
   }

   if (($pagenum - $pagelimit >= 1) && ($pagenum + $pagelimit <= $maxPage)) {
      $pagemin = $pagenum - $pagelimit;
      $pagemax = $pagenum + $pagelimit;
   }

   if (($pagenum - $pagelimit >= 1) && ($pagenum + $pagelimit > $maxPage)) {
      $pagemin = (($maxPage - $pagetotal) + 1) < 1?1:(($maxPage - $pagetotal) + 1);
      $pagemax = $maxPage;
   }

   if (($pagenum + $pagelimit) > $maxPage) {
      $pagemax = $maxPage;
   } 


   for($pag = $pagemin; $pag <= $pagemax; $pag++)
   {
       if ($pag == $pagenum)
       {
           $nav .= " $pag "; // no need to create a link to current page
       }
       else
       {
           $nav .= " <a href=\"$self?pag=$pag\" class = style10>$pag</a> ";
       }
   }
   
   if ($pagenum > 1)
   {
       $pag  = $pagenum - 1;
       $prev  = " <a href=\"$self?pag=$pag\" class = style10>[Prev]</a> ";
       $first = " <a href=\"$self?pag=1\" class = style10>[First Page]</a> ";
   }
   else
   {
       $prev  = '&nbsp;'; // we're on page one, don't print previous link
       $first = '&nbsp;'; // nor the first page link
   }

   if ($pagenum < $maxPage)
   {
       $page = $pagenum + 1;
       $next = " <a href=\"$self?pag=$pag\" class = style10>[Next]</a> ";
       $last = " <a href=\"$self?pag=$maxPage\" class = style10>[Last Page]</a> ";
   }
   else
   {
       $next = '&nbsp;'; // we're on the last page, don't print next link
       $last = '&nbsp;'; // nor the last page link
   }   
 ?>
  
  
  <tr>
    <td colspan="6" align="center" valign="middle"><?php echo $first . $prev . $nav . $next . $last; ?></td>
  </tr>
</table>
</div>

</body>
</html>