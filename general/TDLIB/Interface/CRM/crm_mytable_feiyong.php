<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();

page_css("CRM�������ģ��");

$user_id = $_SESSION['LOGIN_USER_ID'];
//$user_name = $_SESSION['LOGIN_USER_NAME'];
//$user_name = returntablefield(user,);
$module_desc = "CRM�������";
$max_count = "3";
$module_body = "";

$sql = "select * from crm_expense where ������='$user_id' order by ����ʱ�� desc limit 0,$max_count";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
if(count($rs_a)>0){

$module_body .= "<table border=0 class=TableBlock width=50%>";
  for($i=0;$i<count($rs_a);$i++){
	 if($rs_a[$i]['�Ƿ����'] == 1){
	   $boolen = "<img src=\"images/right.gif\" align=\"absmiddle\">";
	 }
	 if($rs_a[$i]['�Ƿ����'] == 0){
	   $boolen = "<img src=\"images/error.gif\" align=\"absmiddle\">";
	 }
	 $���     = $rs_a[$i]['���'];
	 $���õ��� = '���ţ�'.$rs_a[$i]['���õ���'];
     
	 $module_body .= "<tr class=TableBlock>
						<td valign=Middle align=left>
						<img src=\"images/arrow_r.gif\" align=\"absmiddle\">&nbsp;
                        ".$boolen."&nbsp;".$rs_a[$i]['�ͻ�����']."</td>
						<td valign=Middle align=left><font color=green><a href=crm_expense_person_newai.php?action=view_default&���=$���; title=".$���õ���.">".$rs_a[$i]['���ù�ͨ����']."</a></font></td>
						<td valign=Middle align=right><font color=green>[".$rs_a[$i]['��������']."]</font>&nbsp;".$rs_a[$i]['����ʱ��']."</td>
					  </tr>";

     //$module_body .= "<li>".$boolen."&nbsp;".$rs_a[$i]['�ͻ�����']."&nbsp;<font color=green><a href=crm_expense_person_newai.php?action=view_default&���=$���; title=".$���õ���.">".$rs_a[$i]['���ù�ͨ����']."</a></font>(".$rs_a[$i]['����ʱ��'].")</li>";
  }
  $module_body .= "</table>";
}
if(count($rs_a) == 0){
   $module_body .= "<li><font color=red>���޷���</font></li>";
}

/*
$module_body .= "<ul>
				<script>
					function plan_detail(���)
					{
						URL='crm_expense_person_newai.php?action=view_default&���='+���;
						myleft=(screen.availWidth-500)/2; window.open(URL,'read_work_plan','height=500,width=600,status=1,toolbar=no,menubar=no,location=no,scrollbars=yes,top=120,left='+myleft+',resizable=yes');
					}
				</script>";
*/
echo $module_body;
?>

<?
/*
	��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�Ѿ��ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

	��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
	��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>