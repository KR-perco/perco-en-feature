<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Training");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetTitle("Training");
$APPLICATION->SetAdditionalCSS("/css/training.css");
$APPLICATION->AddHeadScript('/scripts/training-test.js');
?>
<script>
seminars = {};
</script>
<div class="training-content">
	<div class="training-head">
		<div class="training-head__body">
			<img class="training-head__img" src="/images/internet-seminary/head.jpg" draggable="false">
		</div>
	</div>
	<div class="training-main">
		<h1>Training</h1>
		<p>PERCo is interested in providing high-quality services by its partner companies, thus we pay a lot of attention to the training of their specialists. Trainings can be conducted online and offline, the participants can join the scheduled webinar or order a personal one. PERCo trainings are developed for engineers, sales & marketing managers as they contain both technical and promotional information, companies can choose topics they are most interested in.</p>  
		<p>See the schedule and topics of the regular webinars below and register straight ahead.</p>
		<div class="training-items">
			<?
			$rsSeminarType = CIBlockElement::GetList(
				['SORT' => 'ASC'],
				['IBLOCK_CODE' => 'list_seminars_en', 'ACTIVE' => 'Y'],
				false,
				false,
				['ID', 'IBLOCK_ID', 'CODE', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE']
			);
			while($arSeminarType = $rsSeminarType->GetNext()) {
				$rsSeminar = CIBlockElement::GetList(
					['ACTIVE_FROM' => 'DESC'],
					['IBLOCK_CODE' => 'seminars_en', 'ACTIVE' => 'Y', 'PROPERTY_SEMINAR' => $arSeminarType['ID']],
					false,
					false,
					['ID', 'IBLOCK_ID', 'CODE', 'ACTIVE_FROM', 'ACTIVE_TO']
				);
				console_log($rsSeminar);
				if ($arSeminar = $rsSeminar->GetNextElement()) {
					$arSeminarFields = $arSeminar->GetFields();
					$arSeminarProps = $arSeminar->GetProperties();
					$timestampFrom = date_create_from_format('d.m.Y H:i:s', $arSeminarFields['ACTIVE_FROM']);
					$timestampTo = date_create_from_format('d.m.Y H:i:s', $arSeminarFields['ACTIVE_TO']);
					if (time() > $timestampTo->gettimestamp() + 3 * 3600 - intval($arSeminarProps['GMT']['VALUE']) * 3600) continue;
					$duration = $timestampFrom->format('g:ia') . ' - ' . $timestampTo->format('g:ia');
					$timeZone = sprintf('%+d', $arSeminarProps['GMT']['VALUE']);
					?><script>
						seminars['<?= $arSeminarType['NAME'] ?>'] = {
							link: '<?=  $arSeminarProps['LINK']['VALUE']?>',
							date: '<?= $timestampFrom->format('d.m.y') ?>',
							duration: '<?= $duration ?>',
							timezone: '<?= $timeZone ?>',
							id: '<?= $arSeminarFields['ID'] ?>'
						};
					</script><?
					?>
					<div class="training-item">
						<img src="<?= CFile::GetPath($arSeminarType['PREVIEW_PICTURE']); ?>">
						<div class="training-item__text">
							<div class="training-item__title"><?= $arSeminarType['NAME'] ?></div>
							<div class="training-item__desc"><?= $arSeminarType['PREVIEW_TEXT'] ?></div>
							<div class="training-item__time">
								<div class="training-item__time-element">
									<img class="training-item__time-element-img training-item__time-element-img_calendar" src="/images/internet-seminary/calendar.svg">
									<?= $timestampFrom->format('F d, Y') ?>
								</div>
								<div class="training-item__time-element">
									<img class="training-item__time-element-img training-item__time-element-img_clock" src="/images/internet-seminary/clock.svg">
									<?= $duration ?> (UTC/GMT <?= $timeZone ?>)
								</div>
							</div>
							<div class="training-item__reg"><a class="training-item__reg-link" href="#" data-seminar="<?= $arSeminarType['NAME'] ?>" data-hash="<?= '#' . str_replace(' ', '-', strtolower($arSeminarType['NAME'])) ?>" rel="noopener" target="_blank">Register</a></div>
						</div>
					</div>
					<?
				}
			}
			?>
		</div>
		<div class="clock">
			<img src="/images/internet-seminary/time.svg" style="max-width: 460px;" alt="time">
		</div>
		<p>To satisfy our partners’ needs, PERCo training department designs individual programs. Please, fill in the form and our team will contact you shortly for further training discussion.</p>
		<div class="training-popup-feedback-notification"> 
			<div class="training-popup-feedback-notification__window"></div>
		</div>
		<div class="training-feedback">
			<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "form", array(
				"WEB_FORM_ID" => "66",
				"IGNORE_CUSTOM_TEMPLATE" => "N",
				"USE_EXTENDED_ERRORS" => "N",
				"SEF_MODE" => "N",
				"SEF_FOLDER" => "",
				//"CACHE_TYPE" => "A",
				//"CACHE_TIME" => "3600",
				"CACHE_TYPE" => "N",
				"CACHE_TIME" => "0",
				"LIST_URL" => "",
				"EDIT_URL" => "",
				"SUCCESS_URL" => "",
				"CHAIN_ITEM_TEXT" => "",
				"CHAIN_ITEM_LINK" => "",
				"AJAX_MODE" => "Y",
				"VARIABLE_ALIASES" => array(
					"WEB_FORM_ID" => "WEB_FORM_ID",
					"RESULT_ID" => "RESULT_ID",
				)
				),
				false
			);?>
		</div>
	</div>
