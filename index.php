<?php
session_start();

$_SESSION["server"] = "http://redworld.pro:8880";
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 */

include "includes/header.php";
if (isset($_SESSION["webTvplayer"]) && !empty($_SESSION["webTvplayer"])) {
    echo "<script>window.location.href = 'dashboard.php';</script>";
    exit;
}
$cookieusername = isset($_COOKIE["username"]) ? $_COOKIE["username"] : "";
$FinalUsername = isset($_GET["username"]) ? $_GET["username"] : $cookieusername;
$cookiepassword = isset($_COOKIE["userpassword"]) ? base64_decode($_COOKIE["userpassword"]) : "";
$FinalPassword = isset($_GET["password"]) ? $_GET["password"] : $cookiepassword;

$cookieserver = isset($_COOKIE["server"]) ? $_COOKIE["server"] : "";
$Finalserver = isset($_GET["server"]) ? $_GET["server"] : $cookieserver;

echo "<style type=\"text/css\">\r\n  .addborder {\r\n      border: 1px solid red !important;\r\n  }\r\n  .hideOnload\r\n  {\r\n    display: none !important;\r\n  }\r\n  div#FailLOginMessage {\r\n      position: fixed;\r\n      top: -100%;\r\n      text-align: center;\r\n      left: 35%;\r\n      width: 30%;\r\n  }\r\nbody{background:black;}</style>\r\n<!-- <nav class=\"navbar navbar-inverse navbar-static-top\">\r\n    <div class=\"container full-container navb-fixid\">\r\n      <div class=\"navbar-header\">\r\n        \r\n      </div>\r\n      <a class=\"\" href=\"#\"><img class=\"img-responsive\" src=\"img/logo.png\" alt=\"\" width=\"187px\"></a>\r\n      \r\n     //.nav-collapse\r\n    </div>\r\n  </nav> -->\r\n  <div class=\"alert alert-danger \" id=\"FailLOginMessage\">\r\n      <strong>Error!</strong> <span id=\"ErrorText\">Invalid Details</span>\r\n  </div>\r\n<div class=\"container-fluid\">\r\n        <!-- Login Wrapper -->\r\n        <center><a href=\"dashboard.php\"><img class=\"img-responsive\" src=\"";
echo isset($XClogoLinkval) && !empty($XClogoLinkval) ? $XClogoLinkval : "img/logo.png";
echo "\" alt=\"\" onerror=\"this.src='img/logo.png';\" width=\"200px\" style=\"margin-top: 40px;\"></a>\r\n        </center>\r\n          <div class=\"midbox\">\r\n            <h3>Login With Your Account</h3>\r\n<form>\r\n";

$db = new SQLite3('./admin/api/.db.db');
$res = $db->query('SELECT * FROM dns');
$rows = $db->query("SELECT COUNT(*) as count FROM dns");
$row = $rows->fetchArray();
$numRows = $row['count'];

if ($numRows === 0){
	echo "<div class=\"form-group\">";
	echo "	<select class=\"form-control logininputs\" id=\"input-server\"";
	echo "style=\"display:none\">";
	echo "<option value=\"\"></option>";
	echo "</select></div> ";
	}
if ($numRows === 1){
	echo "<div class=\"form-group\">";
	echo "	<select class=\"form-control logininputs\" id=\"input-server\"";
	$rowb = $res->fetchArray(SQLITE3_ASSOC);
	echo "style=\"display:none\">";
	echo "<option value=\"{$rowb['url']}\"></option>";
	echo "</select></div> ";
	}
else{
	echo "<div class=\"form-group\">";
	echo "	<label>Select Service</label>";
	echo "	<select class=\"form-control logininputs\" id=\"input-server\"";
	echo ">";
	while ($rowb = $res->fetchArray(SQLITE3_ASSOC)) {
		echo "<option value=\"{$rowb['url']}\">";
		echo $rowb['title'];
		echo "</option>";
		}
	echo "</select></div> ";
	}
echo $Finalserver;
echo"	<div class=\"form-group\">\r\n                <label>Username</label>\r\n                <input type=\"username\" class=\"form-control logininputs\" id=\"input-login\" placeholder=\"Username\" value=\"";
echo $FinalUsername;
echo "\">\r\n              </div>\r\n              <div class=\"form-group\">\r\n                <label>Password</label>\r\n                <input type=\"password\" class=\"form-control logininputs\" id=\"input-pass\" placeholder=\"Password\" value=\"";
echo $FinalPassword;
echo "\">\r\n              </div>\r\n              <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-6 form_left\">\r\n                <div class=\"checkbox checkbox_new\">\r\n                  <label>\r\n                    <input type=\"checkbox\" id=\"rememberMe\"> Remember me\r\n                  </label>\r\n                </div>\r\n              </div>\r\n              <div class=\"form-group\">\r\n                <button type=\"submit\" class=\"btn btn-ghost webtvloginprocess rippler rippler-default\">LOGIN <i class=\"fa fa-spin fa-spinner hideOnload\" id=\"loginProcessIcon\"></i></button>\r\n              </div>\r\n            </form>\r\n          </div>\r\n        <!-- /Login Wrapper -->\r\n      </div>\r\n      ";


include "includes/footer.php";
?>
