<?
	header("Cache-Control: public");
	header("Expires: " . date("r", time() + 3600));
	$title = "Разработка корпоративных сайтов в сферах производства, медицины, недвижимости";
	$description = "";
	$keywords = "";
	$meta = '';
	$scriptOrg = '<script type="application/ld+json"></script>';
	// include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	include $_SERVER['DOCUMENT_ROOT']."/data/header.html";
?>
	<!-- Content начало -->
	<main class="page-about">

		<div class="page-mask"></div>

			<section>
			
				<div class="header-container-up">
					<header>
						<h1>Контакты</h1>
					</header>
				</div>
				
				<div class="underline"></div>

				<div class="header-container-down">
					<div class="row">
						<div class="col-md-6 not-padding">
							<div class="col-md-12 phone-mail-box not-padding">
								<div class="col-md-6 phone-mail">
									<p>Телефон</p>
									<a rel="nofollow" style="text-decoration:none;" href="tel:+78202-74-22-90">+7 (8202) 742 290</a>
								</div>
								<div class="col-md-6 phone-mail">
									<p>email</p>
									<a rel="nofollow" style="text-decoration:none;" href="mailto:info@wbest.ru">info@wbest.ru</a>
								</div>
							</div>

							<div class="col-md-12 legal-address-box">
								<p>Юридический адрес</p>
								<p class="legal-address">Россия, Вологодская обл.,<br>г. Череповец, ул. Годовикова 21</p>
								<a href="#">Скачать реквизиты</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="header-right-block">

								<div class="header-block-text">
									<form id="form">
										
										<div class="label-effect">
											<label for="mail">Email</label>
											<input id="mail" type="email" name="email" required autocomplete="on" class="input-email">
										</div>
										
										<div class="label-effect-1">
											<label for="message">Сообщение</label>
											<textarea type="text" id="message" required class="input-text"></textarea>
										</div>

										<div class="block-button">
											<div class="group-button button-icon"><span class="icon-1"></span></div>
											<input type="submit" class="group-button button-discussion" value="Отправить">
										</div>

									</form>
								</div>	
								<div class="line top-left"></div>
								<div class="line left-top"></div>
								<div class="line top-right"></div>
								<div class="line right-top"></div>						
								<div class="line bottom-left"></div>
								<div class="line left-bottom"></div>
								<div class="line bottom-right"></div>
								<div class="line right-bottom"></div>
							</div>	
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
			</section>
	</main>
	<!-- Content конец -->

<?
	include $_SERVER['DOCUMENT_ROOT']."/data/footer.html";
?>	