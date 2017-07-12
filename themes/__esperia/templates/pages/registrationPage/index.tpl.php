<div id="thx-payment" style="display: none;">
	<div class="details">
		<p style="text-align: center; font-weight: bold;">
			Thanks, payment was successful!
		</p>
	</div>
</div>

<div id="dialog-form" title="Registration Dialog">
	<p class="waiting">
		<img src="<?php print  base_path() . path_to_theme('inceptio') . '/templates/pages/registrationPage/images/spinner.gif'; ?>">
		Waiting...
	</p>
	<p class="error validateTips">All required fields must be filled!</p>
	<div class="details details-bank">
		<p style="text-align: center; font-weight: bold;">
			Thanks, registration was successful!
		</p>
		<p>The bank transfer must be made out to:</p>
		<p>
			Bank name: CARIGE S.p.A – Cassa Risparmio di Genova e Imperia <br/>
			Address: Via Roma, 2 – 54033 Carrara (MS – Italy)  -     Ph. +39.0585.7661<br/>
			SWIFT/BIC code:  CRGEITGG350    -  IBAN:  IT10R0617524510000010554480<br/>
		</p>
	</div>
	<div class="details details-paypal">
		<p style="text-align: center; font-weight: bold;">
			Thanks, data saved successfully!
		</p>
		<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="paypal">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="M886YMUU4E5CU">
			<input type="hidden" name="shopping_url" value="http://www.stonechange2016.com/">
			<input type="hidden" name="return" value="http://www.stonechange2016.com/registration-form?payment=ok">
			<input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal è il metodo rapido e sicuro per pagare e farsi pagare online.">
			<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
		</form>-->
		<p style="text-align: center;">
			Now to complete the registration, please click the button below.
		</p>
		<form target="_self" action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="6NDLH94NHYD3A">
			<table>
				<tr>
					<td>
						<input type="hidden" name="on0" value="REGISTRATION FEES">
						<input type="hidden" name="os0">
					</td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="shopping_url" value="http://www.stonechange2016.com/">
						<input type="hidden" name="return" value="http://www.stonechange2016.com/registration-form?payment=ok">
						<input type="hidden" name="on1" value="Notes and commments">
						Notes and commments:
						<input type="text" name="os1" maxlength="200">
					</td>
				</tr>
			</table>
			<div style="text-align: center;">
				<input type="hidden" name="currency_code" value="EUR">
				<input class="no-border" type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal è il metodo rapido e sicuro per pagare e farsi pagare online.">
				<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
			</div>
		</form>
	</div>
	<div class="details details-credit-card">
		<p style="text-align: center; font-weight: bold;">
			Thanks, registration was successful!
		</p>
		<p style="font-weight: bold;">Payment by credit card will be available from January 31</p>
		<p>
			Bank transfer method<br/>
			Bank name: CARIGE S.p.A – Cassa Risparmio di Genova e Imperia <br/>
			Address: Via Roma, 2 – 54033 Carrara (MS – Italy)  -     Ph. +39.0585.7661<br/>
			SWIFT/BIC code:  CRGEITGG350    -  IBAN:  IT10R0617524510000010554480<br/>
		</p>
		<p>
			<br/>For Payment by phone, <br/>please contact IMM Carrara at +39.0585.787963 or direct  (Marco Ragone) +39.0585.1812443
		</p>
	</div>
	<div class="details details-phone">
		<p style="text-align: center; font-weight: bold;">
			Thanks, registration was successful!
		</p>
		<p>
			For Payment by phone, please contact IMM Carrara at +39.0585.787963 or direct  (Marco Ragone) +39.0585.1812443
		</p>
	</div>
	<div class="details details-free">
		<p style="text-align: center; font-weight: bold;">
			Thanks, registration was successful!
		</p>
		<p>
			FREE REGISTRATION as  first Author of selected Abstract
		</p>
	</div>
</div>


