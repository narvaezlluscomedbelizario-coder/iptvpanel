<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 */

include "includes/header.php";
include "includes/sideNav.php";
echo "<style>\r\n.messagePerm\r\n{\r\n    position: absolute;\r\n    width: 70%;\r\n    left: 15%;\r\n}\r\n.dontShow\r\n{\r\n    position: relative;\r\n    bottom: 6px;\r\n    font-size: 11px;\r\n    opacity: 1;\r\n    right: -35px;\r\n    color: #000;\r\n    margin-top: 25px;\r\n}\r\n     \r\n.herelink {\r\n    color: #a039b1;\r\n    font-weight: 600;\r\n}     \r\n</style>\r\n<div class=\"container-fluid\">    \r\n    <div class=\"col-md-10 col-md-offset-1\">\r\n    ";
if ($headerparentcondition == "") {
    echo "        <div class=\"row\">\r\n          <div class=\"col-sm-2\">\r\n          </div>\r\n          <div class=\"col-sm-8\">\r\n            <div class=\"alert alert-warning\" style=\"position: relative;top: 20px;\">\r\n              <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a> \r\n              <strong style=\"font-weight: bold;\">Warning!</strong> \r\n               You don’t have set the PIN for Parental Control . Click here to set it up <a href=\"settings.php\" class=\"herelink\">here</a>\r\n            </div>\r\n          </div>\r\n          <div class=\"col-sm-2\">\r\n          </div>\r\n        </div> \r\n      ";
}
echo "
<style>
.ltv {
   background-image: url(./img/live_tv_background.png); 
    width: 405;
	height: 400px;
    background-size: contain;
    background-size: 80%;
	background-repeat: no-repeat;
}
.ltv:hover
{
	background-image: url(./img/livetv_focused.png); 
}

.mov {
   background-image: url(./img/on_demand_background.png); 
    width: 405;
	height: 400px;
    background-size: contain;
    background-size: 80%;
	background-repeat: no-repeat;
}
.mov:hover
{
	background-image: url(./img/ondemand_focused.png); 
}

.ser {
   background-image: url(./img/catch_background.png); 
    width: 405;
	height: 400px;
    background-size: contain;
    background-size: 80%;
	background-repeat: no-repeat;
}
.ser:hover
{
	background-image: url(./img/catch_up_focused.png); 
}

.fix {
   background-image: url(./img/fix_background.png); 
    width: 405;
  height: 400px;
    background-size: contain;
    background-size: 80%;
  background-repeat: no-repeat;
}
.fix:hover
{
  background-image: url(./img/fix_focused.png); 
}

.SBG {
   background-image: url(./img/green_background.png); 
    width: 220px;
	height: 12px;
    background-size: contain;
    background-size: 100%;
	background-repeat: no-repeat;
	color:white;
    /* padding
       inside the button */
    padding-top: 40px;
    padding-bottom: 90px;
    padding-left: 0px;
    padding-right: 50px;
}

.SBG:hover
{
	background-image: url(./img/green_focused.png); 
	color:orange;
	border-color: #fff;
}
</style>
<center>
<div class=\"home col-md-12 col-sm-12 col-xs-12\">
   <div class=\"col-md-4 col-sm-3 col-xs-12\">
     <a class=\"center-block ltv\" href=\"live.php\"></a>
   </div>
   
   <div class=\"col-md-4 col-sm-3 col-xs-12\">
      <a class=\"center-block mov\" href=\"movies.php\"></a>
   </div>
   
   <div class=\"col-md-4 col-sm-3 col-xs-12\">
      <a class=\"center-block ser\" href=\"series.php\"></a>
   </div>
</center>
<div class=\"col-md-12 col-sm-12 col-xs-12 Mybtns\">
   <div class=\"col-md-4 col-sm-4 col-xs-12\">
     <a class=\"center-block SBG\" id=\"accountModal\"><center><h4><i class=\"fa fa-info\"></i> ACCOUNT</center></h4></a>
   </div>
   
   <div class=\"col-md-4 col-sm-4 col-xs-12\">
     <a class=\"center-block SBG\" href=\"catchup.php\"><center><h4><i class=\"fa fa-clock-o\" ></i> CATCH UP</center></h4></a>
   </div>
   <div class=\"col-md-4 col-sm-4 col-xs-12\">
     <a href=\"\" class=\"center-block logoutBtn SBG\"><center><h4><i class=\"fa fa-sign-out\"></i> LOG OUT</center></h4></a>
   </div>
</div>
";

$ExpiryData = "";
if ($_SESSION["webTvplayer"]["exp_date"] == "null" || $_SESSION["webTvplayer"]["exp_date"] == "") {
    $ExpiryData = "Unlimited";
} else {
    $ExpiryData = date("F d, Y", $_SESSION["webTvplayer"]["exp_date"]);
}
echo "        <h4 class=\"text-center\" style=\"color: #fff; top: 50px; float:left;width: 100%;position: relative;    text-transform: uppercase;\">Expiration: ";
echo $ExpiryData;
echo "</h4>\r\n    </div>\r\n</div>\r\n</div>\r\n";
include "includes/footer.php";

?>