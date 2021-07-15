<?
/* Ответ на успешно отправленные формы */
header('Content-Type: application/json; charset=utf-8');

/*
$_REQUEST=>
	formresult: "addok"
	RESULT_ID: "32"
	WEB_FORM_ID: "2"
*/

if(isset($_REQUEST["formresult"]) && isset($_REQUEST["WEB_FORM_ID"])) { 
	$note = ($_REQUEST["formresult"])? "Ваша заявка успешно отправлена": "Ошибка"; 

	echo json_encode([ "note"=> $note ]);
	die();
}
