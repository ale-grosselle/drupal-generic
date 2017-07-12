<?php

function getPriceVal($p = "false", $s = "false", $type = null, $free = null){
	$first = new DateTime('03/31/2016 23:59');
	$last = new DateTime('05/30/2016 23:59');
	$stoneChange = array();
	$stoneChange["standard"] = array();
	$stoneChange["discounted"] = array();
	$stoneChange["student"] = array();
	$stoneChange["standard"][] = 250;
	$stoneChange["standard"][] = 300;
	$stoneChange["standard"][] = 350;
	$stoneChange["discounted"][] = 200;
	$stoneChange["discounted"][] = 250;
	$stoneChange["discounted"][] = 300;
	$stoneChange["student"][] = 50;
	$stoneChange["student"][] = 100;
	$stoneChange["student"][] = 150;

	$perc = array();
	$perc["standard"][] = 250;
	$perc["standard"][] = 250;
	$perc["standard"][] = 250;
	$perc["discounted"][] = 200;
	$perc["discounted"][] = 200;
	$perc["discounted"][] = 200;
	$perc["student"][] = 50;
	$perc["student"][] = 50;
	$perc["student"][] = 50;

	$all = array();
	$all["standard"] = array();
	$all["discounted"] = array();
	$all["student"] = array();
	$all["free"] = array();
	$all["standard"][] = 400;
	$all["standard"][] = 450;
	$all["standard"][] = 500;
	$all["discounted"][] = 300;
	$all["discounted"][] = 350;
	$all["discounted"][] = 400;
	$all["student"][] = 80;
	$all["student"][] = null;
	$all["student"][] = 100;

	if(isset($_REQUEST['perc']))
		$p = $_REQUEST['perc'];
	if(isset($_REQUEST['stoneChange']))
		$s = $_REQUEST['stoneChange'];
	if(isset($_REQUEST['free']) && ($_REQUEST['free'] == 'true' || $_REQUEST['free'] === true))
		$free = true;

	if($free){
		if(isset($p) && $p == "true")
			$req = $perc;
		else
			return 0;
	}else{
		$req = ($p == "true" && $s == "true") ? $all : null;
		if(!isset($req)){
			if(isset($p) && $p == "true")
				$req = $perc;
			if(isset($s) && $s == "true")
				$req = $stoneChange;
		}
	}

	if(isset($_REQUEST['type']))
		$type = $_REQUEST['type'];
	if(!isset($req[$type])) return null;

	$req = $req[$type];
	$ts = new DateTime();
	if($first >= $ts){
		return $req[0];
	}
	if($last >= $ts){
		return $req[1];
	}
	return $req[2];
}

function getPrice($p = "false", $s = "false"){
	$v = getPriceVal($p, $s, null);
	if(!isset($v)){
		print drupal_json_output(null);
	}
	print drupal_json_output($v);
}




