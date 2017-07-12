<div class="text">
	<?php if($node->body["und"]) print $node->body["und"][0]["value"]?>
</div>
<!-- begin content -->
<section id="content">
	<div class="container clearfix">
		<!-- begin our company -->
		<section style="text-align: center">
			<div style="max-width: 600px; display: inline-block">
				<div class="entry-slider">
					<div id="flexslider-about-us" class="flex-container">
						<div class="flexslider">
							<ul class="slides">
								<?php foreach (getUrlImages($node->field_image, "carousel__700x445_") as $key => $value): ?>
									<li>
										<img src="<?php echo $value ?>">
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