</div>
<?/*
if(CModule::IncludeModule('subscribe')) {
	$letterId = 734;
	$cPosting = new CPosting;
	$post = CPosting::GetByID($letterId);
	if(($post_arr = $post->Fetch()))
		$aEmail = CPosting::GetEmails($post_arr);
	var_dump($aEmail);
}
*/?>
<?include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
$cpt = new CCaptcha();
$captchaPass = COption::GetOptionString("main", "captcha_password", "");
if(strlen($captchaPass) <= 0) {
	$captchaPass = randString(10);
	COption::SetOptionString("main", "captcha_password", $captchaPass);
}
$cpt->SetCodeCrypt($captchaPass);
?>
<div class="training-popup-register">
	<div class="training-popup-register__window">
		<h2 class="training-registration-title">Webinar registration form</h2>
		<div class="training-feedback training-feedback_register">
			<form class="registration-form" method="post" action="send-mail.php">
				<div class="registration-form__error" style="display: none; margin-bottom: 16px; color: red;">
					Wrong symbols, please type in the correct symbols shown in the image.
				</div>
				<label class="training-feedback-form__label">
					E-mail<span style="color: red;">*</span><br>
					<input name="email" type="email" required>
				</label>
				<label class="training-feedback-form__label">
					Surname<span style="color: red;">*</span><br>
					<input name="surname" type="text" required>
				</label>
				<label class="training-feedback-form__label">
					Name<span style="color: red;">*</span><br>
					<input name="name" type="text" required>
				</label>
				<label class="training-feedback-form__label">
					Company<span style="color: red;">*</span><br>
					<input name="company" type="text" required>
				</label>
				<label class="training-feedback-form__label">
					Country<span style="color: red;">*</span><br>
					<input name="country" type="text" required>
				</label>
				<div class="training-feedback__mandatory">All the fields are mandatory</div>
				<input name="captcha_code" value="<?=htmlspecialchars($cpt->GetCodeCrypt());?>" type="hidden">
				<label class="training-feedback-form__label training-feedback-form__label_captcha">
					<img src="/bitrix/tools/captcha.php?captcha_code=<?=htmlspecialchars($cpt->GetCodeCrypt());?>">
					<input id="captcha_word" name="captcha_word" type="text" style="margin-left: 24px; width: 96px;">
				</label>
				<input type="submit" name="web_form_submit" value="Submit">
			</form>
		</div>
	</div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>