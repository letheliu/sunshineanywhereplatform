<?

	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);

	// display warnings and errors
	error_reporting(E_WARNING | E_ERROR);


	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();

	page_css("���߱�������-���߱���-���߱���ͳ�ƹ���");

	//*******************�����ѯ*******************//

	if($_GET['action'] == "")
	{
	$sql = "select ����  from edu_baomingname";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs -> GetArray();
	$���� = $rs_a;
	$ѡ������ = $_GET['����'];

if($_GET['����']=="") {
	$ѡ������ = $����[0]['����'];
}

	//*******************�����ѯ*******************//
				//********��������********//
	print "<Table class=TableBlock width=100%>
			<Tr class=TableHeader>
			 <Td colspan=60 align=left>���߱�������ͳ������</Td>
			</Tr>";

	print	"<Tr class=TableData>";
	print	 "<Form name=factor>";

	print	 "<Td align=center>����</Td>";
	print	 "<Td align=center>";
	print	 "<Select name='term' onChange=\"var jmpURL='?flag=1&����=' + this.options[this.selectedIndex].value; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0;}\">";
			   for($i=0;$i<sizeof($����);$i++)
			   {
				   if($ѡ������==$����[$i]['����'])
				   {
					   $Selected = "selected";
				   }
				   else
				   {
					   $Selected = "";
				   }
	print		  "<Option value='".$����[$i]['����']."' ".$Selected.">".$����[$i]['����']."</Option>";
			   }
	print	 "</Select>";
	print	 "</Td></table><br>";

		  //---------------------------------������ʾ��----------------------------

$sql ="SELECT �༶,count(*) as ���� FROM `edu_baomingdetail` where ���� = '".$ѡ������."' group by `�༶`";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs -> GetArray();

	   	print "<Table class=TableBlock width=100%>
			<Tr class=TableHeader><Td colspan=2 align=left>��".($ѡ������)."�����༶�������ͳ��</Td></Tr>";
		print  "<Tr class=TableData>
		<td align=center  nowrap>�༶</td><td align=center  nowrap>��������</td>";

	 for($i=0;$i<sizeof($rs_a);$i++)
	 {
		 if($i%2==0) $color="green"; else $color="red";
		 //print_R($rs_a);
		 $URL = "edu_baomingdetail_newai.php?action=init_customer&�༶=".$rs_a[$i]['�༶']."&����=$ѡ������&action_close=close";
		 print "<Tr class=TableData>";
		 print "<Td nowrap align=center><font color=$color>".$rs_a[$i]['�༶']."</font></Td>";
		 print "<Td nowrap align=center><a href =\"$URL\" target=_blank><font color=$color>".$rs_a[$i]['����']."</font></a></Td>";
		 print "</Tr>";
	 }
	print "</table>";
	}
?><?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>