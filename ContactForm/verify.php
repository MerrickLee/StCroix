<?php

/* Subject and Email Variables */

	$emailSubject = 'Contact About St. Croix Tree Service';
	$webMaster = 'estimates@stcroixtreeservice.com';
	
/* Gathering Data Variables */

	$aField = $_POST['name'];
	$bField = $_POST['address'];
	$cField = $_POST['city'];
	$dField = $_POST['state'];
	$eField = $_POST['zip'];
	$fField = $_POST['hphone'];
	$gField = $_POST['wphone'];
	$hField = $_POST['cphone'];
	$iField = $_POST['email'];
	$jField = $_POST['treeremoval'];
	$kField = $_POST['treepruning'];
	$lField = $_POST['drf'];
	$mField = $_POST['brushhauling'];
	$nField = $_POST['lotclearing'];
	$oField = $_POST['phc'];
	$pField = $_POST['treeplanting'];
	$qField = $_POST['brushchipping'];
	$rField = $_POST['stumpgrinding'];
	$sField = $_POST['additionalinformation'];
	
	$body = <<<EOD
Name: $aField <br>
Address: $bField <br>
City: $cField <br>
State: $dField <br>
Zip: $eField <br>
Home Phone: $fField <br>
Work Phone: $gField <br>
Cell Phone: $hField <br>
Email: $iField <br>
Tree Removal: $jField <br>
Tree Pruning: $kField <br>
Deep Root Fertilization: $lField <br>
Brush Hauling: $mField <br>
Lot Clearing: $nField <br>
Plant Health Care: $oField <br>
Tree Planting: $pField <br>
Brush Chipping: $qField <br>
Stump Grinding: $rField <br>
Additional Information: $sField <br>
EOD;

	$headers = "From: $emailField \r\n";
	$headers .= "Content-type: text/html\r\n";
	$success = mail($webMaster, $emailSubject, $body, $headers);
	
/* Results rendered as HTML */

	$theResults = <<<EOD
<html>
<head>
<title>St. Croix Tree Service</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #f1f1f1;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	line-height: normal;
	font-weight: normal;
	color: #666666;
	text-decoration: none;
}
-->
</style>
</head>

<div>
  <div align="left">Thank you for your interest! Your email will be answered very soon!</div>
</div>
</body>
</html>
EOD;
echo "$theResults";


?>