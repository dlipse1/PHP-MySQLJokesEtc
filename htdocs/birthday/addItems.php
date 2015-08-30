<!DOCTYPE html>
<?php
//addItem controller
require_once("db.inc.php");

$item = ($_GET["item"]);
$id = ($_GET["id"]);
$result = WishDB::getInstance()->add_stuff($item, $id);

if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


mysqli_free_result($result);

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
	
    <body>
	<br>
	party Stuff of Isaac Lipsey <br>
        
		
		<table border="black">
    <tr>
        <th>ID</th>
        <th>Item</th>
    </tr>
	<?php
	 $user = 1;
$result = WishDB::getInstance()->get_items_by_wisher_id($user);
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . htmlentities($row["id"]) . "</td>";
    echo "<td>" . htmlentities($row["items"]) . "</td></tr>\n";
}
mysqli_free_result($result);
mysqli_close($con);
?>
	
	
	
</table>
		
    </body>
</html>
	
	

