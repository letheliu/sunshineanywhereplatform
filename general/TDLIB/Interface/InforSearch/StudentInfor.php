<?
$_GET2 = $_GET;

require_once('lib.inc.php');
SESSION_START();
if($_GET['pageAction']!="write")				{
	require_once("systemprivateinc.php");

	$GLOBAL_SESSION=returnsession();
	CheckSystemPrivate("ѧУ������Ϣ����-ѧУ������Ϣһ����","�ۺ���Ϣ��ѯ-ѧ����Ϣ��ѯ");
}



if($_GET['pageAction']=="ExportDataToFile")						{

	$PHP_SELF = $_SERVER['PHP_SELF'];
	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	$FILE_NAME = array_pop($PHP_SELF_ARRAY);
	$PHP_SELF = @join('/',$PHP_SELF_ARRAY);
	$filename = "FileCache/".$FILE_NAME."_".date("Y-m-d-H").".xls";

	$hostname = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."".$PHP_SELF."/$FILE_NAME?action=".$_GET['action']."&�༶����=".$_GET['�༶����']."&pageAction=write";
	//print_R($hostname);;exit;
	$file = file($hostname);
	$FILE_CONTENT = join('',$file);
	//$handle = fopen($filename, 'w');
	//fwrite($handle, $FILE_CONTENT);
	//fclose($handle);

	header('Content-Encoding: none');
	header('Content-Type: application/octetstream');
	header('Content-Disposition: attachment;filename='.$_GET['FNAME'].'['.date("Y-m-d-H").'].xls');
	header('Content-Length: '.strlen($FILE_CONTENT));
	header('Pragma: no-cache');
	header('Expires: 0');
	echo $FILE_CONTENT;
	exit;
}

if($LOGIN_THEME!="") $LOGIN_THEME_TEXT = $LOGIN_THEME;
else	 $LOGIN_THEME_TEXT = 3;
print "<TITLE>ѧ����Ϣ��ѯ</TITLE>
<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">
<LINK href=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/theme/$LOGIN_THEME_TEXT/style.css\" type=text/css rel=stylesheet>
<script type=\"text/javascript\" language=\"javascript\" src=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/general/EDU/Enginee/lib/common.js\"></script><STYLE>@media print{input{display:none}}</STYLE>
<BODY class=bodycolor topMargin=5 >";

print "<H2 align=center>ѧ����Ϣ��ѯ</H2>";

