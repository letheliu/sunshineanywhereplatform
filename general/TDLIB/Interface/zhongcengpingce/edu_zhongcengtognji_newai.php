<?

require_once('lib.inc.php');

session_start();

if($_GET['pageAction']!="write")				{

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("������Դ-�ɲ�����-�ɲ�����ͳ��");
}


	$������Ա = $_SESSION['LOGIN_USER_NAME'];
	//print_R($_GET);
	if($_GET['��������']=="")		{
		$�������� = returntablefield("edu_zhongcengceping","�Ƿ���Ч",1,"��������");
	}
	else	{
		$�������� = $_GET['��������'];
	}

	$����������Ա = returntablefield("edu_zhongcengceping","��������",$��������,"����������Ա");
	$����������ԱArray = explode(',',$����������Ա);




if($_GET['pageAction']=="ExportDataToFile")				{


	$PHP_SELF = $_SERVER['PHP_SELF'];
	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	$FILE_NAME = array_pop($PHP_SELF_ARRAY);
	$PHP_SELF = @join('/',$PHP_SELF_ARRAY);
	$filename = "FileCache/".$FILE_NAME."_".date("Y-m-d-H").".xls";


	$hostname = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."".$PHP_SELF."/$FILE_NAME?��ʼ��=".$_GET['��ʼ��']."&������=".$_GET['������']."&action=".$_GET['action']."&pageAction=write";
	//print_R($hostname);;exit;
	$file = file($hostname);
	$FILE_CONTENT = join('',$file);
	@!$handle = fopen($filename, 'w');
	@fwrite($handle, $FILE_CONTENT);
	fclose($handle);


	header('Content-Encoding: none');
	header('Content-Type: application/octetstream');
	header('Content-Disposition: attachment;filename=�в����['.$��������.']['.date("Y-m-d-H").'].xls');
	header('Content-Length: '.strlen($FILE_CONTENT));
	header('Pragma: no-cache');
	header('Expires: 0');
	echo $FILE_CONTENT;
	exit;
}

if($LOGIN_THEME!="") $LOGIN_THEME_TEXT = $LOGIN_THEME;
else	 $LOGIN_THEME_TEXT = 3;

print "<TITLE>�в����</TITLE>
<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">
<LINK href=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/theme/$LOGIN_THEME_TEXT/style.css\" type=text/css rel=stylesheet>
<script type=\"text/javascript\" language=\"javascript\" src=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/general/EDU/Enginee/lib/common.js\"></script><STYLE>@media print{input{display:none}}</STYLE>
<BODY class=bodycolor topMargin=5 >";



