
<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 */

include "includes/header.php";
include "includes/sideNav.php";

$db = new SQLite3('./admin/api/.db.db');
$res = $db->query('SELECT * FROM notifications');
while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
	$data[]=$row;
}
$jsondata = json_encode($data, true);

$json = json_decode($jsondata, true);
echo "<style>
.pbody ,.phead ,.pfoot{background:black; color:white;}
.pmain{background:white; color:black;}
.ptop{color:white;}
</style>";
echo "</br>";
echo "<div class=\"container\">";
echo "  <center class=\"ptop\"><h1>Notifications</h1></center>";
echo "</br>";
echo "  <div class=\"panel-group\">";
foreach ($json as $key => $value) {
	$title = $value["Title"];
	$description = $value["Description"];
	$CreateDate = $value["CreateDate"];
	echo "<div class=\"panel pmain\">";
	echo "  <div class=\"panel-heading phead\"><center><h2>$title</h2></center></div>";
	echo "  <div class=\"panel-body pbody\">$description</div>";
	echo "  <div class=\"panel-footer pfoot\"><center>Created on $CreateDate</center></div>";
	echo "</div>";
	}
echo "</div>";
echo "</div>";
echo "</div>";
include "includes/footer.php";

?>


