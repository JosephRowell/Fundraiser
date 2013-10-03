<?php
function phpinit() {
function printheader() {
$Canvasser = $_REQUEST["Canvasser"];
$Field_Manager = $_REQUEST["Field_Manager"];
$Municipality = $_REQUEST["Municipality"];
$Day = $_REQUEST["Day"];
$Zip = $_REQUEST["Zip"];

/* $reply = <<<HERE
<p>

Showing results for $Canvasser on $Day in $Municipality \n </p>

HERE; */

print "Showing results for $Canvasser in $Municipality on $Day";

	}
	printheader();
 }
phpinit();
?>
