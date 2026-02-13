<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new SQLite3('./api/.db.db');

$res = $db->query("SELECT * 
				  FROM notifications 
				  WHERE id='".$_GET['update']."'");
$row=$res->fetchArray();

if(isset($_POST['submit'])){
$db->exec("UPDATE notifications SET  Title='".$_POST['Title']."', 
								Description='".$_POST['Description']."',
								CreateDate='".$_POST['CreateDate']."' 
						  WHERE 
							  id='".$_POST['id']."'");
$db->close();
header("Location: notifications.php");
}
include ('includes/header.php');
$id = $row['id'];
$Title = $row['Title'];
$Description = $row['Description'];
$CreateDate = $row['CreateDate'];

echo "            <div class=\"col-md-8 px-4\">\n";
echo "              <div class=\"card bg-dark text-white\">\n";
echo "                <div class=\"card-header card-header-warning\">\n";
echo "                  <h4 class=\"card-title\">Add Notification</h4>\n";
echo "                </div>\n";
echo "                <div class=\"card-body\">\n";
echo "                  <form  method=\"post\">\n";
echo "                      <div>\n";
echo "                        <div class=\"form-group\">\n";
echo "                          <label class=\"bmd-label-floating\">Title</label>\n";
echo "						   <input type=\"hidden\" name=\"id\" value=\"$id\">\n";
echo "                          <input type=\"text\" class=\"form-control\" name=\"Title\" value=\"$Title\">\n";
echo "                        </div>\n";
echo "                      </div>\n";
echo "                      <div>\n";
echo "                        <div class=\"form-group\">\n";
echo "                          <label class=\"bmd-label-floating\">Description</label>\n";
echo "                          <input type=\"text\" class=\"form-control\" name=\"Description\" value=\"$Description\">\n";
echo "                        </div>\n";
echo "                      </div>\n";
echo "                      <div>\n";
echo "                        <input type=\"hidden\" name=\"CreateDate\"  value=\"".date("Y-m-d h:i:s")."\">\n";
echo "					<br><button type=\"submit\" name=\"submit\" class=\"btn btn-warning pull-right\">Submit</button>\n";
echo "				</form>\n";
echo "				</div>\n";
echo "              </div>\n";
echo "            </div>\n";
echo "    <br><br><br>\n";
include ('includes/footer.php');
echo "</body>\n";
echo "\n";
echo "</html>\n";
?>