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

		</main>
		<!-- Content конец -->

<?
	include $_SERVER['DOCUMENT_ROOT']."/data/footer.html";
?>

