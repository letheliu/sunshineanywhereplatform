<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();



	$_GET['น้ปนศห']=$_SESSION['LOGIN_USER_NAME'];



	$filetablename		=	'bookstuihuan';

	$parse_filename	=	'my_bookstuihuan';

	require_once('include.inc.php');


	?>