if($_GET['pageAction']!="write")				{
	//ѧ����Ϣ��ѯ target=_blank
	print "<form name=form1 action='?action=SearchData' method=get>
		<table  class=TableBlock align=center width=800>
		<THEAD class=TableContent>
		<TR><TD noWrap colspan=1>
		<font color=red >&nbsp;����ѧ����ѯ,������������Ϣ(�����ѡ��Ŀһ�������д)<BR>&nbsp;ѧ��:</font>

		<input  type=\"text\" id=xuehao name=\"ѧ��\" value='".$_GET['ѧ��']."' class=SmallInput size=18 />&nbsp;&nbsp;
		<font color=red >���֤:</font>
		<input name=���֤  value='".$_GET['���֤']."' size=18 class=SmallInput id=shenfenzhenghao >&nbsp;&nbsp;
		<font color=red >����:</font>
		<input name=����  value='".$_GET['����']."' size=12 class=SmallInput id=xingming >&nbsp;&nbsp;
		<input type=submit name=button value='������в�ѯ'  class=SmallButton >
		<input name=action value='SearchData' type=hidden>&nbsp;&nbsp;
		<input name=actionAdd value='close' type=hidden>&nbsp;&nbsp;";
	if($_GET['action']=="SearchData")				{
		print "<INPUT TYPE=button VALUE=\"����\" class=SmallButton ONCLICK=\"location='?'\">";
	}

	print "</td></tr>";
	print  "</table><BR>";
	print  "</form><BR>";

	if($_GET['���֤']==""&&$_GET['ѧ��']==""&&$_GET['����']==""&&$_GET['actionAdd']=="close")		{
		print_infor("�������ѯ����!",'');
		exit;
	}




	//���붨�Ƶ���ʾ����

	//********ѧ����Ϣ********//
	if($_GET['ѧ������']=="") $_GET['ѧ������'] = returntablefield("edu_xueqiexec","��ǰѧ��",1,"ѧ������");
	$sql = "select ѧ������,��ǰѧ�� from edu_xueqiexec";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	$ѧ������ = $rs_a;
	$ѡ��ѧ�� = $_GET['ѧ������'];


	$sql = "select * from edu_jiaocai";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)
	{
		$�̲�����					= $rs_a[$i]['�̲�����'];
		$�̲���������[$�̲�����]	= $rs_a[$i];
	}

	//*******************�����ѯ*******************//
	print "<Table class=TableBlock width=100%>
			<Tr class=TableHeader>
			 <Td colspan=8 align=left>ѧ����Ϣ���༶��ѯ</Td>
			</Tr>";

	print	"<Tr class=TableData>";
	//����
	$sql = "select distinct ��ѧ��� from edu_banji where ��ҵʱ��>='".date("Y-m-d")."' order by ��ѧ��� desc";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	if($_GET['����']=='')		{
		$_GET['����'] = $rs_a[0]['��ѧ���'];
	}
	print	 "<Td align=center>����</Td>";
	print	 "<Td align=center>";
	print	 "<Select name='term' onChange=\"var jmpURL='?flag=1&רҵ����=".$_GET['רҵ����']."&ѧ������=".$ѡ��ѧ��."&�༶����=".$ѡ��༶����."&����=' + this.options[this.selectedIndex].value; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0;}\">";
	for($i=0;$i<sizeof($rs_a);$i++)
	{
	   if($_GET['����']==$rs_a[$i]['��ѧ���'])
	   {
		   $Selected = "selected";
	   }
	   else
	   {
		   $Selected = "";
	   }
	   print "<Option value='".$rs_a[$i]['��ѧ���']."' ".$Selected.">".$rs_a[$i]['��ѧ���']."</Option>";
	}
	print	 "</Select>";
	print	 "</Td>";
	
	//����Сѧ����֧��
	$SCHOOL_MODEL = parse_ini_file("../EDU/SCHOOL_MODEL.ini");
	$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];
	if($SCHOOL_MODEL_TEXT!="4")		{
		//רҵ
		$sql = "	select distinct edu_zhuanye.רҵ����,edu_zhuanye.רҵ����
					from edu_zhuanye,edu_banji
					where
							edu_banji.����רҵ=edu_zhuanye.רҵ����
							and edu_banji.��ѧ���='".$_GET['����']."'
					order by edu_zhuanye.רҵ���� desc";
		//print $sql;
		$rs = $db->CacheExecute(150,$sql);
		$rs_a = $rs -> GetArray();
		if($_GET['רҵ����']=='')		{
			$_GET['רҵ����'] = $rs_a[0]['רҵ����'];
		}
		print	 "<Td align=center>רҵ</Td>";
		print	 "<Td align=center>";
		print	 "<Select name='term' onChange=\"var jmpURL='?flag=1&����=".$_GET['����']."&ѧ������=".$ѡ��ѧ��."&�༶����=".$ѡ��༶����."&action2=���༶��ѯ&רҵ����=' + this.options[this.selectedIndex].value; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0;}\">";
		for($i=0;$i<sizeof($rs_a);$i++)
		{
		   if($_GET['רҵ����']==$rs_a[$i]['רҵ����'])
		   {
			   $Selected = "selected";
		   }
		   else
		   {
			   $Selected = "";
		   }
		   print "<Option value='".$rs_a[$i]['רҵ����']."' ".$Selected.">".$rs_a[$i]['רҵ����']."</Option>";
		}
		print	 "</Select>";
		print	 "</Td>";
		
	}
	


	if($_GET['רҵ����']!='')		{
		$AddSQL = " and edu_banji.����רҵ='".$_GET['רҵ����']."'";
	}
	else		{
		$AddSQL = "";
	}

	$sql = "select distinct �༶���� from edu_banji
				where	edu_banji.��ѧ���='".$_GET['����']."'
						$AddSQL
				order by �༶����
						";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	if($rs_a[0]['�༶����']=='')	{
		$rs_a[0]['�༶����'] = "û�а༶��Ϣ";
	}
	if($_GET['�༶����']=='')		{
		$_GET['�༶����'] = $rs_a[0]['�༶����'];
	}
	//print $sql;
	print	 "<Td align=center>�༶</Td>";
	print	 "<Td align=center>";
	print	 "<Select name='term' onChange=\"var jmpURL='?flag=1&����=".$_GET['����']."&רҵ����=".$_GET['רҵ����']."&action2=���༶��ѯ&ѧ������=".$ѡ��ѧ��."&�༶����=' + this.options[this.selectedIndex].value; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0;}\">";
	for($i=0;$i<sizeof($rs_a);$i++)
	{
	   if($_GET['�༶����']==$rs_a[$i]['�༶����'])
	   {
		   $Selected = "selected";
	   }
	   else
	   {
		   $Selected = "";
	   }
		print "<Option value='".$rs_a[$i]['�༶����']."' ".$Selected.">".$rs_a[$i]['�༶����']."</Option>";
	}
	print	 "</Select>";
	print	 "</Td>";

	print	 "</Table><BR>";




	if($_GET['action']=="SearchData"||$_GET['action2']=="���༶��ѯ")				{

		if($_GET['action']=="SearchData")				{
			$sql = "select ѧ��,����,���,���� from edu_student where ((ѧ�� like '%{$_GET['ѧ��']}%' or ѧ���� like '%{$_GET['ѧ��']}%') and ���� like '%{$_GET['����']}%' and ���֤�� like '%{$_GET['���֤']}%') order by ���,����,ѧ�� limit 60";
		}
		elseif($_GET['action2']=="���༶��ѯ")				{
			$sql = "select ѧ��,����,���,���� from edu_student where ���='".$_GET['�༶����']."' order by ���,����,ѧ��";
		}

		$rs = $db->CacheExecute(150,$sql);
		$rs_a = $rs->GetArray();
		//print $sql;print_R($rs_a);
		print "\n\t\r<table border=0 width=100% class=small>\n\t\r";
		for($i=0;$i<sizeof($rs_a);$i++)					{
			$���� = $rs_a[$i]['����'];
			$ѧ�� = $rs_a[$i]['ѧ��'];
			$���� = $rs_a[$i]['����'];
			$�༶ = $rs_a[$i]['���'];
			//$������ = returntablefield("edu_banji","�༶����",$rs_a[$i]['���'],"������");
			//$��������Ϣ = returntablefield("user","USER_ID",$������,"USER_NAME,TEL_NO_DEPT");
			//$���������� = $��������Ϣ['USER_NAME'];
			//$�����ε绰 = $��������Ϣ['TEL_NO_DEPT'];
			if($����������!="")		{
				//$SHOWTEXT = "[������:$���������� $�����ε绰]";
			}
			else	{
				//$SHOWTEXT = "";
			}
			if($ii%4==0) print "\n\t\r<tr>\n\t\r";
			print "<td nowrap>&nbsp;<a href=\"edu_student_newai.php?".base64_encode2("action=view_default&ѧ��=$ѧ��&GOBACK=../InforSearch/StudentInfor.php")."\" title='ѧ��:$ѧ�� ����:$����' target=_blank>{$����}[{$�༶}]$SHOWTEXT</a></td>\n\t\r";
			$ii = $i+1;

		}
		print "</table>\n\t\r";

	}



}





 ?>