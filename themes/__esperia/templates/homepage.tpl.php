<?php
$nodeHP = getNodeFromId(68);
$nodeButton = getNodeFromId(69);
$nodeButton = $nodeButton->field_buttons["und"];
$btns = array();
foreach($nodeButton as $n){
	$n1 = array();
	$n1["url"] = $n["field_url_to_click2"]["und"][0]["value"];
	$n1["text"] = $n["field_text"]["und"][0]["value"];
	array_push($btns, $n1);
}
$imgsSlideshow = getUrlImages($nodeHP->field_image, "720x480");
?>
<!--content-->
<!--<section>
	<div class="container" style="width: 98%">
		<div class="row" style="margin-top: 10px;">
			<div class="organiser col-lg-6 col-md-6 col-sm-6 m_xs_bottom_30">
				<span class="color_dark tt_uppercase">
					<?php /*print(t("Organisers")); */?>:
				</span>
				<div>
					<?php /*printSlides("organiser"); */?>
				</div>
			</div>
			<div class="coordinator col-lg-6 col-md-6 col-sm-6 m_xs_bottom_30">
				<span class="color_dark  tt_uppercase">
					<?php /*print(t("Technical Coordinators")); */?>:
				</span>
				<div>
					<?php /*printSlides("technical_coordinators"); */?>
				</div>
			</div>
			<div class="patronage col-lg-6 col-md-6 col-sm-6 m_xs_bottom_30">
				<span class="color_dark tt_uppercase">
				<?php /*print(t("Patronage of")); */?>:
			</span>
				<div>
					<?php /*printSlides("patronage_"); */?>
				</div>
			</div>
		</div>
	</div>
</section>-->
<section style="clear: both;" class="bg_light_2">
	<div class="container" style="width: 98%; font-size: 0;">
		<div class="sponsor sponsor-wrapper">
			<?php include "sponsors/main.php"; ?>
		</div>
		<div class="main-hp">
			<div class="head">
				<div class="news">
					<?php include "news/main.php"; ?>
				</div>
				<div class="carousel">
					<div id="blueimp-gallery-carousel" class="blueimp-gallery blueimp-gallery-carousel">
						<div class="slides">
						</div>
						<h3 class="title"></h3>
						<a class="prev">‹</a>
						<a class="next">›</a>
						<a class="play-pause"></a>
						<ol class="indicator"></ol>
					</div>
				</div>
				<script>
					var carouselLinks = [];
					<?php foreach($imgsSlideshow as $img): ?>
					var urlImg = "<?php print $img; ?>";
					/*var a = $('a'), img = $('img');
					 var urlImg = "<?php print $img; ?>";
					 img.prop('src', urlImg);
					 a.append(img);
					 a.prop('href', urlImg);
					 a.attr('data-gallery', '');*/
					carouselLinks.push({href: urlImg});
					<?php endforeach; ?>
					jQuery(document).ready(
							function(){
								blueimp.Gallery(
										carouselLinks,
										{
											container: '#blueimp-gallery-carousel',
											carousel: true,
											continuous: true
										}
								);
							}
					);
				</script>
			</div>
			<div class="text-hp">
				<?php print getValue($nodeHP->body); ?>
			</div>
		</div>
		<div class="event event-wrapper">
			<?php foreach($btns as $btn) :?>
				<?php $url = (is_numeric($btn["url"]) == true) ? drupal_get_path_alias("node/" . $btn["url"]) : $btn["url"];?>
				<div class="button-event">
					<div class="popup_wrap relative r_corners wrapper d_xs_inline_b" style="width: auto;">
						<div class="inner-button" style="text-align: center;">
						<span class="tt_uppercase main-text">
							<?php print $btn["text"]; ?>
						</span>
							<div class="ghost"></div>
						</div>
						<div class="popup_buttons tr_all_long" style="height: 100%;width: 100%;right: 0;bottom: 0;">
							<a style="height: 100%;width: 100%;" href="<?php print $url ?>" class="jackbox color_light n_sc_hover d_block f_left">
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<div class="button-event big">
				<div class="popup_wrap relative r_corners wrapper d_xs_inline_b" style="width: auto;">
					<div class="inner-button" style="text-align: center;">
						<img src="<?php print  base_path() . path_to_theme('inceptio') . '/courseLogo.png'; ?>"/>
						<div>
							<p class="text">
								Best practice for Assessment and Reporting of Exploration Results, Mineral Resources and Mineral Reserves
							</p>
							<p class="date">
								Carrara 15 June 2016
							</p>
						</div>
					</div>
					<div class="popup_buttons tr_all_long" style="height: 100%;width: 100%;right: 0;bottom: 0;">
						<a  style="height: 100%;width: 100%;" href="<?php print drupal_get_path_alias('node/77'); ?>" class="jackbox color_light n_sc_hover d_block f_left">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<hr class="divider_type_2">
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/Gallery/js/blueimp-gallery.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery.jcarousel.min.js'; ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/Gallery/css/blueimp-gallery.css'; ?>">
