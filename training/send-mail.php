<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
if(!$APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_code"])) {
	echo 1; // Неправильная капча
} else {
	$arEventFields = [
		"EMAIL" => $_POST['email'],
		"SEMINAR" => $_POST['seminar'],
		"LINK" => $_POST['link'],
		"DATE" => $_POST['date'],
		"DURATION" => $_POST['duration'],
		"TIMEZONE" => $_POST['timezone']
	];
	CEvent::Send("TRAINING_REGISTER_EN_NEW", "s5", $arEventFields); //177
	$arEventFields = [
		"DATE" => date('d.m.y H:i:s'),
		"EMAIL" => $_POST['email'],
		"SURNAME" => $_POST['surname'],
		"NAME" => $_POST['name'],
		"COMPANY" => $_POST['company'],
		"COUNTRY" => $_POST['country'],
		"SEMINAR" => $_POST['seminar']
	];
	CEvent::Send("TRAINING_REGISTER_NOTE_EN_NEW", "s5", $arEventFields); //178
	if (CModule::IncludeModule("iblock")) {
		$rsStudent = CIBlockElement::GetList(
			['ACTIVE_FROM' => 'DESC'],
			['IBLOCK_CODE' => 'students_en', 'ACTIVE' => 'Y', 'NAME' => $_POST['email']],
			false,
			false,
			['ID', 'IBLOCK_ID', 'NAME']
		);
		if ($arStudent = $rsStudent->GetNextElement()) {
			$arStudentFields = $arStudent->GetFields();
			$arStudentProps = $arStudent->GetProperties();
			if (in_array($_POST['id'], $arStudentProps['SEMINAR']['VALUE'])) {
				echo 2;  // Уже зарегистрирован на семинар
				exit;
			}
			$el = new CIBlockElement;
			$PROP = array();
			$PROP[676] = $_POST['surname'];
			$PROP[677] = $_POST['name'];
			$PROP[678] = $_POST['company'];
			$PROP[679] = $_POST['country'];
			$PROP[680] = $arStudentProps['SEMINAR']['VALUE'];
			$PROP[680][] = $_POST['id'];
			$arLoadProductArray = Array(
				"PROPERTY_VALUES"=> $PROP
			);
			$el->Update($arStudentFields['ID'], $arLoadProductArray);
			echo 0;  // Успешно зарегистрировался на семинар
			exit;
		}
		
		$el = new CIBlockElement;
		$PROP = array();
		$PROP[676] = $_POST['surname'];
		$PROP[677] = $_POST['name'];
		$PROP[678] = $_POST['company'];
		$PROP[679] = $_POST['country'];
		$PROP[680] = $_POST['id'];
		$arLoadProductArray = Array(
			"IBLOCK_SECTION_ID" => false,
			"IBLOCK_ID"      => 96,
			"PROPERTY_VALUES"=> $PROP,
			"NAME"           => $_POST['email'],
			"ACTIVE"         => "Y",
			"PREVIEW_TEXT"   => "",
			"DETAIL_TEXT"    => ""
		);
		$el->Add($arLoadProductArray);
	}
	echo 0; // Успешно зарегистрировался на семинар
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>