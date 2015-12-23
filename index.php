<?
	header("Cache-Control: public");
	header("Expires: " . date("r", time() + 3600));
	$title = "";
	$description = "";
	$keywords = "";
	$meta = '';
	$scriptOrg = '<script type="application/ld+json"></script>';
	// include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	include $_SERVER['DOCUMENT_ROOT']."/data/header.html";
?>


		<!-- Content начало -->
		<main>
			<section class="start-page">
				<div class="content-header">
					<div class="content-header-mask"></div>	
						<div class="content">
							<img src="dist/img/logo1.png" alt="Лого" class="logo-1">
								<div class="content-header-text">
									<h1>Разработка корпоративных сайтов для компаний в сфере<br>
									услуг и производства, с акцентом на продвижение в поисковых системах</h1>
								</div>
									<div class="block-button">
										<div class="group-button button-icon"><span class="icon-1"></span></div>
										<a class="group-button button-discussion" href="#">Обсудить проект</a>
									</div>
						</div>		
						
				</div>
			</section>

			<section class="second-section">
					<div class="row">
							<div class="col-md-6 servise left-block">
									
									<div class="col-md-12 servise-block-text">
										<h2>Разработка сайтов и мобильных приложений</h2>
										<a href="#">Узнать больше о разработке</a>
										<br>
										<span class="icon-left-block icon-left"></span>
									</div>

									<!-- Начало. Линии на border'е. -->
									<div class="line top-left"></div>
									<div class="line left-top"></div>
									<div class="line top-right"></div>
									<div class="line right-top"></div>						
									<div class="line bottom-left"></div>
									<div class="line left-bottom"></div>
									<div class="line bottom-right"></div>
									<div class="line right-bottom"></div>

										<div class="col-md-6 inside-block">
											<div class="line inside-right-bottom"></div>
											<div class="line inside-bottom-right"></div>
										</div>
										<div class="col-md-6 inside-block"></div>
										<div class="col-md-6 inside-block"></div>
										<div class="col-md-6 inside-block">
											<div class="line inside-top-left"></div>
											<div class="line inside-left-top"></div>
										</div>
									<!-- Конец. Линии на border'е. -->

											<img id="layer-1" src="dist/img/figure-1.png" alt="Фигура №1" class="parallax top-figure-1 top">
											<img id="layer-2" src="dist/img/figure-2.png" alt="Фигура №2" class="parallax top-figure-2">		
							</div>

								<div class="col-md-6 servise right-block">

									<div class="col-md-12 servise-block-text">
										<h2>Комплексное продвижение в интернете</h2>
										<a href="#">Узнать больше о разработке</a>
										<br>
										<span class="icon-right-block icon-right"></span>
									</div>

										<div class="line top-left"></div>
										<div class="line left-top"></div>
										<div class="line top-right"></div>
										<div class="line right-top"></div>						
										<div class="line bottom-left"></div>
										<div class="line left-bottom"></div>
										<div class="line bottom-right"></div>
										<div class="line right-bottom"></div>

											<div class="col-md-6 inside-block">
												<div class="line inside-right-bottom"></div>
												<div class="line inside-bottom-right"></div>
											</div>
											<div class="col-md-6 inside-block"></div>
											<div class="col-md-6 inside-block"></div>
											<div class="col-md-6 inside-block">
												<div class="line inside-top-left"></div>
												<div class="line inside-left-top"></div>
											</div>
		
											<img id="layer-3" src="dist/img/figure-3.png" alt="Фигура №3" class="parallax top-figure-3 top">
											<img id="layer-4" src="dist/img/figure-4.png" alt="Фигура №4" class="parallax top-figure-4">
								</div>
								
					</div>
			</section>	

			<section> 

				<div class="row">
					<div class="col-md-12 projects-wrapper">
							<header class="col-md-3 project-heading">
								<div class="project-heading-text">
									<h2>Реализованные проекты</h2>
									<div class="projects-more">
										<a href="#">
										<svg class="arrow">
											<!-- Первая слева точка -->
											<circle class="knot arrow-knot" r="3" cx="15" cy="30" data-svg-origin="12 28"></circle>
											<!-- Основная линия -->
											<line class="line arrow-line" x1="15" y1="30" x2="50" y2="30" data-svg-origin="60 30" style="stroke-width: 2px;transform-origin: 0px 0px 0px;"></line>
											<!-- Правая точка в конце линии -->
											<circle class="knot arrow-knot" r="3" cx="50" cy="30" data-svg-origin="72 28"></circle>
											<!-- Верхняя точка -->
											<circle class="knot arrow-knot-2" r="3" cx="40" cy="17" data-svg-origin="30 9"></circle>
											<!-- Нижняя точка -->
											<circle class="knot arrow-knot-3" r="3" cx="40" cy="43" data-svg-origin="30 45"></circle>
											<!-- Верхняя линия -->
											<line class="line arrow-line-2" x1="50" y1="28" x2="47" y2="17" data-svg-origin="15 30"></line>
											<!-- Нижняя линия -->
											<line class="line arrow-line-3" x1="50" y1="30" x2="50" y2="43" data-svg-origin="30 30"></line>
										</svg>
										Больше проектов</a>
									</div>	
								</div>
							</header> 

								<div id="hippocrates" class="col-md-3 project-finished first-row">
									<div class="project-text">
										<h3>ГИПОКРАТ</h3>
										<svg class="project-svg">
										<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
										</svg>
										<p>Разработка корпоративного сайта для медицинского учреждения</p>
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

								<div id="asm" class="col-md-3 project-finished first-row">
									<div class="project-text">
										<h3>ASM</h3>
										<svg class="project-svg">
										<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
										</svg>
										<p>Разработка корпоративного сайта для производственного предприятия</p>
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

								<div id="promteh" class="col-md-3 project-finished first-row">
									<div class="project-text">
										<h3>Промтехносталь</h3>
										<svg class="project-svg">
										<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
										</svg>
										<p>Разработка корпоративного сайта для группы компаний</p>
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
							<div class="col-md-12 projects-wrapper">
									<div id="authority" class="col-md-3 project-finished second-row">
										<div class="project-text">
											<h3>Авторитет</h3>
											<svg class="project-svg">
											<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
											</svg>
											<p>Разработка корпоративного сайта агенства недвижимости</p>
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
									<div id="floors" class="col-md-3 project-finished second-row">
										<div class="project-text">
											<h3>ТДК ЭТАЖИ</h3>
											<svg class="project-svg">
											<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
											</svg>
											<p>Разработка корпоративного сайта торгово-делового комплекса</p>
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
									<div id="tssbu" class="col-md-3 project-finished second-row">
										<div class="project-text">
											<h3>ЦСБУ</h3>
											<svg class="project-svg">
											<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
											</svg>
											<p>Разработка корпоративного сайта для страховой компании</p>
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
									<div id="tekhosnastka" class="col-md-3 project-finished second-row">
										<div class="project-text">
											<h3>Промтехоснастка</h3>
											<svg class="project-svg">
											<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
											</svg>
											<p>Разработка корпоративного сайта для производственной компании</p>
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
									<div id="hilook" class="col-md-3 project-finished end-cell">
										<div class="project-text">
											<h3>Hilook</h3>
											<svg class="project-svg">
											<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
											</svg>
											<p>Разработка интернет - портала компаний, товаров, услуг</p>
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
				</div>	

			</section>

			<section>

				<div class="row">

						<header>
							<h2 class="trust-header">Нам доверяют</h2>
						</header>

							<div class="col-md-3 trust-company">
								<span class="image-trust-company aquapark"></span>
									<div class="line trust-top-left"></div>
									<div class="line trust-left-top"></div>
									<div class="line trust-top-right"></div>
									<div class="line trust-right-top"></div>
									<div class="line trust-bottom-left"></div>
									<div class="line trust-left-bottom"></div>
									<div class="line trust-bottom-right"></div>
									<div class="line trust-right-bottom"></div>
							</div>									

									<div class="col-md-3 trust-company">
										<span class="image-trust-company authority"></span>
											<div class="line trust-top-left"></div>
											<div class="line trust-left-top"></div>
											<div class="line trust-top-right"></div>
											<div class="line trust-right-top"></div>
											<div class="line trust-bottom-left"></div>
											<div class="line trust-left-bottom"></div>
											<div class="line trust-bottom-right"></div>
											<div class="line trust-right-bottom"></div>
									</div>

									<div class="col-md-3 trust-company">
										<span class="image-trust-company floors"></span>
											<div class="line trust-top-left"></div>
											<div class="line trust-left-top"></div>
											<div class="line trust-top-right"></div>
											<div class="line trust-right-top"></div>
											<div class="line trust-bottom-left"></div>
											<div class="line trust-left-bottom"></div>
											<div class="line trust-bottom-right"></div>
											<div class="line trust-right-bottom"></div>

									</div>

									<div class="col-md-3 trust-company">
										<span class="image-trust-company ferra"></span>
											<div class="line trust-top-left"></div>
											<div class="line trust-left-top"></div>
											<div class="line trust-top-right"></div>
											<div class="line trust-right-top"></div>
											<div class="line trust-bottom-left"></div>
											<div class="line trust-left-bottom"></div>
											<div class="line trust-bottom-right"></div>
											<div class="line trust-right-bottom"></div>

									</div>

									<div class="col-md-3 trust-company">
										<span class="image-trust-company asm"></span>
											<div class="line trust-top-left"></div>
											<div class="line trust-left-top"></div>
											<div class="line trust-top-right"></div>
											<div class="line trust-right-top"></div>
											<div class="line trust-bottom-left"></div>
											<div class="line trust-left-bottom"></div>
											<div class="line trust-bottom-right"></div>
											<div class="line trust-right-bottom"></div>

									</div>

									<div class="col-md-3 trust-company">
										<span class="image-trust-company haki"></span>
											<div class="line trust-top-left"></div>
											<div class="line trust-left-top"></div>
											<div class="line trust-top-right"></div>
											<div class="line trust-right-top"></div>
											<div class="line trust-bottom-left"></div>
											<div class="line trust-left-bottom"></div>
											<div class="line trust-bottom-right"></div>
											<div class="line trust-right-bottom"></div>

									</div>

									<div class="col-md-3 trust-company">
										<span class="image-trust-company committee"></span>
											<div class="line trust-top-left"></div>
											<div class="line trust-left-top"></div>
											<div class="line trust-top-right"></div>
											<div class="line trust-right-top"></div>
											<div class="line trust-bottom-left"></div>
											<div class="line trust-left-bottom"></div>
											<div class="line trust-bottom-right"></div>
											<div class="line trust-right-bottom"></div>

									</div>

									<div class="col-md-3 trust-company">
										<span class="image-trust-company promtech"></span>
											<div class="line trust-top-left"></div>
											<div class="line trust-left-top"></div>
											<div class="line trust-top-right"></div>
											<div class="line trust-right-top"></div>
											<div class="line trust-bottom-left"></div>
											<div class="line trust-left-bottom"></div>
											<div class="line trust-bottom-right"></div>
											<div class="line trust-right-bottom"></div>

									</div>

									<div class="col-md-3 trust-company">
										<span class="image-trust-company hippocrates"></span>
											<div class="line trust-top-left"></div>
											<div class="line trust-left-top"></div>
											<div class="line trust-top-right"></div>
											<div class="line trust-right-top"></div>
											<div class="line trust-bottom-left"></div>
											<div class="line trust-left-bottom"></div>
											<div class="line trust-bottom-right"></div>
											<div class="line trust-right-bottom"></div>

									</div>

									<div class="col-md-3 trust-company">
										<span class="image-trust-company bin"></span>
											<div class="line trust-top-left"></div>
											<div class="line trust-left-top"></div>
											<div class="line trust-top-right"></div>
											<div class="line trust-right-top"></div>
											<div class="line trust-bottom-left"></div>
											<div class="line trust-left-bottom"></div>
											<div class="line trust-bottom-right"></div>
											<div class="line trust-right-bottom"></div>
									</div>
				</div>

			</section>
			
			<section>
							<header>
								<h2 class="articles-header">Статьи. <span>Пишем. Переводим.</span></h2>
									<div class="more-articles">
										<a href="#">
										<svg class="arrow">
											<!-- Первая слева точка -->
											<circle class="knot arrow-knot" r="3" cx="15" cy="30" data-svg-origin="12 28"></circle>
											<!-- Основная линия -->
											<line class="line arrow-line" x1="15" y1="30" x2="50" y2="30" data-svg-origin="60 30" style="stroke-width: 2px;transform-origin: 0px 0px 0px;"></line>
											<!-- Правая точка в конце линии -->
											<circle class="knot arrow-knot" r="3" cx="50" cy="30" data-svg-origin="72 28"></circle>
											<!-- Верхняя точка -->
											<circle class="knot arrow-knot-2" r="3" cx="40" cy="17" data-svg-origin="30 9"></circle>
											<!-- Нижняя точка -->
											<circle class="knot arrow-knot-3" r="3" cx="40" cy="43" data-svg-origin="30 45"></circle>
											<!-- Верхняя линия -->
											<line class="line arrow-line-2" x1="50" y1="28" x2="47" y2="17" data-svg-origin="15 30"></line>
											<!-- Нижняя линия -->
											<line class="line arrow-line-3" x1="50" y1="30" x2="50" y2="43" data-svg-origin="30 30"></line>
										</svg>
										Больше статеи</a>
									</div>
							</header>

							<div style="clear:both;"></div>
							
							<div class="owl-carousel">
					            <article class="item">
					              <header>
					              	<h4>Lorem ipsum.</h4>
					              </header>
					             	 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit molestias neque in, dolorem autem minus perspiciatis, optio possimus quidem repellat quas nam dolor, sed similique totam nobis suscipit quos veniam.</p>
							              <footer>
							              	<div class="article-date">дата</div>
											<a href="#" class="article-more">Читать подробнее</a>
							              </footer>
					            </article>           

					            <article class="item">
					              <header>
					              	<h4>Lorem ipsum.</h4>
					              </header>
					             	 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit molestias neque in, dolorem autem minus perspiciatis, optio possimus quidem repellat quas nam dolor, sed similique totam nobis suscipit quos veniam.</p>
							              <footer>
							              	<div class="article-date">дата</div>
											<a href="#" class="article-more">Читать подробнее</a>
							              </footer>
					            </article>

					            <article class="item">
					              <header>
					              	<h4>Lorem ipsum.</h4>
					              </header>
					             	 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit molestias neque in, dolorem autem minus perspiciatis, optio possimus quidem repellat quas nam dolor, sed similique totam nobis suscipit quos veniam.</p>
							              <footer>
							              	<div class="article-date">дата</div>
											<a href="#" class="article-more">Читать подробнее</a>
							              </footer>
					            </article>
            				</div>
			</section>

		</main>
		<!-- Content конец -->

<?
	include $_SERVER['DOCUMENT_ROOT']."/data/footer.html";
?>

