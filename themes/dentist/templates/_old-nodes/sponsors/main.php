<?php
	$ns = array();
	$nodes = getAllNodes("sponsor");
	$url = drupal_get_path_alias("node/79");
	foreach($nodes as $n){
		$val = getValue($n->field_type_of_sponsor);
		if(isset($val)){
			$val = strtolower($val);
			$newEl = array();
			if(!isset($ns[$val]))
				$ns[$val] = array();
			$newEl["img"] = getUrlImage($n->field_image);
			$newEl["link"] = getValue($n->field_link);
			$newEl["isDemo"] = getValue($n->field_is_demo) == "1" ? true : false;
			$newEl["isDemo2"] = getValue($n->field_is_demo);
			if($newEl["isDemo"])
				array_push($ns[$val], $newEl);
			else
				array_unshift($ns[$val], $newEl);
		}
	}
?>
<div class="event" style="width: 100%">
	<div class="button-event">
		<div class="popup_wrap relative r_corners wrapper d_xs_inline_b" style="width: auto;">
			<div class="inner-button" style="text-align: center;">
						<span class="tt_uppercase main-text">
							BECOME A SPONSOR
						</span>
				<div class="ghost"></div>
			</div>
			<div class="popup_buttons tr_all_long" style="height: 100%;width: 100%;right: 0;bottom: 0;">
				<a style="height: 100%;width: 100%;" href="<?php print $url; ?>" class="jackbox color_light n_sc_hover d_block f_left">
				</a>
			</div>
		</div>
	</div>
</div>
<div id="owl-sponsor" class="owl-carousel owl-theme" data-plugin-options='{"pagination": true, "navigation": true, "autoPlay": true}'>
	<div class="page-sponsor gold">
		<span class="sponsor-detail">GOLD SPONSOR</span>
		<?php foreach ($ns["gold"] as $g): ?>
			<a href="<?php print $g["link"]?>" class="<?php $g["isDemo"] ? print "demo" : print ""?>  sponsor">
				<img src="<?php print $g["img"]?>">
			</a>
		<?php endforeach; ?>
		<span class="sponsor-detail">SILVER SPONSOR</span>
		<?php foreach ($ns["silver"] as $g): ?>
			<a href="<?php print $g["link"]?>" class="<?php $g["isDemo"] ? print "demo" : print ""?>  sponsor">
				<img src="<?php print $g["img"]?>">
			</a>
		<?php endforeach; ?>
		<span class="sponsor-detail">BRONZE SPONSOR</span>
		<?php foreach ($ns["bronze"] as $g): ?>
			<a href="<?php print $g["link"]?>" class="<?php $g["isDemo"] ? print "demo" : print ""?>  sponsor">
				<img src="<?php print $g["img"]?>">
			</a>
		<?php endforeach; ?>
	</div>
</div>
