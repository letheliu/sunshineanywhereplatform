<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();



	$_GET['สนำรศห'] = $_SESSION['LOGIN_USER_NAME'];


	$filetablename		=	'booksdiushi';

	$parse_filename	=	'my_booksdiushi';

	require_once('include.inc.php');


	?>