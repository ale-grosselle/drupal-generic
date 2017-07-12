<?php
$errors = array();

function sendMailGenericAction(){
	$body = file_get_contents("http://www.stonechange2016.com/mails/sendmail.html");
	$body = str_ireplace("{BODY}", $_POST['body'], $body);
	$from = $_POST['fromEmail'];
	$send = $_POST['email'];
	$params = array(
			'subject' => $_POST['title'],
			'body' => $body
	);
	drupal_mail("apiCustomModule", "new-mail", $send, language_default(), $params, $from);
}

function sendMailGeneric(){
	if (user_access('administer')){
		$mandatory = array(
			"fromEmail" => htmlspecialchars($_POST['fromEmail']),
			"email" => htmlspecialchars($_POST['email']),
		);
		validateGenericMail($mandatory);
		if(sizeof($GLOBALS["errors"]) == 0){
			sendMailGenericAction();
			print(drupal_json_output([]));
		}else{
			print(drupal_json_output($GLOBALS['errors']));
		}
	}
}


function validateGenericMail($mandatory){
	if(!filter_var($mandatory['email'],FILTER_VALIDATE_EMAIL)){
		$GLOBALS["errors"][] = "email";
	};
	if(!filter_var($mandatory['fromEmail'],FILTER_VALIDATE_EMAIL)){
		$GLOBALS["errors"][] = "fromEmail";
	};

	foreach($mandatory as $key => $value){
		if(preg_replace('/\s+/', '', $value) == ""){
			$GLOBALS["errors"][]= $key;
		}
	}
}
