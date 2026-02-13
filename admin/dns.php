<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new SQLite3('./api/.db.db');

$db->exec("CREATE TABLE IF NOT EXISTS dns(id INTEGER PRIMARY KEY NOT NULL, title VARCHAR(50), url VARCHAR(50))");
$res = $db->query('SELECT * FROM dns');

if(isset($_GET['delete'])){
$db->exec("DELETE FROM dns WHERE id=".$_GET['delete']);
$db->close();
header("Location: dns.php");

}

include ('includes/header.php');

echo "<div class=\"main-panel\">\n";
echo "      <!-- Navbar -->\n";
echo "\n";
echo "    <div class=\"modal fade\" id=\"confirm-delete\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">\n";
echo "        <div class=\"modal-dialog\">\n";
echo "            <div class=\"modal-content\">\n";
echo "                <div class=\"modal-header\">\n";
echo "                    <font color=\"black\"><h2>Confirm</h2></font>\n";
echo "                </div>\n";
echo "                <div class=\"modal-body\">\n";
echo "                    <font color=\"black\">Do you really want to delete?</font>\n";
echo "                </div>\n";
echo "                <div class=\"modal-footer\">\n";
echo "                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancel</button>\n";
echo "                    <a class=\"btn btn-danger btn-ok\">Delete</a>\n";
echo "                </div>\n";
echo "            </div>\n";
echo "        </div>\n";
echo "    </div>\n";
echo "\n";
echo "\n";
echo "<div id=\"main\">\n";
echo "   <br><h2>&nbsp;&nbsp;DNS</h2>\n";
echo "   &nbsp;&nbsp;&nbsp;&nbsp;<a id=\"button\"  href=\"./dns_create.php\" class=\"btn btn-warning\">Create</a><br>\n";
echo "     </div>\n";
echo "      <div class=\"card-body\">\n";
echo "        <div class=\"table-responsive\">\n";
echo "          <table class=\"table\">\n";
echo "            <thead class=\" text-primary\">\n";
echo "                <tr>\n";
echo "                  <th>Title</th>\n";
echo "                  <th>DNS</th>\n";
echo "				  <th>Edit &nbsp&nbsp Delete</th>\n";
echo "                </tr>\n";
echo "              </thead>\n";
				while ($row = $res->fetchArray()) {
					$id = $row['id'];
					$title = $row['title'];
					$url = $row['url'];
echo "              <tbody class=\" text-light\">\n";
echo "                <tr>\n";
echo "                  <td>$title</td>\n";
echo "                  <td>$url</td>\n";
echo "                  <td><a href=\"./dns_update.php?update=$id\"><i class=\"fa fa-pencil-square-o\" style=\"font-size:24px;color:blue\"></i></a>&nbsp&nbsp&nbsp<a href=\"#\" data-href=\"./dns.php?delete=$id\" data-toggle=\"modal\" data-target=\"#confirm-delete\"><i class=\"fa fa-trash-o\" style=\"font-size:24px;color:red\"></i></a></td>\n";
echo "                </tr>\n";
echo "              </tbody>\n";
				};
echo "            </table>\n";
echo "          </div>\n";
echo "		</div>\n";
echo "\n";
echo "</div>\n";
echo "    <br><br><br>\n";
include ('includes/footer.php');
echo "<script>\n";
echo "$('#confirm-delete').on('show.bs.modal', function(e) {";
echo "    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));\n";
echo "});\n";
echo "</script>\n";
echo "</body>\n";
echo "\n";
echo "</html>\n";
?>