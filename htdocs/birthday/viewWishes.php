<!DOCTYPE html>
<?php
//controller
require_once("db.inc.php");
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
	
    <body>
	Wish List of Isaac Lipsey <br>
        
		
		<table border="black">
    <tr>
        <th>ID</th>
        <th>Wish</th>
    </tr>
	<?php
	 $user = ($_GET["user"]);
$result = WishDB::getInstance()->get_wishes_by_wisher_id($user);
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . htmlentities($row["id"]) . "</td>";
    echo "<td>" . htmlentities($row["wish"]) . "</td></tr>\n";
}
mysqli_free_result($result);
mysqli_close($con);
?>
	
	
	
</table>
		
    </body>
</html>
