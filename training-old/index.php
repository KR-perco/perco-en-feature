<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Training");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetTitle("Training");
$APPLICATION->SetAdditionalCSS("/css/training.css");
$APPLICATION->AddHeadScript('/scripts/training.js');
?>
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
			<div style="display:none;"><?echo time();?></div>
			<?if (time() + 3 * 3600 < 1618426800) {?>
			<div class="training-item">
				<img src="/images/internet-seminary/perco-introduction.jpg">
				<div class="training-item__text">
					<div class="training-item__title">PERCo introduction</div>
					<div class="training-item__desc">PERCo company and its' history, product range and partnership benefits</div>
					<div class="training-item__time">
						<div class="training-item__time-element">
							<img class="training-item__time-element-img training-item__time-element-img_calendar" src="/images/internet-seminary/calendar.svg">
							April 14, 2021
						</div>
						<div class="training-item__time-element">
							<img class="training-item__time-element-img training-item__time-element-img_clock" src="/images/internet-seminary/clock.svg">
							10:00am – 11:00am (UTC/GMT -5)
						</div>
					</div>
					<div class="training-item__reg"><a class="training-item__reg-link" href="#perco-introduction" data-seminar="PERCo introduction" rel="noopener" target="_blank">Register</a></div>
				</div>
			</div>
			<?}?>
			<div class="training-item">
				<img src="/images/internet-seminary/kak-vybrat-turniket.jpg">
				<div class="training-item__text">
					<div class="training-item__title">How to choose a turnstile</div>
					<div class="training-item__desc">Key turnstile selection criteria<br><br></div>
					<div class="training-item__time">
						<div class="training-item__time-element">
							<img class="training-item__time-element-img training-item__time-element-img_calendar" src="/images/internet-seminary/calendar.svg">
							April 21, 2021
						</div>
						<div class="training-item__time-element">
							<img class="training-item__time-element-img training-item__time-element-img_clock" src="/images/internet-seminary/clock.svg">
							10:00am – 11:00am (UTC/GMT -5)
						</div>
					</div>
					<div class="training-item__reg"><a class="training-item__reg-link" href="#how-to-choose-a-turnstile" data-seminar="How to choose a turnstile" rel="noopener" target="_blank">Register</a></div>
				</div>
			</div>
			<div class="training-item">
				<img src="/images/internet-seminary/perco-new-products.jpg">
				<div class="training-item__text">
					<div class="training-item__title">PERCo new products</div>
					<div class="training-item__desc">Latest developments and upcoming products</div>
					<div class="training-item__time">
						<div class="training-item__time-element">
							<img class="training-item__time-element-img training-item__time-element-img_calendar" src="/images/internet-seminary/calendar.svg" alt="Календарь">
							April 28, 2021
						</div>
						<div class="training-item__time-element">
							<img class="training-item__time-element-img training-item__time-element-img_clock" src="/images/internet-seminary/clock.svg" alt="Часы">
							10:00am – 11:00am (UTC/GMT -5)
						</div>
					</div>
					<div class="training-item__reg"><a class="training-item__reg-link" href="#perco-new-products" data-seminar="PERCo new products" rel="noopener" target="_blank">Register</a></div>
				</div>
			</div>
		</div>
		<div class="clock">
			<img src="/images/internet-seminary/vremya.svg" style="max-width: 750px;" alt="time">
		</div>
		<p style="margin-block-start: 32px;">To satisfy our partners’ needs, PERCo training department designs individual programs. Please, fill in the form and our team will contact you shortly for further training discussion.</p>
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
<div class="training-popup-register">
	<div class="training-popup-register__window">
		<h2 class="training-registration-title">Webinar registration form</h2>
		<div class="training-feedback training-feedback_register">
			<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "form", array(
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
			);?>
		</div>
	</div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>