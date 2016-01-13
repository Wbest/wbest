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
		<main class="page-project-detail">
			<section class="header-project-detail">
				<header>
					<h1>Заголовок</h1>
				</header>
					<svg class="project-svg">
					<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
					</svg>
						<p>
						Описание
						</p>
			</section>

			<section class="block-project-detail">
				<h2>Lorem ipsum.</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati velit similique voluptas doloribus assumenda quis libero animi cumque, dignissimos quisquam quaerat ea laboriosam incidunt ullam ipsa vel error recusandae, modi.</p>
				<img src="http://void.by/wp-content/uploads/2010/02/lorem_ipsum.jpg" alt="lorem">
			</section>
			
			<section class="other-project-detail">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6">
							<header>
								<h2>Заголовок</h2>
							</header>
								<svg class="project-svg">
								<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
								</svg>
									<p>
									Описание
									</p>
							<div class="line trust-top-left"></div>
							<div class="line trust-left-top"></div>
							<div class="line trust-top-right"></div>
							<div class="line trust-right-top"></div>
							<div class="line trust-bottom-left"></div>
							<div class="line trust-left-bottom"></div>
							<div class="line trust-bottom-right"></div>
							<div class="line trust-right-bottom"></div>
						</div>
						<div class="col-md-6">
							<header>
								<h2>Заголовок</h2>
							</header>
								<svg class="project-svg">
								<circle class="knot" r="3" cx="9" cy="10" data-svg-origin="30 9" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, 2, 0, 1);"></circle><circle class="knot" r="3" cx="30" cy="14" data-svg-origin="30 45" style="transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -5, -2, 0, 1);"></circle><line class="line-1" x1="5" y1="12" x2="25" y2="12" data-svg-origin="15 30" style=""></line>
								</svg>
									<p>
									Описание
									</p>						
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
				</div>
			</section>
		</main>
		<!-- Content конец -->

<?
	include $_SERVER['DOCUMENT_ROOT']."/data/footer.html";
?>