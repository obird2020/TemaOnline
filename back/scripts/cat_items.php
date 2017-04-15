<?php include_once ('auth.php'); ?>
<?php
include_once ('../../scripts/conn.php');
$sql="SELECT * FROM categories ORDER BY category ASC";

$result = mysql_query($sql) or die(mysql_error());

echo "<table class='tab' width='400'>
<tr>
<th aligh='left'>Categories</th>
<th width='80'>&nbsp;</th>
<th width='80'>&nbsp;</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['category'] . "</td>";
  echo "<td><a href=categories_edit.php?id=" . $row['id'] . ">Edit</a></td>";
  echo "<td>Delete</td>";
  echo "</tr>";
  }
echo "</table>";
?> 