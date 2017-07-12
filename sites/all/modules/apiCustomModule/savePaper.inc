<?php
$errorsPaper = array();

function sendMailPaper($user){
	if(!$user)
		$user = getNodeFromId(127);
	$body = file_get_contents("http://www.stonechange2016.com/mails/newpaper.html");
	$fullname = getValue($user->field_name) . " " . getValue($user->field_surname);
	$body = str_ireplace("{NAME}", $fullname, $body);

	//Set Phone
	$phone = getValue($user->field_phone);
	$body = str_ireplace("{PHONE}", $phone, $body);

	//Set Mail
	$email = getValue($user->field_mail);
	$body = str_ireplace("{MAIL}", $email, $body);

	//Set Title
	$title = getValue($user->field_title_presentation);
	$body = str_ireplace("{TITLE}", $title, $body);


	//KeyWords
	$keywords = getValue($user->field_keywords);
	$body = str_ireplace("{KEYWORDS}", $keywords, $body);

	//Address
	$abstract = getValue($user->field_abstract);
	$body = str_ireplace("{ABSTRACT}", $abstract, $body);

	$from = '"Papers STONECHANGE2016" <papers@stonechange2016.com>';
	$send = $email;
	$params = array(
		'subject' => "StoneChange2016 - New proposal paper " . $fullname,
		'body' => $body
	);
	drupal_mail("apiCustomModule", "new-paper", $send, language_default(), $params, $from);
	//Send to Organizer:
	$org = "papers@stonechange2016.com";
	drupal_mail("apiCustomModule", "new-paper", $org, language_default(), $params, $from);

}

function savePaper(){
	$mandatory = array(
		"name" => htmlspecialchars($_POST['name']),
		"surname" => htmlspecialchars($_POST['surname']),
		//"mobile-country-code" => htmlspecialchars($_POST['mobile-country-code']),
		//"mobile-city-code" => htmlspecialchars($_POST['mobile-city-code']),
		//"mobile-number" => htmlspecialchars($_POST['mobile-number']),
		"email" => htmlspecialchars($_POST['email']),
		"title" => htmlspecialchars($_POST['title']),
		"keywords" => htmlspecialchars($_POST['keywords']),
		"abstract" => htmlspecialchars($_POST['abstract'])
	);
	validatePaper($mandatory);
	if(sizeof($GLOBALS["errorsPaper"]) == 0){
		$speech = createSpeaker();
		sendMailPaper($speech);
		print(drupal_json_output([]));
	}else{
		print(drupal_json_output($GLOBALS['errorsPaper']));
	}
}

function createSpeaker(){
	$els = $_POST;
	$user = new stdClass();  // Create a new node object;
	node_object_prepare($user);  //Set some default values
	$user->type = "presentation";
	$user->language = "und";  // Or e.g. 'en' if locale is enabled

	$user->field_name[$user->language][0]['value'] = $els["name"];
	$user->field_surname[$user->language][0]['value'] = $els["surname"];
	$user->title = $els["title"] . " - " . $els["name"] . " " . $els["surname"];
	$user->field_phone[$user->language][0]['value'] = $els["mobile-country-code"] . $els["mobile-city-code"] .$els["mobile-number"];
	$user->field_mail[$user->language][0]['value'] = $els["email"];
	$user->field_title_presentation[$user->language][0]['value'] = $els["title"];
	$user->field_keywords[$user->language][0]['value'] = $els["keywords"];
	$user->field_abstract[$user->language][0]['value'] = $els["abstract"];
	node_save($user);
	return $user;
}


function validatePaper($mandatory){
	if(!filter_var($mandatory['email'],FILTER_VALIDATE_EMAIL)){
		$GLOBALS["errorsPaper"][] = "email";
	};

	foreach($mandatory as $key => $value){
		if(preg_replace('/\s+/', '', $value) == ""){
			$GLOBALS["errorsPaper"][]= $key;
		}
	}
}
