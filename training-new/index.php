<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Training-New");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetTitle("Training"); 
$APPLICATION->SetAdditionalCSS("/css/libs/fancybox.css");
$APPLICATION->SetAdditionalCSS("/css/training.css"); 
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
			<!-- шаблон событий -->
			<div class="training-item">
				<img src="/images/internet-seminary/event-item0/perco-introduction.jpg">
				<div class="training-item__text">
					<div class="training-item__title">PERCo products overview</div>
					<div class="training-item__desc">Live stream from PERCo showroom </div>
					<div class="training-item__time">
						<div class="training-item__time-element">
							<img class="training-item__time-element-img training-item__time-element-img_calendar" src="/images/internet-seminary/calendar.svg">
							July 20, 2021
						</div>
						<div class="training-item__time-element">
							<img class="training-item__time-element-img training-item__time-element-img_clock" src="/images/internet-seminary/clock.svg">
							11:00am (GMT+2)
						</div>
					</div>

					<div class="training-item__reg">
						<div data-fancybox data-src="#dialog-content" class="training-item__reg-link">Register</div>
					</div>

				</div>
			</div>

			<!-- /// шаблон события -->
		</div>
		<!-- <div class="clock">
			<img src="/images/internet-seminary/time.svg" style="max-width: 460px;" alt="time">
		</div> -->
		
		<div class="timer-body"> 
			<h1 class="countdown-title">Time before the event starts</h1>
			<div id="deadline-message" class="deadline-message">
			Time is up!
			</div>
			<div id="countdown" class="countdown">
			<div class="countdown-number">
				<span class="days countdown-time"></span>
				<span class="countdown-text">Days</span>
			</div>
			<div class="countdown-number">
				<span class="hours countdown-time"></span>
				<span class="countdown-text">Hours</span>
			</div>
			<div class="countdown-number">
				<span class="minutes countdown-time"></span>
				<span class="countdown-text">Minutes</span>
			</div>
			<div class="countdown-number hide">
				<span class="seconds countdown-time"></span>
				<span class="countdown-text">Seconds</span>
			</div>
			</div>
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
							"form-training",
							array(
								"WEB_FORM_ID" => "67", 
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
					</div>
				</div>
			</div> 
		</div><!-- /.modal -->
		<!-- Dialog Trigger -->
	</div>

</div>
</div>  
<script src="/scripts/libs/fancybox/fancybox.umd.js"></script>
<script src="/scripts/training-new.js"></script>
<script src="/scripts/countdown-timer.js"></script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>