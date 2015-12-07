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
			<section>
				<div class="content-header">
					<img src="dist/img/logo1.png" alt="Лого" class="logo-1">
						<div class="content-header-text">
							<p>Разработка корпоративных сайтов для компаний в сфере<br>
							услуг и производства, с акцентом на продвижение в поисковых системах</p>
						</div>
				</div>
			</section>	
		</main>
		<!-- Content конец -->

<?
	include $_SERVER['DOCUMENT_ROOT']."/data/footer.html";
?>

