<?

	require_once('lib.inc.php');



	$GLOBAL_SESSION=returnsession();




	$common_html=returnsystemlang('common_html');

	if($_GET['action']=="")		{
		$sql = "update booksset set 所属状态='购置未分配' where 所属状态=''";
		$db->Execute($sql);
		$sql = "update booksset set 金额=单价*数量";
		$db->Execute($sql);
	}





	//###########################################
	//较验分部门管理权限部分
	//###########################################

	$_GET['使用人员'] = $_SESSION['LOGIN_USER_NAME'];
	$_GET['所属状态'] = "购置未分配,购置已分配,图书已分配,图书已归还,图书已报废";





	$filetablename='booksset';
	$parse_filename = 'my_booksset';

	require_once('include.inc.php');

	?>