<div class="container">
	<div class="row form-register">
		<form id="send-registration" class="fw_normal"  method="post" action="">
			<ul>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Participant Name:</label>
					<div class="mr custom_select d_inline_m inline_select">
						<div class="select_title r_corners fw_light color_grey w_full">Mr</div>
						<ul class="select_list r_corners wrapper shadow_1 bg_light tr_all"></ul>
						<select class="d_none" id="signature">
							<option value="Mr" selected>Mr</option>
							<option value="Mrs">Mrs</option>
						</select>
					</div>
					<input type="text" name="name" placeholder="Lastname*" class="mandatory text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="surname" placeholder="Firstname*" class="mandatory text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Company/Organisation:</label>
					<input type="text" name="company-name" placeholder="Name*" class="mandatory text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="company-department" placeholder="Department" class="text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_25 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Office phone</label>
					<input type="text" name="phone-country-code" placeholder="Country Code*" class="mandatory min-text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="phone-city-code" placeholder="City Code*" class="mandatory min-text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="phone-number" placeholder="Number*" class="mandatory text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_25 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Mobile phone</label>
					<input type="text" name="mobile-country-code" placeholder="Country Code*" class="mandatory min-text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="mobile-city-code" placeholder="City Code*" class="mandatory min-text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="mobile-number" placeholder="Number*" class="mandatory text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Email:</label>
					<input type="text" name="email" placeholder="Principal Email*" class="mandatory text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="alternative-email" placeholder="Alternative Email" class="text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Web-site:</label>
					<input type="text" name="website" placeholder="WebSite" class="text-form d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">Postal Adress:</label>
					<input type="text" name="street" placeholder="Street and Number*" class="mandatory text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="zip" placeholder="Postal Code*" class="mandatory min-text-form  d_inline_m r_corners" form="form_1">
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<label class="d_inline_m d_sm_block w_sm_auto m_sm_bottom_5"></label>
					<input type="text" name="city" placeholder="City/Town*" class="mandatory text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="state" placeholder="State" class="text-form d_inline_m r_corners" form="form_1">
					<input type="text" name="country" placeholder="Country*" class="mandatory text-form d_inline_m r_corners" form="form_1">
				</li>
			</ul>
			<div class="fee-wrapper">
				<div class="fee-title">
					<p class="mandatory">
						<?php print(t("REGISTRATION FEE*"));?>
					</p>
					<p>
						<span><?php print(t("Total:"));?></span>
						<span id="price-item">-</span> &#8364;
					</p>
				</div>
				<div class="container-fee">
					<div class="stone-change fee bordered main-type-ticket">
						<div class="logo-fee">
							<img src="<?php print  base_path() . path_to_theme('inceptio') . '/logo.png'; ?>">
						</div>
						<div class="group-button payment">
							<div class="standard button_type_1 color_purple transparent r_corners fs_medium tr_all f_left m_right_10 m_sm_bottom_10">
								<div class="overlay"></div>
								Standard
							</div>
							<div class="discounted button_type_1 color_purple transparent r_corners fs_medium tr_all f_left m_right_10 m_sm_bottom_10">
								<div class="overlay"></div>
								Discounted
							</div>
							<div class="student button_type_1 color_purple transparent r_corners fs_medium tr_all f_left m_right_10 m_sm_bottom_10">
								<div class="overlay"></div>
								Student
							</div>
							<div id="free-btn-id" class="free button_type_1 color_purple transparent r_corners fs_medium tr_all f_left m_right_10 m_sm_bottom_10">
								<div class="overlay"></div>
								Free(#)
							</div>
						</div>
						<div style="margin: 10px 0; display: block; clear: both;">
								<span style="font-size: 12px;">
									(#): FREE REGISTRATION only for one author of accepted abstracts
								</span>
						</div>
					</div>
					<div class="perc fee bordered main-type-ticket">
						<div class="logo-fee">
							<img src="<?php print  base_path() . path_to_theme('inceptio') . '/courseLogo.png'; ?>">
						</div>
						<div class="group-button payment">
							<div class="standard button_type_1 color_purple transparent r_corners fs_medium tr_all f_left m_right_10 m_sm_bottom_10">
								<div class="overlay"></div>
								Standard
							</div>
							<div class="discounted button_type_1 color_purple transparent r_corners fs_medium tr_all f_left m_right_10 m_sm_bottom_10">
								<div class="overlay"></div>
								Discounted
							</div>
							<div class="student button_type_1 color_purple transparent r_corners fs_medium tr_all f_left m_right_10 m_sm_bottom_10">
								<div class="overlay"></div>
								Student
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="payment-list-container" class="fee-wrapper">
				<div class="fee-title">
					<p class="mandatory">
						<?php print(t("PAYMENT Type*"));?>
					</p>
				</div>
				<div class="container-fee bordered payment-main">
					<div class="perc fee">
						<div class="group-button payment-methods">
							<div id="by-paypal-credit-cards" class="button_type_1 color_purple transparent r_corners fs_medium tr_all f_left m_right_10 m_sm_bottom_10">
								Paypal & Credit Cards
							</div>
							<div id="bank" class="button_type_1 color_purple transparent r_corners fs_medium tr_all f_left m_right_10 m_sm_bottom_10">
								Bank transfer
							</div>
							<div id="by-phone" class="button_type_1 color_purple transparent r_corners fs_medium tr_all f_left m_right_10 m_sm_bottom_10">
								By Phone
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" class="payment-type" name="payment-type" value="">
			<input type="hidden" class="ticket-type" name="ticket-type" value="">
			<input type="hidden" class="ticket-type" name="free-stonechange-conf" value="">
			<ul class="key-info bordered">
				<li class="m_bottom_15 m_xs_bottom_15">
					<span class="stay-in-hotel big-label d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">
						<?php print(t("I will stay in one of the Conference/Course Hotels. I’ll communicate its name ASAP, after booking.*")) ?>
					</span>
					<div class="group" style="display: inline-block; vertical-align: middle;">
						<input type="radio" id="check_conf_yes" value="true" name="stay-in-hotel" class="d_none">
						<label for="check_conf_yes" style="margin:10px;">Yes</label>
						<input type="radio" id="check_conf_no" value="false" name="stay-in-hotel" class="d_none">
						<label for="check_conf_no" style="margin:10px;">No</label>
					</div>
					<div class="ghost"></div>
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<span class="shuttle-airport big-label d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">
						<?php print(t("I require shuttle service from the airport. I’ll communicate my flight schedule ASAP*")) ?>
					</span>
					<div class="group" style="display: inline-block; vertical-align: middle;">
						<input type="radio" id="check_conf_yes2" value="true" name="shuttle-airport" class="d_none">
						<label for="check_conf_yes2" style="margin:10px;">Yes</label>
						<input type="radio" id="check_conf_no2" value="false" name="shuttle-airport" class="d_none">
						<label for="check_conf_no2" style="margin:10px;">No</label>
					</div>
					<div class="ghost"></div>
				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<span class="conference-trip big-label d_inline_m d_sm_block w_sm_auto m_sm_bottom_5">
						<?php print(t("I will participate to the Conference Field Trip (afternoon DAY 2)*")) ?>
					</span>
					<div class="group" style="display: inline-block; vertical-align: middle;">
						<input type="radio" id="check_conf_yes3" value="true" name="conference-trip" class="d_none">
						<label for="check_conf_yes3" style="margin:10px;">Yes</label>
						<input type="radio" id="check_conf_no3" value="false" name="conference-trip" class="d_none">
						<label for="check_conf_no3" style="margin:10px;">No</label>
					</div>
					<div class="ghost"></div>

				</li>
				<li class="m_bottom_15 m_xs_bottom_15">
					<input type="checkbox" id="i-have-paper" value="true" name="i-have-paper" class="d_none">
					<label for="i-have-paper" class="big-label d_inline_m m_right_10">
						<span>
							<?php print(t("I introduced a paper/presentation abstract for Session N.")) ?>
						</span>
						<input style="margin-top: -15px;" type="text" name="session-request" placeholder="" class="min-text-form d_inline_m r_corners" form="form_1">
					</label>
				</li>
			</ul>
			<ul>
				<li class="m_bottom_10" style="text-align: right; margin-top: 20px;">
					<button style="width: 200px;" class="button_type_4 color_blue transparent r_corners fs_medium tr_all m_right_10 m_sm_bottom_10">
						Register
					</button>
				</li>
			</ul>
		</form>
	</div>
</div>
<script>
	window.urlPrice = "<?php print  base_path() . path_to_theme('inceptio') . '/templates/pages/registrationPage/server/api.php'; ?>";
</script>

<script src="<?php print  base_path() . path_to_theme('inceptio') . '/templates/pages/registrationPage/main.js'; ?>"></script>
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/templates/pages/registrationPage/dialog.js'; ?>"></script>
<link rel="stylesheet" href="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery-ui-1.11.4.custom/jquery-ui.css';?>">
<script src="<?php print  base_path() . path_to_theme('inceptio') . '/plugins/jquery-ui-1.11.4.custom/jquery-ui.js';?>"></script>