<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css('CRM����');

$user_id = $_SESSION['LOGIN_USER_ID'];
//����CRM�������ò���
include('crm_config_mytable.php');

//�õ�crm_mytable_newai.php��������ʾ����
$mytable_arr = array();
$CCCCC1 = 0;
$CCCCC2 = 0;
$sql = "select * from crm_mytable where ������='".$user_id."' order by ģ���� ASC";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($IXXXX=0;$IXXXX<count($rs_a);$IXXXX++){
   $ģ������ = $rs_a[$IXXXX]['ģ������'];
   if($ģ������=="�û���ѡ" or $ģ������=="�û���ѡ"){
	   $ģ������ = $rs_a[$IXXXX]['ģ������'];
	   if($rs_a[$IXXXX]['ģ��λ��'] == "���") {
		   $NewArray1[$CCCCC1] = $ģ������;
		   $CCCCC1++;
	   }
	   if($rs_a[$IXXXX]['ģ��λ��'] == "�ұ�") {
		   $NewArray2[$CCCCC2] = $ģ������;
		   $CCCCC2++;
	   }
	   $mytable_arr[$ģ������]['ģ����'] = $rs_a[$IXXXX]['ģ����'];
	   $mytable_arr[$ģ������]['ģ��λ��'] = $rs_a[$IXXXX]['ģ��λ��'];
	   $mytable_arr[$ģ������]['ģ������'] = $rs_a[$IXXXX]['ģ������'];
	   $mytable_arr[$ģ������]['��ʾ����'] = $rs_a[$IXXXX]['��ʾ����'];
	   $mytable_arr[$ģ������]['������ʾ'] = $rs_a[$IXXXX]['������ʾ'];
   }
}
//�õ���������ģ��ĸ�����Ȼ��������Ӧ�÷��������
$CCCCC = $CCCCC1>$CCCCC2?$CCCCC1:$CCCCC2;
$n = 0;

print "<table id=\"tblContainer\" border=\"0\"  width=\"100%\">";

for($IXXXX=0;$IXXXX<$CCCCC;$IXXXX++)				{
	print "<tr>";
	$ģ������	= $NewArray1[$IXXXX];
	$valueVVVVVVV		= $mytable_arr[$ģ������];
	if($valueVVVVVVV['ģ������']=="�û���ѡ" or $valueVVVVVVV['ģ������']=="�û���ѡ"){
	   if($valueVVVVVVV['ģ��λ��'] == "���"){
	   $������ʾ  = $valueVVVVVVV['������ʾ'];
	   $max_count = $valueVVVVVVV['��ʾ����'];
	   print "<td valign=\"top\" align=\"left\" width=\"$�����Ŀ���%\">";
	   include_once("$ģ������");
	   print "</td>";
	   }
	}

	$ģ������	= $NewArray2[$IXXXX];
	$valueVVVVVVV		= $mytable_arr[$ģ������];
	if($valueVVVVVVV['ģ������']=="�û���ѡ" or $valueVVVVVVV['ģ������']=="�û���ѡ"){
	if($valueVVVVVVV['ģ��λ��'] == "�ұ�"){
	   $������ʾ  = $valueVVVVVVV['������ʾ'];
	   $max_count = $valueVVVVVVV['��ʾ����'];
	   print "<td valign=\"top\" align=\"left\" width=\"50%\">";
	   include_once("$ģ������");
	   print "</td>";
	   }
	}
	print "</tr>";
}
print "</table>";

/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�Ѿ��ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
*/
?>


<?
/*
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css('CRM����');

$user_id = $_SESSION['LOGIN_USER_ID'];
//����CRM�������ò���
include('crm_config_mytable.php');
/*
print "<script type=\"text/javascript\">
		var cRows = tblContainer.rows;
		var row;
		for (var i=0; i<cRows.length; i++)
		{
			row = cRows[i];
			row.cells[0].firstChild.height = row.cells[1].offsetHeight;
		}
    </script>";
*/
//�õ�crm_mytable_newai.php��������ʾ����
/*
$mytable_arr = array();
$count1 = 0;
$count2 = 0;
$sql = "select * from crm_mytable where ������='".$user_id."' order by ģ���� ASC";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($i=0;$i<count($rs_a);$i++){
   $ģ������ = $rs_a[$i]['ģ������'];
   if($rs_a[$i]['ģ��λ��'] == "���") $count1++;
   if($rs_a[$i]['ģ��λ��'] == "�ұ�") $count2++;
   $mytable_arr[$ģ������]['ģ����'] = $rs_a[$i]['ģ����'];
   $mytable_arr[$ģ������]['ģ��λ��'] = $rs_a[$i]['ģ��λ��'];
   $mytable_arr[$ģ������]['ģ������'] = $rs_a[$i]['ģ������'];
   $mytable_arr[$ģ������]['��ʾ����'] = $rs_a[$i]['��ʾ����'];
   $mytable_arr[$ģ������]['������ʾ'] = $rs_a[$i]['������ʾ'];
}
//�õ���������ģ��ĸ�����Ȼ��������Ӧ�÷��������
$count = $count1>$count2?$count1:$count2;
$n = 0;

print "<table id=\"tblContainer\" border=\"0\"  width=\"100%\" height=\"100%\">";
print "<tr><td valign=\"top\" align=\"left\" width=\"$�����Ŀ���%\">";

print "<table border=\"0\"  width=\"100%\" height=\"100%\">";
foreach($mytable_arr as $key => $value){
    if($value['ģ��λ��'] == "���"){
	   $������ʾ  = $value['������ʾ'];
	   $max_count = $value['��ʾ����'];
	   if($value['ģ������']=="�û���ѡ" or $value['ģ������']=="�û���ѡ"){
		   print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\" width=\"50%\">";
		   include("$key");
		   print "</td></tr>";
	   }
	}
}
print "</table>";
print   "</td><td valign=\"top\" align=\"left\" width=\"50%\">";

print "<table id=\"tblContainer\" border=\"0\"  width=\"100%\" height=\"100%\">";
foreach($mytable_arr as $key => $value){
    if($value['ģ��λ��'] == "�ұ�"){
	   $������ʾ  = $value['������ʾ'];
	   $max_count = $value['��ʾ����'];
	   if($value['ģ������']=="�û���ѡ" or $value['ģ������']=="�û���ѡ"){
		   print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\" width=\"50%\">";
		   include("$key");
		   print "</td></tr>";
	   }
	}
}
print "</table>";

print "</td></tr>";
print "</table>";


/*
print "<table id=\"tblContainer\" border=\"0\" class=\"TableBlock\" width=\"100%\" height=\"100\">";

print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\" width=50%>";
include('crm_mytable_kehugaishu.php');
print   "</td><td valign=\"top\" align=\"left\">";
include('crm_kehu_birthday.php');
print   "</td></tr>";

print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\">";
include('crm_mytable_hetong.php');
print   "</td><td valign=\"top\" align=\"left\">";
include('crm_notes.php');
print   "</td></tr>";

print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\">";
include('crm_mytable_feiyong.php');
print   "</td><td valign=\"top\" align=\"left\">";
include('crm_mytable_tongzhi.php');
print   "</td></tr>";

print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\">";
include('crm_mytable_fuwu.php');
print   "</td><td valign=\"top\" align=\"left\">";
include('kehu_chaxun.php');
print   "</td></tr>";

print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\">";
include('crm_mytable_dingdan.php');
print   "</td><td valign=\"top\" align=\"left\">";
include('crm_google.php');
print   "</td></tr>";

print "</table>";
*/
?>
<?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�Ѿ��ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
*/
?>



