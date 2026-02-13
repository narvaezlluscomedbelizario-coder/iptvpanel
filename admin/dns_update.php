<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new SQLite3('./api/.db.db');

$res = $db->query("SELECT * 
				  FROM dns 
				  WHERE id='".$_GET['update']."'");
$row=$res->fetchArray();

if(isset($_POST['submit'])){
$db->exec("UPDATE dns SET  title='".$_POST['title']."', 
								url='".$_POST['url']."'
						  WHERE 
							  id='".$_POST['id']."'");
$db->close();
header("Location: dns.php");
}
include ('includes/header.php');
$id = $row['id'];
$title = $row['title'];
$url = $row['url'];


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
echo "                          <input type=\"text\" class=\"form-control\" name=\"title\" value=\"$title\">\n";
echo "                        </div>\n";
echo "                      </div>\n";
echo "                      <div>\n";
echo "                        <div class=\"form-group\">\n";
echo "                          <label class=\"bmd-label-floating\">DNS</label>\n";
echo "                          <input type=\"text\" class=\"form-control\" name=\"url\" value=\"$url\">\n";
echo "                        </div>\n";
echo "                      </div>\n";
echo "                      <div>\n";
echo "					<br><button type=\"submit\" name=\"submit\" class=\"btn btn-warning pull-right\">Submit</button>\n";
echo "				</form>\n";
echo "				</div>\n";
echo "              </div>\n";
echo "            </div>\n";
echo "          </div>\n";
echo "    <br><br><br>\n";
include ('includes/footer.php');
echo "</body>\n";
echo "\n";
echo "</html>\n";