if($_GET['pageAction']!="write")				{

	table_begin("100%");
	$sql="select �������� from edu_zhongcengceping";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	print "<tr class=TableData ><td colspan=6 align=left>";
	print "&nbsp;����ѡ������Ҫͳ�ƵĲ�����Ŀ: <select class=\"SmallSelect\" name=\"��������\" onChange=\"var jmpURL='?action=ViewProject&��������=' + this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}\">";
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$��������X = $rs_a[$i]['��������'];
		if($��������==$��������X) $temp = "selected";else $temp = "";
		print "<option value=\"".$��������X."\" $temp>".$��������X."</option>\n";
	}
	print "</select>\n";
	print "</td></tr>";
	table_end();
	print "<BR>";
}



	table_begin("100%");
	print "<tr class=TableHeader ><td colspan=6 align=left>�в�ɲ�����ͳ��[$��������]";
	print "</td></tr>";

	print "<tr class=TableHeader >
				<td  align=center>�ɲ�����</td>
				<td  align=center>��λ</td>
				<td  align=center>ְ��</td>
				<td  align=center>��������</td>
				<td  align=center>�ۺϽ��</td>
				<td  align=center>����</td>
				</tr>";
	$sql = "select ������Ա,��λ,ְ��,SUM(Ʒ������)+SUM(��������)+SUM(�ڷ�����)+SUM(��Ч����)+SUM(��������) AS ����,������ from edu_zhongcengmingxi where ��������='$��������' group by ������Ա,������ order by ������Ա";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$��� = $rs_a[$i]['���'];
		$������Ա = $rs_a[$i]['������Ա'];
		$������ = $rs_a[$i]['������'];
		$Infor[$������Ա]['��λ'] = $rs_a[$i]['��λ'];
		$Infor[$������Ա]['ְ��'] = $rs_a[$i]['ְ��'];
		$Infor[$������Ա]['����'] = $rs_a[$i]['����'];
		$NewArray[$������Ա][$������] = $rs_a[$i]['����'];

	}

	//print_R($NewArray);

	$������Ա���� = @array_keys($NewArray);
	for($i=0;$i<sizeof($������Ա����);$i++)		{
		$������Ա = $������Ա����[$i];
		$���������� = array();
		$���������� = $NewArray[$������Ա];
		$���������� = sizeof($����������);

		$ResultNum[$������Ա] = $����������;


		$����������Values = array_values($����������);
		@sort($����������Values);
		//print_R($����������Values);
		//����������������ʱ
		if($����������>2)						{
			$P10 = ceil($����������*0.1);
			if($P10==0) $P10 = 1;				//����ȥ��һ����߷ֺ�һ����ͷ�
			//print $P10;
			for($iX=0;$iX<$P10;$iX++)				{
				$�۳���ͷ�[$������Ա] .= array_shift($����������Values)." ";
				//print_R($����������Values);
				$�۳���߷�[$������Ա] .= array_pop($����������Values)." ";
				//print_R($����������Values);
				//exit;
			}
		}
		else		{
			//һ����������ʱֱ�Ӽ���ƽ��ֵ
			$�۳���߷�[$������Ա] = '';
			$�۳���ͷ�[$������Ա] = '';
		}


		$���������� = count($����������Values);
		$������������ = array_sum($����������Values);
		//print_R($P10);
		if($����������>0)	$ƽ��ֵ = number_format($������������/($����������*5),2,'.','');
		else	$ƽ��ֵ = 0;

		$Result[$������Ա] = $ƽ��ֵ;
		$����������������Ա[$������Ա] = $����������;
		$������������������Ա[$������Ա] = $������������;

	}


	@arsort($Result);

	$������Ա���� = @array_keys($Result);
	$������Ա��ֵ = @array_values($Result);
	//$������Ա��ֵ[2] = '8.80';
	//print_R($������Ա��ֵ);
	//$Result['��Ա'] = '8.80';

	//������Ϣ
	$ArrayValues = @array_values($Result);
	$NewSortArrayValues = array();
	for($i=0;$i<sizeof($ArrayValues);$i++)		{
		$Values = $ArrayValues[$i];
		if(!in_array($Values,$NewSortArrayValues))	{
			$NewSortArray[$Values] = $i+1;
			array_push($NewSortArrayValues,$Values);
		}
	}
	//print_R($NewSortArray);


	for($i=0;$i<sizeof($������Ա����);$i++)		{
		$������Ա = $������Ա����[$i];
		$���� = $ResultNum[$������Ա];
		$�ۺϽ�� = $������Ա��ֵ[$i];
		$SHOWTEXT = "�۳���߷�:".$�۳���߷�[$������Ա]." �۳���ͷ�:".$�۳���ͷ�[$������Ա]." ʵ������������:".$����������������Ա[$������Ա]." ʵ���������ܷ�:".$������������������Ա[$������Ա]."";
		print "<tr class=TableData >
				<td  align=left title='$SHOWTEXT'>&nbsp;$������Ա</td>
				<td  align=left title='$SHOWTEXT'>&nbsp;".$Infor[$������Ա]['��λ']."</td>
				<td  align=left title='$SHOWTEXT'>&nbsp;".$Infor[$������Ա]['ְ��']."</td>
				<td  align=left title='$SHOWTEXT'>&nbsp;".$����."</td>
				<td  align=left title='$SHOWTEXT'>&nbsp;$�ۺϽ��</td>
				<td  align=left title='$SHOWTEXT'>&nbsp;".$NewSortArray[$�ۺϽ��]."</td>
				</tr>";
	}

print "</table><BR>";
?>
<div align=center>
<INPUT TYPE="button" VALUE="����" class=SmallButton ONCLICK="location='?pageAction=ExportDataToFile&��������=<?=$��������?>'">
</div>