<div id="dialog-form" title="Registration Dialog" class="included">
	<p class="waiting">
		<img src="<?php print  base_path() . path_to_theme('inceptio') . '/templates/pages/registrationPage/images/spinner.gif'; ?>">
		Waiting...
	</p>
	<p class="error validateTips">All required fields must be filled!</p>
	<div class="details">
		<p style="text-align: center; font-weight: bold;">
			Proposal sent correctly!
		</p>
		<p style="text-transform: lowercase;">
			ACCEPTED SPEECHES, COMMUNICATED TO AUTHORS BEFORE <strong>10th April 2016</strong> <br/>
			SHALL BE FINALLY INTRODUCED IN FORM OF POWER POINT PRESENTATION (PDF format) <br/>
			with SHORT INTRODUCTORY TEXT  BEFORE <strong>20th May 2016</strong>
		</p>
	</div>
</div>


<div class="container included">
	<div class="row form-papers">
		<form id="send-registration" class="fw_normal"  method="post" action="">
			<ul>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Speaker presentation:</label>
					<input type="text" name="name" placeholder="Lastname" class="text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="surname" placeholder="Firstname" class="text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_25 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Phone:</label>
					<input type="text" name="mobile-country-code" placeholder="Country Code" class="min-text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="mobile-city-code" placeholder="City Code" class="min-text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="mobile-number" placeholder="Number" class="text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Email:</label>
					<input type="text" name="email" placeholder="Email" class="text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Title:</label>
					<input type="text" name="title" placeholder="Title" class="text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_25 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">KEY WORDS:</label>
					<input type="text" name="keywords" placeholder="KEY WORDS:" class="text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_25 m_xs_bottom_15">
					<label class="w_full  d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">ABSTRACT (not more than 600 words or 5000 characters):</label>
					<textarea maxlength="5000" class="w_full r_corners fw_light height_3" name="abstract" placeholder="Message"></textarea>
				</li>
			</ul>
			<ul>
				<li class="m_bottom_10" style="text-align: right; margin-top: 20px;">
					<button class="button_type_5 color_blue transparent r_corners fs_medium tr_all m_right_10 m_sm_bottom_10">
						Send proposal
					</button>
				</li>
			</ul>
		</form>
	</div>
</div>

<script src="<?php print  base_path() . path_to_theme('inceptio') . '/templates/pages/callForPapers/main.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/templates/pages/callForPapers/dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery-ui-1.11.4.custom/jquery-ui.css';?>">
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery-ui-1.11.4.custom/jquery-ui.js';?>"></script>