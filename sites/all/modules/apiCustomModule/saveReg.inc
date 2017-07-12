<?php
$errors = array();

function mailReg($from, $to, $subject, $body){
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: " . $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion();
	mail($to , $subject, $body, $headers);
}

function sendMailReg($user){
	if(!$user)
		$user = getNodeFromId(122);
	$body = file_get_contents("http://www.stonechange2016.com/mails/newregistrant.html");
	$fullname = getValue($user->field_signature) . " " . getValue($user->field_name) . " " . getValue($user->field_surname);
	$body = str_ireplace("{FULLNAME}", $fullname, $body);
	$body = str_ireplace("{NAME}", $fullname, $body);
	//Set Company
	$company = getValue($user->field_companyname);
	$dep = getValue($user->field_companydepartment);
	if(isset($dep) && trim($dep) != ""){
		$company .= " - " . getValue($user->field_companydepartment);
	}
	$body = str_ireplace("{COMPANY}", $company, $body);

	//Set Phone
	$phone = getValue($user->field_phone);
	$mobile = getValue($user->field_mobile);
	$body = str_ireplace("{PHONE}", $phone, $body);
	$body = str_ireplace("{MOBILE}", $mobile, $body);

	//Set Mail
	$email = getValue($user->field_mail);
	$alternativeMail = getValue($user->field_alternativeemail);
	$body = str_ireplace("{MAIL}", $email, $body);
	if(isset($alternativeMail) && trim($alternativeMail) != ""){
		$body = str_ireplace("{ALTERNATIVE_MAIL}", $alternativeMail, $body);
	}else{
		$body = str_ireplace("{ALTERNATIVE_MAIL}", "-", $body);
	}

	//Web Site
	$website = getValue($user->field_website);
	if(isset($alternativeMail) && trim($alternativeMail) != ""){
		$body = str_ireplace("{WEBSITE}", $website, $body);
	}else{
		$body = str_ireplace("{WEBSITE}", "-", $body);
	}

	//Address
	$address = getValue($user->field_address);
	$body = str_ireplace("{ADDRESS}", $address, $body);

	//Payment Fee
	$payment = getValue($user->field_payment_type);
	$body = str_ireplace("{PAYFEE}", $payment, $body);

	//Ticket Price
	$price = getValue($user->field_ticket_price);
	$body = str_ireplace("{PRICE}", $price, $body);

	//Registration Type
	$regType = getValue($user->field_tickets);
	$regType .=  " - " . getValue($user->field_ticketstype);
	$body = str_ireplace("{REGFEE}", $regType, $body);

	//Wants shuttle
	$stayInHotel = getValue($user->field_stayinhotel);
	$body = str_ireplace("{STAY_IN_HOTEL}", $stayInHotel == "1" ? "YES" : "NO", $body);
	$shuttle = getValue($user->field_wantsshuttle);
	$body = str_ireplace("{SHUTTLE}", $shuttle == "1" ? "YES" : "NO", $body);
	$confTrip = getValue($user->field_stayinhotel);
	$body = str_ireplace("{CONFERENCE_TRIP}", $confTrip == "1" ? "YES" : "NO", $body);
	$paper = getValue($user->field_havepaper);
	$body = str_ireplace("{HAVE_PAPER}", $paper == "1" ? "YES" : "NO", $body);

	$paperSession = "-";
	if($paper == "1"){
		$paperSession = getValue($user->field_havepaperinsession);
	}
	$body = str_ireplace("{SESSION}", $paperSession, $body);


	$from = '"Registration STONECHANGE2016" <registration@stonechange2016.com>';
	$send = $email;
	$params = array(
		'subject' => "StoneChange2016 - New registration " . $fullname,
		'body' => $body
	);
	mailReg($from, $send, "StoneChange2016 - New registration " . $fullname, $body);
	//drupal_mail("apiCustomModule", "new-registrer", $send, language_default(), $params, $from);
	//Send to Organizer:
	$org = "marco.cosi@stonechange2016.com; registration@stonechange2016.com";
	mailReg($from, $org, "new-registrer " . $fullname, $body);
	//drupal_mail("apiCustomModule", "new-registrer", $org, language_default(), $params, $from);

}

