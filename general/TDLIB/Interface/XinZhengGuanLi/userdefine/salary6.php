<?

$salary6 = "н��";
function salary6_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = 0;
	$��������=strip_tags($fields['value'][$i]['��������']);
	$����=strip_tags($fields['value'][$i]['����']);
	$���=strip_tags($fields['value'][$i]['���']);
	//$һ�� = strip_tags($fields['value'][$i]['һ��']);
	
	//$���� = strip_tags($fields['value'][$i]['����']);
	//$���� = strip_tags($fields['value'][$i]['����']);
	//$����  = strip_tags($fields['value'][$i]['����']);
	//$���� = strip_tags($fields['value'][$i]['����']);
	$���� = strip_tags($fields['value'][$i]['����']);
	//$���� = strip_tags($fields['value'][$i]['����']);
	//$���� = strip_tags($fields['value'][$i]['����']);
	//$���� = strip_tags($fields['value'][$i]['����']);
	//$ʮ�� = strip_tags($fields['value'][$i]['ʮ��']);
	//$ʮһ�� = strip_tags($fields['value'][$i]['ʮһ��']);
	//$ʮ���� = strip_tags($fields['value'][$i]['ʮ����']);
	
	//if($һ�� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=1\">'.$һ��.'</a>';
	
	//if($���� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=2\">'.$����.'</a>';
	//if($���� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=3\">'.$����.'</a>';
	//if($���� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=4\">'.$����.'</a>';
	//if($���� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=5\">'.$����.'</a>';
	if($���� != 0) $Text="<a href='hrms_salary_person.php?bumen=".$��������."&name=".$����."&y=".$���."&m=6'>".$����.'</a>';
	//if($���� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=7\">'.$����.'</a>';
	//if($���� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=8\">'.$����.'</a>';
	//if($���� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=9\">'.$����.'</a>';
	//if($ʮ�� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=10\">'.$ʮ��.'</a>';
	//if($ʮһ�� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=11\">'.$ʮһ��.'</a>';
	//if($ʮ���� != 0) $Text='<a href=\"hrms_salary_person.php?bumen=$��������&name=$����&y=$���&m=12\">'.$ʮ����.'</a>';
	
	




	return $Text;
}
?><?
/*
	��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

	��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
	��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>