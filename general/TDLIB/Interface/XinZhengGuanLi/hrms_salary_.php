<? 
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');
	
	$GLOBAL_SESSION=returnsession();
	
global $db;
$sql="select ѧ������,�·�,���,�������,��������,������Ա,��ע,������,����ʱ�� from hrms_salary";

$rs=$db->Execute($sql);
while (!$rs->EOF){

    $name=explode(',',$rs->fields['������Ա']);
   // print_r($name);print $rs->fields['��������'];
    if($rs->fields['��������'] != ''){
        $salary=$db->Execute("select ��� from hrms_salary_type where ��������='".$rs->fields['��������']."'");
        while(!$salary->EOF){$money=$salary->fields['���'];$salary->MoveNext();}$salary->Close();
    }
   
    for($i=0;$i<sizeof($name);$i++){
        $detailsql="insert into hrms_salary_detail(ѧ������,�·�,���,�������,��������,���,������Ա,��ע,������,����ʱ��) values('".$rs->fields['ѧ������']."',".$rs->fields['�·�'].",".$rs->fields['���'].",'".$rs->fields['�������']."','".$rs->fields['��������']."',".$money.",'".$name[$i]."','".$rs->fields['��ע']."','".$rs->fields['������']."','".$rs->fields['����ʱ��']."')";
       $db->Execute($detailsql);
    }
     
     
    $rs->MoveNext();
}
$rs->Close();


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