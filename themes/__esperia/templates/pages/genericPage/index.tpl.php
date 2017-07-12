<?php
	$body = getValue($node->body);
	$hasInclude = strpos($body, "<?php");
?>
<main style="margin-bottom: 20px;" class="container t_align_c">
	<div class="row">
		<div class="m_xs_bottom_20" style="width: 50%;text-align: center; float: none;display: inline-block;">
			<div class="one" style="display: inline-block">
				<div class="entry-slider">
					<div id="flexslider-about-us" class="flex-container">
						<div class="flexslider">
							<ul class="slides">
								<?php foreach(getUrlImages($node->field_image) as $img): ?>
									<li>
										<img src="<?php print $img; ?>">
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="body">
			<h4 class="subtitle-long">
				<?php print getValue($node->field_subtitle); ?>
			</h4>
			<div class="body-wrapper">
				<?php if($hasInclude) eval('?>' . $body . '<?php;'); else print($body);?>
			</div>
			<?php if(sizeof($node->field_lastimage) > 0): ?>
				<div class="img-footer">
					<img src="<?php print getUrlImage($node->field_lastimage, "footer_page"); ?>"/>
				</div>
			<?php endif; ?>
		</div>
	</div>
</main>

<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/flexslider/jquery.flexslider-min.js'; ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/flexslider/flexslider.css'; ?>">
<script>
	var $div = $(".body-wrapper > div:not(.page-generic-info, .included)");
	if($div.length > 0){
		//var $ghost = $("<div/>").addClass("ghost");
		var img = "<?php print  base_path() . path_to_theme('inceptio') . '/logo.png'; ?>";
		if($div.hasClass("perc"))
			img = "<?php print  base_path() . path_to_theme('inceptio') . '/courseLogo.png'; ?>";
		$img = $("<img/>").attr("src", img);
		$img.prependTo($div);
	}
</script>