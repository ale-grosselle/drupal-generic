<div id="dialog-form" title="Registration Dialog" class="included">
	<p class="waiting">
		<img src="<?php print  base_path() . path_to_theme('inceptio') . '/templates/pages/sendMailAdmin/images/spinner.gif'; ?>">
		Waiting...
	</p>
	<p class="error validateTips">All required fields must be filled!</p>
	<div class="details">
		<p style="text-align: center; font-weight: bold;">
			MAIL sent correctly!
		</p>
	</div>
</div>


<div class="container included" style="background-color: white;">
	<div class="row form-papers">
		<form id="send-registration" class="fw_normal"  method="post" action="">
			<ul>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">From:</label>
					<select id="from-mail">
						<option value="Marco Cosi Stonechange2016<marco.cosi@stonechange2016.com>">marco.cosi@stonechange2016.com</option>
						<option value="Papers Stonechange2016<papers@stonechange2016.com>">papers@stonechange2016.com</option>
						<option value="Registration Stonechange2016<registration@stonechange2016.com>">registration@stonechange2016.com</option>
						<option value="Secretariat Stonechange2016<secretariat@stonechange2016.com>">secretariat@stonechange2016.com</option>
					</select>
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">To:</label>
					<input type="text" name="email" placeholder="To Email" class="text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Title:</label>
					<input type="text" name="title" placeholder="Title" class="text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_25 m_xs_bottom_15">
					<label class="w_full  d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Body:</label>
					<textarea maxlength="600" class="w_full r_corners fw_light height_3" name="body" placeholder="Message"></textarea>
				</li>
			</ul>
			<ul>
				<li class="m_bottom_10" style="text-align: right; margin-top: 20px;">
					<button class="button_type_5 color_blue transparent r_corners fs_medium tr_all m_right_10 m_sm_bottom_10">
						Send mail
					</button>
				</li>
			</ul>
		</form>
	</div>
</div>

<script src="<?php print  base_path() . path_to_theme('inceptio') . '/templates/pages/sendMailAdmin/main.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/templates/pages/sendMailAdmin/dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery-ui-1.11.4.custom/jquery-ui.css';?>">
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery-ui-1.11.4.custom/jquery-ui.js';?>"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>