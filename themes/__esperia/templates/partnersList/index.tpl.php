<?php
function printSlides($type){
	$slides = getAllNodes($type, false, true, true);
	$html = "";
	foreach($slides as $s){
		$healthy = array();
		$yummy = array();
		$rows = "";

		$images = getUrlImage($s->field_image, "brand_list");
		$url = getValue($s->field_link);
		array_push($healthy, "{LOGO}");
		array_push($yummy, $images);
		array_push($healthy, "{URL}");
		array_push($yummy, $url);

		$html = $html . getTemplate("partnersList/index", $healthy, $yummy);
	}
	print $html;
}
