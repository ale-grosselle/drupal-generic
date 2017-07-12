<?php
$slides = getAllNodes("slideshow", false, true, true);
$html = "";
foreach($slides as $s){
	$healthy = array();
	$yummy = array();
	$rows = "";
	$val = getValue($s->field_textrow);

	$r = '<p class="color_light m_bottom_25 m_sm_bottom_5">{TEXT}</p>';
	if(is_array($val)){
		foreach($val as $row){
			$rows .= str_ireplace("{TEXT}", $row, $r);
		}
	}else{
		$rows .= str_ireplace("{TEXT}", $val, $r);
	}


	array_push($healthy, "{IMAGE}");
	array_push($healthy, "{BIG}");
	array_push($healthy, "{BIGGEST}");
	array_push($healthy, "{TEXT}");
	array_push($healthy, "{BUTTON}");
	array_push($healthy, "{VISIBLE_BUTTON}");

	array_push($yummy, getUrlImage($s->field_image, "slideshow"));
	array_push($yummy, getValue($s->field_bigtest));
	array_push($yummy, getValue($s->field_biggesttest));
	array_push($yummy, $rows);
	$url = getValue($s->field_related_content);
	array_push($yummy, getUrlFromNid($url));
	array_push($yummy, (isset($url) && $url != "") ? "inline": "none");
	$html = $html . getTemplate("slideshows/slideshow", $healthy, $yummy);
}
print $html;
