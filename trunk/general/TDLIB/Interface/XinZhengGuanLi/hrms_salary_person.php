<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');//

$GLOBAL_SESSION=returnsession();
//echo 'hello';
$����=$_GET['bumen'];$����=$_GET['name'];$���=$_GET['y'];$�·�=$_GET['m'];
//echo $����.$����.$���.$�·�;
page_css("н��ͳ��");
$��Ϣ=InFo($����,$���,$�·�);
//print_r($��Ϣ);
echo '<table class="TableBlock" align="center">';echo '<tr class="TableHeader">';
echo '<td>���</td>';echo '<td>���</td>';echo '</tr>';

for($i=0;$i<sizeof($��Ϣ);$i++){
  echo '<tr class="TableData" align="center">';
  echo '<td>'.$��Ϣ[$i]['��������'].'</td>';
   echo '<td>'.$��Ϣ[$i]['���'].'</td>';
  echo '</tr>';
}
echo '</table>';
?>

<?
function InFo($name,$y,$m){
 global $db;
 $sql="select ��������,��� from hrms_salary_detail where ������Ա='".$name."' and ���='".$y."' and �·�='".$m."'";
 $rs=$db->Execute($sql);
$rs_a = $rs -> GetArray();
		if(!is_array($rs_a))
		$rs_a = array();
		$��Ϣ = $rs_a;
		return $��Ϣ;

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