function saveRegister(){
	$mandatory = array(
		"name" => htmlspecialchars($_POST['name']),
		"surname" => htmlspecialchars($_POST['surname']),
		"phone-city-code" => htmlspecialchars($_POST['phone-city-code']),
		"phone-country-code" => htmlspecialchars($_POST['phone-country-code']),
		"phone-number" => htmlspecialchars($_POST['phone-number']),
		"mobile-country-code" => htmlspecialchars($_POST['mobile-country-code']),
		"mobile-city-code" => htmlspecialchars($_POST['mobile-city-code']),
		"mobile-number" => htmlspecialchars($_POST['mobile-number']),
		"email" => htmlspecialchars($_POST['email']),
		"street" => htmlspecialchars($_POST['street']),
		"zip" => htmlspecialchars($_POST['zip']),
		"city" => htmlspecialchars($_POST['city']),
		"country" => htmlspecialchars($_POST['country']),
		"payment-type" => htmlspecialchars($_POST['payment-type']),
		"ticket-type" => htmlspecialchars($_POST['ticket-type']),
		"company-name" => htmlspecialchars($_POST['company-name']),
		"stay-in-hotel" => htmlspecialchars($_POST['stay-in-hotel']),
		"shuttle-airport" => htmlspecialchars($_POST['shuttle-airport']),
		"conference-trip" => htmlspecialchars($_POST['conference-trip']),
	);
	validate($mandatory);
	if(sizeof($GLOBALS["errors"]) == 0){
		$user = createUser();
		sendMailReg($user);
		print(drupal_json_output([]));
	}else{
		print(drupal_json_output($GLOBALS['errors']));
	}
}

function createUser(){
	$els = $_POST;
	$user = new stdClass();  // Create a new node object;
	node_object_prepare($user);  //Set some default values
	$user->type = "registrant";
	$user->language = "und";  // Or e.g. 'en' if locale is enabled

	$user->field_name[$user->language][0]['value']  = $els["name"];
	$user->field_surname[$user->language][0]['value']  = $els["surname"];
	$user->field_signature[$user->language][0]['value']  = $els["signature"];
	$user->title = $els["signature"] . ". " . $els["name"] . " " . $els["surname"];
	$user->field_companyname[$user->language][0]['value'] = $els["company-name"];
	$user->field_companydepartment[$user->language][0]['value'] = $els["company-department"];

	$user->field_phone[$user->language][0]['value'] = $els["phone-country-code"] . $els["phone-city-code"] .$els["phone-number"];
	$user->field_mobile[$user->language][0]['value'] = $els["mobile-country-code"] . $els["mobile-city-code"] .$els["mobile-number"];

	$user->field_mail[$user->language][0]['value'] = $els["email"];
	$user->field_alternativeemail[$user->language][0]['value'] = $els["alternative-email"];
	$user->field_website[$user->language][0]['value'] = $els["website"];

	$user->field_address[$user->language][0]['value'] = $els["street"] . " " . $els["zip"];
	$user->field_address[$user->language][0]['value'] .= ', ' . $els["city"] . ", " . $els["state"];
	$user->field_address[$user->language][0]['value'] .= ', ' . $els["country"];

	$user->field_payment_type[$user->language][0]['value'] = $els["payment-type"];
	//Ticket Type
	$user->field_tickets[$user->language][0]['value'] = "";
	$t = explode(",", $els["ticket-type"]);
	$stone = false;
	if($t[0] == "true"){
		$user->field_tickets[$user->language][0]['value'] .= "StoneChange 2016";
		$stone = true;
	}
	if($t[1] == "true"){
		if($stone)
			$user->field_tickets[$user->language][0]['value'] .= ", PERC Training Course";
		else
			$user->field_tickets[$user->language][0]['value'] = "PERC Training Course";
	}
	$user->field_tickets_type[$user->language][0]['value'] = $t[2];
	//Price
	$user->field_ticket_price[$user->language][0]['value'] = getPriceVal($t[1], $t[0], $t[2]) . "&#8364;";

	$user->field_wantsshuttle[$user->language][0]['value'] = ($els["shuttle-airport"] == "true") ? true : false;
	$user->field_stayinhotel[$user->language][0]['value'] = ($els["stay-in-hotel"] == "true") ? true : false;
	$user->field_conferencefieldtrip[$user->language][0]['value'] = ($els["conference-trip"] == "true") ? true : false;
	$user->field_havepaper[$user->language][0]['value'] = isset($els["i-have-paper"]) ? true : false;
	$user->field_havepaperinsession[$user->language][0]['value'] = $els["session-request"];
	$user->field_is_free[$user->language][0]['value'] = $els["free-stonechange-conf"];

	node_save($user);
	return $user;
}

function validateTicket($mandatory){
	$company = $mandatory["ticket-type"];
	if(preg_replace('/\s+/', '', $company) != ""){
		$el = explode(",", $company);
		if($el[0]== "false" && $el[1] == "false")
			$GLOBALS["errors"][] = "ticket-type";
	}
}

function validate($mandatory){
	if(!filter_var($mandatory['email'],FILTER_VALIDATE_EMAIL)){
		$GLOBALS["errors"][] = "email";
	};

	foreach($mandatory as $key => $value){
		if(preg_replace('/\s+/', '', $value) == ""){
			$GLOBALS["errors"][]= $key;
		}
	}
	validateTicket($mandatory);
}
