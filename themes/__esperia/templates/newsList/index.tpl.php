<?php
$slides = getAllNodes("article", false, true, true);
$html = "";
foreach($slides as $s){
	$healthy = array();
	$yummy = array();
	$rows = "";

	array_push($healthy, "{TITLE}");
	array_push($yummy, $s->title);

	array_push($healthy, "{URL}");
	array_push($yummy, getUrlFromNid($s->nid));

	$images = getUrlImages($s->field_image, "product_list");
	array_push($healthy, "{IMAGE}");
	array_push($yummy, $images[0]);

	array_push($healthy, "{BRIEF_DESCRIPTION}");
	array_push($yummy, getValue($s->body));

	array_push($healthy, "{DATE}");
	array_push($yummy, date('d/m/Y', getValue($s->changed)));

	date('m/d/Y', 1299446702);

	$html = $html . getTemplate("newsList/index", $healthy, $yummy);
}
print $html;
