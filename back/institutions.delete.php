<?php include_once ('scripts/auth.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>Are you sure you want to delete <?php echo $_REQUEST['name']; ?>?</p>
<p><a href="institutions.del.php?id=<?php echo $_REQUEST['id']; ?>&amp;pag=<?php echo $_REQUEST['pag']; ?>">Yes</a> | <a href="institution.list.php?pag=<?php echo $_REQUEST['pag']; ?>">No</a></p>
</body>
</html>