<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$req = json_decode(file_get_contents('php://input'));
$arEventFields = [
	"EMAIL" => $req->email,
	"SEMINAR" => $req->seminar,
	"YOUTUBE" => $req->youtube,
	"DATE" => $req->date,
	"TIME" => $req->time
];
CEvent::Send("TRAINING_REGISTER_EN", "s5", $arEventFields);

if ($req->subscribe !== false) {
	if(CModule::IncludeModule('subscribe')) {
		$subscr = new CSubscription;
		$subscriber = CSubscription::GetList(["ID" => "ASC"], ["EMAIL" => $req->email]);
		$subscriberRes = $subscriber->Fetch();
		if ($subscriberRes["EMAIL"] === $req->email) {
			$rubrics = CSubscription::GetRubricList($subscriberRes["ID"]);
			$rubricsArr = [];
			while ($rubricsRes = $rubrics->Fetch()) {
				$rubricsArr[] = intval($rubricsRes["ID"]);
			}
			$rubricsArr[] = intval($req->subscribe);
			$arFields = [
				"SEND_CONFIRM" => "N",
				"RUB_ID" => $rubricsArr
			];
			echo $subscr->Update($subscriberRes["ID"], $arFields, "s5");
		} else {
			$arFields = [
				"USER_ID" => false,
				"FORMAT" => "html",
				"EMAIL" => $req->email,
				"SEND_CONFIRM" => "N",
				"CONFIRMED" => "Y",
				"ACTIVE" => "Y",
				"RUB_ID" => [$req->subscribe]
			];
			echo $subscr->Add($arFields);
		}
	}
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");