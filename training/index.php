<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Training");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetTitle("Training");
$APPLICATION->SetAdditionalCSS("/css/libs/fancybox.css");
$APPLICATION->SetAdditionalCSS("/css/training.css");
?>

<script src="/scripts/libs/fancybox/fancybox.umd.js"></script>
<script src="/scripts/training.js"></script>
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
			<!-- вставка событий -->
			<div class="training-item">
				<img src="/images/internet-seminary/event-item0/perco-introduction.jpg">
				<div class="training-item__text">
					<div class="training-item__title">PERCo introduction</div>
					<div class="training-item__desc">PERCo company and its' history, product range and partnership benefits</div>
					<div class="training-item__time">
						<div class="training-item__time-element">
							<img class="training-item__time-element-img training-item__time-element-img_calendar" src="/images/internet-seminary/calendar.svg">
							March 17, 2021
						</div>
						<div class="training-item__time-element">
							<img class="training-item__time-element-img training-item__time-element-img_clock" src="/images/internet-seminary/clock.svg">
							1:00pm – 2:00pm (GMT +3)
						</div>
					</div>

					<div class="training-item__reg">
						<div data-fancybox data-src="#dialog-content" class="training-item__reg-link">Register</div>
					</div>

				</div>
			</div>

			<!-- /// шаблон события -->
		</div>
		<div class="clock">
			<img src="/images/internet-seminary/time.svg" style="max-width: 460px;" alt="time">
		</div>
		<p>To satisfy our partners’ needs, PERCo training department designs individual programs. Please, fill in the form and our team will contact you shortly for further training discussion.</p>
		<div class="training-popup-feedback-notification">
			<div class="training-popup-feedback-notification__window"></div>
		</div>
		<div class="training-feedback">
			<!-- Dialog Contents -->
			<div id="dialog-content" style="display:none;" class="" role="dialog">
				<div class="modal-header">
					<h2 class="training-registration-title">Webinar registration form</h2>
				</div>
				<div class="training-popup-register__window">
					<div class="training-feedback training-feedback_register">
						<? $APPLICATION->IncludeComponent(
							"bitrix:form.result.new",
							"form",
							array(
								"WEB_FORM_ID" => "67",
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
						); ?>
						<!-- <form name="TRAINING_REGISTER" action="/training/" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="WEB_FORM_ID" value="64"><input type="hidden" name="lang" value="en"> <label class="training-feedback-form__label"> E-mail <span style="color: red;">*</span>&nbsp;
								<br>
								<input type="text" class="inputtext" name="form_email_926" size="0"> </label>
							<label class="training-feedback-form__label"> Surname <span style="color: red;">*</span>
								<br>
								<input type="text" class="inputtext" name="form_text_929" size="0"> </label>
							<label class="training-feedback-form__label"> Name <span style="color: red;">*</span>&nbsp;
								<br>
								<input type="text" class="inputtext" name="form_text_927" size="0"> </label>
							<label class="training-feedback-form__label"> Company <span style="color: red;">*</span>
								<br>
								<input type="text" class="inputtext" name="form_text_928" size="0"> </label>
							<label class="training-feedback-form__label"> Country <span style="color: red;">*</span>&nbsp;
								<br>
								<input type="text" class="inputtext" name="form_text_930" size="0"> </label>
							<input type="hidden" name="form_hidden_936" value="How to choose a turnstile">
							<div class="training-feedback__mandatory">All the fields are mandatory</div>
							<label class="training-feedback-form__label training-feedback-form__label_captcha">
								<input type="hidden" name="captcha_sid" value="0a653ff0baf88fca3575e653f168c1ef">
								<img src="Training_files/captcha.jpg" width="180" height="40"> <span class=" training-feedback-form__input_captcha"><input type="text" name="captcha_word" size="30" maxlength="50" class="inputtext"> </span></label> <input type="submit" name="web_form_submit" value="Submit">
						</form> -->
					</div>
				</div>
			</div> 
		</div><!-- /.modal -->
		<!-- Dialog Trigger -->
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
*/ ?>
<? include_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/classes/general/captcha.php");
$cpt = new CCaptcha();
$captchaPass = COption::GetOptionString("main", "captcha_password", "");
if (strlen($captchaPass) <= 0) {
	$captchaPass = randString(10);
	COption::SetOptionString("main", "captcha_password", $captchaPass);
}
$cpt->SetCodeCrypt($captchaPass);
?>
<!-- <div class="training-popup-register">
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
				<input name="captcha_code" value="<?= htmlspecialchars($cpt->GetCodeCrypt()); ?>" type="hidden">
				<label class="training-feedback-form__label training-feedback-form__label_captcha">
					<img src="/bitrix/tools/captcha.php?captcha_code=<?= htmlspecialchars($cpt->GetCodeCrypt()); ?>">
					<input id="captcha_word" name="captcha_word" type="text" style="margin-left: 24px; width: 96px;">
				</label>
				<input type="submit" name="web_form_submit" value="Submit">
			</form>
		</div>
	</div>
</div> -->
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>