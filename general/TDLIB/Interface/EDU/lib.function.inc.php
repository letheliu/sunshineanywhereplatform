<?


function ��ʼ����ʦ������������ܴ���Ϣ($��ǰѧ��)		{
	global $db;
	$sql = "select �ܴ�,�������� from edu_teacherkaoqinmingxi where �ܴ�<'0' and ѧ��='$��ǰѧ��'";
	$rs = $db->CacheExecute(30,$sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$�������� = $rs_a[$i]['��������'];
		$�ܴ� = $rs_a[$i]['�ܴ�'];
		$���ܴ�	= returnCurWeekIndex($��������);
		$sql = "update edu_teacherkaoqinmingxi set �ܴ�='$���ܴ�' where �ܴ�='$�ܴ�'";
		$db->Execute($sql);
		//print $sql."<BR>";
	}

	$sql = "select �ܴ�,�������� from edu_studentkaoqin where �ܴ�<0 and ѧ������='$��ǰѧ��'";
	$rs = $db->CacheExecute(30,$sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$�������� = $rs_a[$i]['��������'];
		$�ܴ� = $rs_a[$i]['�ܴ�'];
		$���ܴ�	= returnCurWeekIndex($��������);
		$sql = "update edu_studentkaoqin set �ܴ�='$���ܴ�' where �ܴ�='$�ܴ�'";
		$db->Execute($sql);
		//print $sql."<BR>";
	}

}

function ��ʼ��ѧУ������Ϣ($tablename='edu_schoolbaseinfor',$fieldname='ѧУ����')		{
	global $db;
	//�����û���Ϣ�Ƿ����
	$sql = "select COUNT(*) AS NUM from $tablename";
	$rs = $db->Execute($sql);
	$NUM = $rs->fields['NUM'];
	$sql = "select UNIT_NAME from unit limit 1";
	$rs = $db->Execute($sql);
	$UNIT_NAME = $rs->fields['UNIT_NAME'];
	if($NUM==0)			{
		$sql = "insert into $tablename($fieldname) values('$UNIT_NAME')";
		$db->Execute($sql);
	}
	else	{
		$sql = "update $tablename set $fieldname='$UNIT_NAME'";
		$db->Execute($sql);
	}
}


function ��ʱִ�к���($��������='ͬ����ѧ�ƻ�ѧ����Ϣ���ɼ����ݱ�֮��',$���ʱ��='30')			{
	//���д������ݿ���ͬ������
	$�������� = "��ʱִ�к���_".$��������;
	//session_unregister($��������);//����ʹ�õ��д���
	if(!session_is_registered($��������))		{
		session_register($��������);
		$_SESSION[$��������] = time();
	}
	$����ʱ���� = time();
	$ʱ��� = $����ʱ���� - $_SESSION[$��������];
	$ʱ���CEIL = ceil($ʱ���/60);
	//print_R($ʱ���);
	//print $��������.":".$ʱ���." ".date("H:i",$_SESSION[$��������])."<BR>";
	//print $PHP_SELF_BEGIN."<BR>";
	//��ʱ�䳬��ĳһֵ,����ͷһ�η��ʵ�ʱ��,��Ҫִ�д˹���
	if($ʱ���CEIL>=$���ʱ��||$ʱ���==0)							{
		//ִ�в������ݹ����Ĳ���
		$��������();
		//���±��ʱ��
		$_SESSION[$��������] = time();
	}//exit;
}


function �Զ�����������������ְ��Ա�����Ķ�������()			{
	global $db;
	$MetaDatabases = $db->MetaDatabases();
	if(in_array("TD_OA",$MetaDatabases))				{
		$tablenamePRE = "TD_OA.user";
	}
	else	{
		$tablenamePRE = "user";
	}
	$sql = "delete from edu_xingzheng_kaoqinmingxi where ��Ա�û��� not in (select USER_ID from $tablenamePRE where DEPT_ID>'0')";
	$db->Execute($sql);
	//print $sql."<BR>";
	$sql = "delete from edu_xingzheng_jiabanbuxiu where ��Ա�û��� not in (select USER_ID from $tablenamePRE where DEPT_ID>'0')";
	$db->Execute($sql);
	//print $sql."<BR>";
	$sql = "delete from edu_xingzheng_kaoqinbudeng where ��Ա�û��� not in (select USER_ID from $tablenamePRE where DEPT_ID>'0')";
	$db->Execute($sql);
	//print $sql."<BR>";
	$sql = "delete from edu_xingzheng_qingjia where ��Ա�û��� not in (select USER_ID from $tablenamePRE where DEPT_ID>'0')";
	$db->Execute($sql);
	//print $sql."<BR>";
	$sql = "delete from  edu_xingzheng_tiaoban where ��Ա�û��� not in (select USER_ID from $tablenamePRE where DEPT_ID>'0')";
	$db->Execute($sql);
	//print $sql."<BR>";
	$sql = "delete from  edu_xingzheng_tiaobanxianghu where ԭ��Ա�û��� not in (select USER_ID from $tablenamePRE where DEPT_ID>'0')";
	$db->Execute($sql);
	//print $sql."<BR>";
	$sql = "delete from  edu_xingzheng_tiaobanxianghu where ����Ա�û��� not in (select USER_ID from $tablenamePRE where DEPT_ID>'0')";
	$db->Execute($sql);
	//print $sql."<BR>";
	$sql = "delete from  edu_xingzheng_tiaoxiububan where ��Ա�û��� not in (select USER_ID from $tablenamePRE where DEPT_ID>'0')";
	$db->Execute($sql);
	//print $sql."<BR>";

	$sql = "select ���,�Ű���Ա from edu_xingzheng_paiban";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)				{
		$��� = $rs_a[$i]['���'];
		$�Ű���Ա = $rs_a[$i]['�Ű���Ա'];
		$USER_NAME = returntablefield('user',"USER_ID",$�Ű���Ա,"USER_NAME");
		if($USER_NAME=="")		{
			$�Ű���Ա��� = useridfilter($�Ű���Ա);
			$sql = "update edu_xingzheng_paiban set �Ű���Ա='$�Ű���Ա���' where ���='$���'";
			$db->Execute($sql);
			//print $sql."<BR>";
		}
	}//exit;

}

function �ֶ�������������¥��Ϣ()			{
	global $db;
	if($_GET['action']==''||$_GET['action']=='init_default')		{
		$sql = "select ����¥���� from dorm_building order by ����¥����";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		$�������� = date("Y-m-d");
		$����¥����_lin = "������¥����:";
		for($i=0;$i<sizeof($rs_a);$i++)		{
			$����¥���� = $rs_a[$i]['����¥����'];
			$����¥����_lin .= "&nbsp;<a href='?".base64_encode("XX=XX&XX&����¥=$����¥����&��������_��ʼʱ��=$��������&��������_����ʱ��=$��������&���ٲ�ѯ=���ٲ�ѯ&pageid=1&action=export_default_data&exportfield=1,2,3,4,5,6,7,8,9,10,11&tablename=edu_susheweishengday&XX=XX")."'>$����¥����</a>";
		}
		$PrintText .= "<table  class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableData><td ><font color=green >$����¥����_lin
		</font></td></table><BR>";
		print $PrintText;
	}
}


function ͬ�����᷿����Ϣ��ÿ������ҳ��()			{
	global $db;
	$���� = date("w");
	if($����>=1&&$����<=5)							{
		$sql = "select COUNT(*) AS NUM from edu_susheweishengday where ��������='$��������'";
		$rs = $db->Execute($sql);
		$NUM = $rs->fields['NUM'];
		if($NUM==0)			{
			$�������� = date("Y-m-d");
			$����ʱ�� = date("Y-m-d H:i:s");
			$�ܴ�	= returnCurWeekIndex($��������);
			$���� = date("w");
			$��ǰѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
			$sql = "select ��������,����¥ from dorm_room order by ��������";
			$rs = $db->Execute($sql);
			$rs_a = $rs->GetArray();
			for($i=0;$i<sizeof($rs_a);$i++)		{
				$�������� = $rs_a[$i]['��������'];
				$����¥ = $rs_a[$i]['����¥'];
				$sql = "select COUNT(*) AS NUM from edu_susheweishengday where ��������='$��������' and ��������='$��������'";
				$rs = $db->Execute($sql);
				$NUM = $rs->fields['NUM'];
				if($NUM==0)			{
					$sql = "INSERT INTO `edu_susheweishengday`  VALUES ('','$��ǰѧ��','$����¥', '$��������', '$��������','$�ܴ�','$����','$������','$��������','$�����۷�ԭ��','$���ɷ���','$���ɿ۷�ԭ��','$����ʱ��','$������')";
					$rs = $db->Execute($sql);
					//print $sql."<BR>";
				}
			}
		}//NUM==0
	}//����==5
}//���  ѧ��  ����¥  ��������  ��������  �ܴ�  ����  ������  ��������  �����۷�ԭ��  ���ɷ���  ���ɿ۷�ԭ��  ����ʱ��


//����༶���Ƹ�����Ĳ���Ӧ���
function ����༶���Ƹ�����Ĳ���Ӧ���()			{
	global $db,$_GET;
	$sql = "select distinct �༶ from edu_exam,edu_banji where edu_exam.�༶=edu_banji.�༶���� and edu_exam.����!=edu_banji.��ѧ���";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$�༶ = $rs_a[$i]['�༶'];
		$���� = returntablefield("edu_banji","�༶����",$�༶,"��ѧ���");
		$sql = "update edu_exam set ����='$����' where �༶='$�༶'";
		$db->Execute($sql);
		print $sql."<BR>";
	}
}

//ͬ����ѧ�ƻ�ѧ����Ϣ���ɼ����ݱ�֮��
function ͬ����ѧ�ƻ�ѧ����Ϣ���ɼ����ݱ�֮��()			{
	global $db,$_GET;
	$sql = "select �༶����,���ν�ʦ,��ʦ�û���,����ѧ��,�γ�����,��ѧʱ,ѧ�� from edu_planexec where ����ѧ��='".$_GET['ѧ������']."' and ѧ��>0";
	//print_R($_GET);
	//print $sql."<BR>";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)				{
		$�γ����� = $rs_a[$i]['�γ�����'];
		$��ʦ�û��� = $rs_a[$i]['��ʦ�û���'];
		$���ν�ʦ = $rs_a[$i]['���ν�ʦ'];
		$�༶���� = $rs_a[$i]['�༶����'];
		$����ѧ�� = $rs_a[$i]['����ѧ��'];
		$ѧ�� = $rs_a[$i]['ѧ��'];
		$sql = "";
		if($���ν�ʦ!="")		{
			$sql = "update edu_exam set ѧ��='$ѧ��',��ʦ='$���ν�ʦ' where ѧ������='$����ѧ��' and �༶='$�༶����' and �γ�='$�γ�����' ";
		}
		else	{
			$sql = "update edu_exam set ѧ��='$ѧ��' where ѧ������='$����ѧ��' and �༶='$�༶����' and �γ�='$�γ�����' ";
		}
		$db->Execute($sql);
		//print $sql."<BR>";
	}
}



//ͬ��OA�û�����ʦ������Ϣ��
function ͬ��OA�û�����ʦ������Ϣ��()			{
	global $db,$_GET;
	$sql = "select * from user";
	//print_R($_GET);
	//print $sql."<BR>";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs->GetArray();
	//print_R($rs_a);
	for($i=0;$i<sizeof($rs_a);$i++)				{
		$USER_ID	= $rs_a[$i]['USER_ID'];
		$USER_NAME	= $rs_a[$i]['USER_NAME'];
		$BYNAME		= $rs_a[$i]['BYNAME'];
		$TEL_NO_DEPT= $rs_a[$i]['TEL_NO_DEPT'];
		$DEPT_ID= $rs_a[$i]['DEPT_ID'];
		$DEPT_NAME	= returntablefield("department","DEPT_ID",$DEPT_ID,"DEPT_NAME");;
		if($BYNAME=="") $BYNAME = $USER_ID;
		$BIRTHDAY	= $rs_a[$i]['BIRTHDAY'];

		$sql		= "select COUNT(*) AS NUM from edu_teachermanage where �û���='$USER_ID'";
		$rs			= $db->Execute($sql);
		if($rs->fields['NUM']==0)		{
			$sql = "insert into edu_teachermanage (��ʦ���,����,�û���,��������,�绰����,���ڲ���,������,����ʱ��,�Ƿ��ڸ�)
					values('$BYNAME','$USER_NAME','$USER_ID','$BIRTHDAY','$TEL_NO_DEPT','$DEPT_NAME','".$_SESSION['LOGIN_USER_ID']."','".date('Y-m-d H:i:s')."','1')";
			$db->Execute($sql);
			//print $sql."<BR>";
		}
	}
}


//ͬ����ѧ�ƻ�����İ༶������Ϣ
function ͬ����ѧ�ƻ�����İ༶������Ϣ($ѧ������)  {
	global $db,$CurXueQi;
	$sql = "select distinct �༶���� from edu_planexec where ����ѧ��='$ѧ������'";
	//print "<BR>ͬ����ѧ�ƻ�����İ༶������Ϣ:".$sql."<BR>";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NewArray = array();
	for($i=0;$i<sizeof($rs_a);$i++)				{
		$�༶ = $rs_a[$i]['�༶����'];
		$�༶���� =  returnClassNumber($�༶);
		$sql = "update edu_planexec set �༶����='$�༶����' where �༶����='$�༶'";
	    $db->Execute($sql);
		global $SHOWTEXT; if($SHOWTEXT)print "<BR>ͬ����ѧ�ƻ�����İ༶������Ϣ:".$sql."<BR>";
	}
}


function רҵTO����()		{
	global $db;
	if($_GET['ϵ����']!="")			{
		$ADDSQL = "where ����ϵ in ('".ereg_replace(",","','",$_GET['ϵ����'])."')";
	}
	else	if($_GET['רҵ����']!="")			{
		$ADDSQL = "where רҵ���� in ('".ereg_replace(",","','",$_GET['רҵ����'])."')";
	}
	else	{
		$ADDSQL = "";
	}
	$sql = "select רҵ����,רҵ����,����ϵ from edu_zhuanye $ADDSQL order by ����ϵ,רҵ����";
	//print $sql;
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs->GetArray();
	$NewArray = array();
	for($i=0;$i<sizeof($rs_a);$i++)				{
		$רҵ���� = $rs_a[$i]['רҵ����'];
		$רҵ���� = $rs_a[$i]['רҵ����'];
		$����ϵ = $rs_a[$i]['����ϵ'];
		$NewArray['ALL'][$����ϵ][$רҵ����] = $רҵ����;
		$NewArray['DEPT'][$רҵ����] = $רҵ����;
		$NewArray['FANXU'][$רҵ����] = $����ϵ;
	}
	return $NewArray;
}

function ϵTO����()		{
	global $db;
	if($_GET['ϵ����']!="")			{
		$ADDSQL = "where ϵ���� in ('".ereg_replace(",","','",$_GET['ϵ����'])."')";
	}
	else	{
		$ADDSQL = "";
	}
	$sql = "select ϵ����,ϵ���� from edu_xi $ADDSQL order by ϵ����";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs->GetArray();
	$NewArray = array();
	for($i=0;$i<sizeof($rs_a);$i++)				{
		$ϵ���� = $rs_a[$i]['ϵ����'];
		$ϵ���� = $rs_a[$i]['ϵ����'];
		$NewArray[$ϵ����] = $ϵ����;
	}
	//print_R($ADDSQL);
	return $NewArray;
}

function �õ���ǰ�û��������רҵ������Ϣ($רҵ����X="רҵ����")		{
	global $db,$_GET,$_SESSION,$_GETȨ�����Ʊ���ֵ;
	$LOGIN_USER_ID = $_SESSION['LOGIN_USER_ID'];
	$sql = "select ϵ���� from edu_xi where ���������� like '%".$LOGIN_USER_ID.",%'";
	$rs = $db->CacheExecute(15,$sql);;
	$rs_a = $rs->GetArray();
	$ϵ���� = array();
	for($i=0;$i<sizeof($rs_a);$i=$i+1)		{
		$ϵ����[] = $rs_a[$i]['ϵ����'];
	}
	$ϵ�����ı� = "'".join("','",$ϵ����)."'";

	$sql = "select רҵ���� from edu_zhuanye where ����ϵ in ($ϵ�����ı�)";
	$rs = $db->CacheExecute(15,$sql);;
	$rs_a = $rs->GetArray();
	$רҵ���� = array();
	for($i=0;$i<sizeof($rs_a);$i=$i+1)		{
		$רҵ����[] = $rs_a[$i]['רҵ����'];
	}

	//����GET��ֵ,2010-9-25����
	//���GET��ֵֻ��һ��,������GET��ֵ,���GET��ֵΪ����������,����ϵͳֵ
	$GET����ֵ = explode(',',$_GET[$רҵ����X]);
	//print_R($רҵ����);
	if($GET����ֵ[0]!=''&&$GET����ֵ[1]=='')			{
		//��ʾGETֵֻ��һ��
	}
	else		{
		//GETֵΪ��,����Ϊ���ʱ,�����ϵͳȨ���ض���
		$_GET[$רҵ����X] = join(",",$רҵ����);
	}
	$_GETȨ�����Ʊ���ֵ[$רҵ����X] = join(",",$רҵ����);
}

function �޸�ʱͬ������¥��������($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update dorm_liusu set ����¥='$��ֵ' where ����¥='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_room set ����¥='$��ֵ' where ����¥='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_rooming set ����¥='$��ֵ' where ����¥='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_louzhangguanli set ����¥='$��ֵ' where ����¥='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_susheweisheng set ����¥='$��ֵ' where ����¥='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_susheweishengday set ����¥='$��ֵ' where ����¥='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_wanguixinxi set ����¥='$��ֵ' where ����¥='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_weizhangxinxi set ����¥='$��ֵ' where ����¥='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_wenmingsushe set ����¥='$��ֵ' where ����¥='$��ֵ'";
  $db->Execute($sql);

}


function �޸�ʱͬ��������������($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update edu_susheweisheng set ��������='$��ֵ' where ��������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_susheweishengday set ��������='$��ֵ' where ��������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_wanguixinxi set ��������='$��ֵ' where ��������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_weizhangxinxi set ��������='$��ֵ' where ��������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_wenmingsushe set ��������='$��ֵ' where ��������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_rooming set �����='$��ֵ' where �����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_repeating set ���޷����='$��ֵ' where ���޷����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_liusu set �����='$��ֵ' where �����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_changelog set �·����='$��ֵ' where �·����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_changelog set ԭ�����='$��ֵ' where ԭ�����='$��ֵ'";
  $db->Execute($sql);
}


function �޸�ʱͬ���γ�����($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update bukao_automation set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_banjikemu set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_jiaoshi set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_student set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_course set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_exam set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiaoxueriji2 set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiaoxuerijibudeng set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kecheng set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kechengshenqing set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kechoujisuan set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kewaifudao set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_pingjiamingxi set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_plan set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_planexec set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_planexec set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedule set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedule2 set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduledaike set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedulefenduanjiaoxue set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletiaoke set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletingkefuke set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcardkaoqinmingxi set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentkaoqin set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacherkaoqinbudeng set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacherkaoqinmingxi set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tingke set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tingke_kaoqinbudeng set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update paikao_automation set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update paikao_banjikemu set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update remote_course set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update remote_courseapply set �γ�����='$��ֵ' where �γ�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update school_homeworkupload set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
  $sql = "update tiku_chengji set �γ�='$��ֵ' where �γ�='$��ֵ'";
  $db->Execute($sql);
}
function �޸�ʱͬ����������($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update edu_classroom set ��������='$��ֵ' where ��������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_classroomapply set ��������='$��ֵ' where ��������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiaoxuerijibudeng set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedule set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedule2 set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduledaike set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedulefenduanjiaoxue set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletiaoke set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletiaokexianghu set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletingkefuke set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcardkaoqinmingxi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacherkaoqinbudeng set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacherkaoqinmingxi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tingke set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tingke_kaoqinbudeng set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zuoweixinxi set ��������='$��ֵ' where ��������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update paikao_jiaoshi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
}
function �޸�ʱͬ���༶����($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update bukao_automation set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_banji set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_banjikemu set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_jiaoshi set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_student set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_changelog set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_liusu set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_rooming set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_banji set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_banjirizhi set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_banjizhouji set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_biyejianding set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_biyezheng set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_diaochamingxi set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_dierketangbaoming set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_evaluateclass set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_evaluatepersonal set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_exam set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_grad set ���='$��ֵ' where ���='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_guanmingbaoban set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiafang set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiangxuejin set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiaoxueriji2 set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiaoxuerijibudeng set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kechoujisuan set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kewaifudao set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_leaguemember set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_louzhangguanli set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_newstudent set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_partymember set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_partymember2 set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_pingbizidingyi set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_pingjiamingxi set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_planexec set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_planexec set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_qimopingyu set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedule set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedule2 set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduledaike set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedulefenduanjiaoxue set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletiaoke set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletiaokexianghu set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletingkefuke set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schooljingcheng set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shenghuobuzhu set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shixishenqing set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shoufeidan set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shoufeidanprint set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_smsrecord set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_student set ���='$��ֵ' where ���='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcardkaoqinmingxi set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentchange set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcourse set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentjiangcheng set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentjiesong set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentjiuye set ���='$��ֵ' where ���='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentkaoqin set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentpingjiamingxi set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacherkaoqinbudeng set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacherkaoqinmingxi set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tingke set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tingke_kaoqinbudeng set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuibandengji set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuifeidan set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuijianjiuye set ���='$��ֵ' where ���='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_uchome set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_waichuzhufang set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_wanguixinxi set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_weijihuizong set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_weizhangxinxi set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xiaoyou set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xiaoyoubanji set �༶����='$��ֵ' where �༶����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_youxiubiyesheng set ���='$��ֵ' where ���='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zhaopinshenqin set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zhengshuguanli set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_gerenchufen set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_gongyihuodong set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_keyanxiangmu set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_luquxuesheng set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_peixunjingli set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_shehuishijian set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_tijianjilu set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xianxuejilu set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xiaowaijiangcheng set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xiaowaishetuan set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xueshengjingli set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_zhengshuguanli set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_zhuxuedaikuan set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update paikao_automation set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update paikao_banjikemu set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update school_homeworkupload set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update tiku_chengji set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
  $sql = "update tiku_examdata set �༶='$��ֵ' where �༶='$��ֵ'";
  $db->Execute($sql);
}
function �޸�ʱͬ��ѧ������($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update dorm_liusu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_banjirizhi set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_banjizhouji set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_banweiguanli set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_classroomapply set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_diaochamingcheng set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_diaochamingxi set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_diaochaneirong set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_evaluateclass set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_evaluatename set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_evaluatepersonal set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_exam set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_examname set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_growfiles set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiangxuejin set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiaoxueriji2 set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kechoujiaofu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kechoujisuan set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kechouqita set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_pingbizidingyi set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_qimopingyu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_qingongjianxue set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedule set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedule2 set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedulechange set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduledaike set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schedulefenduanjiaoxue set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletiaoke set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletiaokexianghu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_scheduletingkefuke set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_schooljingcheng set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shenghuobuzhu set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shenghuobuzhutype set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentjiangcheng set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentkaoqin set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacher_yearcheck set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacherkaoqinmingxi set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tingke set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_jiabanbuxiu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_kaoqinbudeng set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_kaoqinmingxi set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_paiban set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_qingjia set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_tiaoban set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_tiaobanxianghu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_tiaoxiububan set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_yearcheck set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xueqi set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xueqiexec set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zhiban set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_salary set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_salary_detail set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update paikao_automation set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update paikao_banjikemu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
}
function �޸�ʱͬ��רҵ����($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update bukao_automation set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_banji set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_banjikemu set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_student set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_zhuanye set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_changelog set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_rooming set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_biyejianding set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_biyezheng set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_evaluateclass set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_evaluatepersonal set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiangxuejin set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_louzhangguanli set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_pingjiamingxi set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_plan set רҵ����='$��ֵ' where רҵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_planexec set רҵ����='$��ֵ' where רҵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_planexec set רҵ����='$��ֵ' where רҵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shenghuobuzhu set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shoufeidan set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shoufeidanprint set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcourse set רҵ����='$��ֵ' where רҵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentpingjiamingxi set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tanhuajilu set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuifeidan set רҵ����='$��ֵ' where רҵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_waichuzhufang set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_wanguixinxi set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_weizhangxinxi set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zhuanye set רҵ����='$��ֵ' where רҵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zhuanyeshoufei set רҵ����='$��ֵ' where רҵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_educationalexperience set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_file set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_file_luyong set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_zprencaiku set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_gerenchufen set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_gongyihuodong set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_keyanxiangmu set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_peixunjingli set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_shehuishijian set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_tijianjilu set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xianxuejilu set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xiaowaijiangcheng set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xiaowaishetuan set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xueshengjingli set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_zhengshuguanli set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_zhuxuedaikuan set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update paikao_automation set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update paikao_banjikemu set רҵ='$��ֵ' where רҵ='$��ֵ'";
  $db->Execute($sql);
}
function �޸�ʱͬ��ϵ����($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update edu_newstudent set רҵ��='$��ֵ' where רҵ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shoufeidan set ϵ����='$��ֵ' where ϵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shoufeidanprint set ϵ����='$��ֵ' where ϵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentpingjiamingxi set ϵ='$��ֵ' where ϵ='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacher_work_check_register set רҵ��='$��ֵ' where רҵ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacher_yearcheck set רҵ��='$��ֵ' where רҵ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuifeidan set ϵ����='$��ֵ' where ϵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xi set ϵ����='$��ֵ' where ϵ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_gerenchufen set ϵ='$��ֵ' where ϵ='$��ֵ'";
  $db->Execute($sql);
}
function �޸�ʱͬ����������($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update bukao_laoshi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update bukao_student set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_changelog set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_liusu set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_rooming set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_banfeiguanli set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_banweiguanli set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_biyejianding set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_biyezheng set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_dangyuan_work_check_register set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_dangyuan_yearcheck set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_diaochamingxi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_dierketangbaoming set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_dierketangpingfen set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_evaluatepersonal set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_exam set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_grad set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiafang set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiangxuejin set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kechengshenqing set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kewaifudao set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_leaguefee set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_leaguemember set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_louzhangguanli set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_newstudent set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_partyfee set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_partymember set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_partymember2 set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_passwordlog set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_passwordlog2 set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_pingjiamingxi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_qimopingyu set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_qingongjianxue set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shenghuobuzhu set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shixishenqing set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shoufeidan set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shoufeidanprint set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_smsfetion set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_smsrecord set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_stubad set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_student set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcardkaoqin set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcardkaoqinmingxi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentchange set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcourse set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentflow set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentjiangcheng set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentjiesong set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentjiuye set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentkaoqin set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentpingjiamingxi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentreg set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tanhuajilu set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacher set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacher_partyfee set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacher_partymember set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacher_partymember2 set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacher_work_check_register set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacherjingli set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teachermanage set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_teacherxuexijingli set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuibandengji set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuifeidan set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuijianjiuye set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_uchome set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_waichuzhufang set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_wanguixinxi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_weijihuizong set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_weizhangxinxi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xiaoyou set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_work_check_register set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xingzheng_yearcheck set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_youxiubiyesheng set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zhaopinshenqin set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zhengshuguanli set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zuoweixinxi set ѧ������='$��ֵ' where ѧ������='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_educationalexperience set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_expense set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_file set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_file_fuzhi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_file_lizhi set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_file_luyong set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_laboringskill set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_reward_punishment set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_salary_tongji set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_socialrelation set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_transfer set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_worker_hetong set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_worker_zhengzhao set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_worker_zhicheng set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_workexperience set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update hrms_zprencaiku set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_gerenchufen set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_gongyihuodong set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_keyanxiangmu set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_luquxuesheng set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_peixunjingli set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_shehuishijian set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_tijianjilu set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xianxuejilu set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xiaowaijiangcheng set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xiaowaishetuan set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xueshengjingli set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_zhengshuguanli set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_zhuxuedaikuan set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update remote_courseapply set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update school_homeworkupload set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update tiku_chengji set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update tiku_examdata set ����='$��ֵ' where ����='$��ֵ'";
  $db->Execute($sql);
}
function �޸�ʱͬ��ѧ������($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update bukao_student set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_changelog set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_liusu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update dorm_rooming set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_banfeiguanli set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_banweiguanli set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_biyejianding set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_biyezheng set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_diaochamingxi set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_dierketangbaoming set ѧ��ѧ��='$��ֵ' where ѧ��ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_dierketangpingfen set ѧ��ѧ��='$��ֵ' where ѧ��ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_evaluatepersonal set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_exam set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_grad set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_growfiles set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiafang set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiangxuejin set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kechengshenqing set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_kewaifudao set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_leaguemember set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_louzhangguanli set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_newstudent set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_partymember set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_partymember2 set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_pingjiamingxi set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_qimopingyu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_qingongjianxue set ѧ��ѧ��='$��ֵ' where ѧ��ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shenghuobuzhu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shixishenqing set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shoufeidan set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_shoufeidanprint set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_smsrecord set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_stubad set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_student set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcardkaoqin set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcardkaoqinmingxi set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentchange set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentcourse set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentflow set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentjiangcheng set ѧ��ѧ��='$��ֵ' where ѧ��ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentjiesong set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentjiuye set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentkaoqin set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_studentpingjiamingxi set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_stulog set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tanhuajilu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuibandengji set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuifeidan set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_tuijianjiuye set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_uchome set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_waichuzhufang set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_wanguixinxi set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_weijihuizong set ѧ��ѧ��='$��ֵ' where ѧ��ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_weizhangxinxi set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_xiaoyou set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_youxiubiyesheng set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zhaopinshenqin set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zhengshuguanli set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_zuoweixinxi set ѧ��ѧ��='$��ֵ' where ѧ��ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_gerenchufen set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_gongyihuodong set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_keyanxiangmu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_peixunjingli set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_shehuishijian set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_tijianjilu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xianxuejilu set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xiaowaijiangcheng set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xiaowaishetuan set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_xueshengjingli set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_zhengshuguanli set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update newedu_zhuxuedaikuan set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update school_homeworkupload set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update tiku_chengji set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update tiku_examdata set ѧ��='$��ֵ' where ѧ��='$��ֵ'";
  $db->Execute($sql);
  $sql = "update wygl_baoxiuxinxi set ѧ��ѧ��='$��ֵ' where ѧ��ѧ��='$��ֵ'";
  $db->Execute($sql);
}
function �޸�ʱͬ���̲�����($��ֵ,$��ֵ) {
  global $_GET,$_POST,$db;
  if($��ֵ==$��ֵ||$��ֵ=='') {
    return '';
  }
  $sql = "update edu_jiaocai set �̲�����='$��ֵ' where �̲�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiaocaiin set �̲�����='$��ֵ' where �̲�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiaocaiout set �̲�����='$��ֵ' where �̲�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiaocaitiaoku set �̲�����='$��ֵ' where �̲�����='$��ֵ'";
  $db->Execute($sql);
  $sql = "update edu_jiaocaitui set �̲�����='$��ֵ' where �̲�����='$��ֵ'";
  $db->Execute($sql);
}

function ͬ��ѧ��ת��������İ༶��Ϣ�仯($ѧ��,$�°༶)					{
	global $db;

	$ԭ�༶ = returntablefield("edu_student","ѧ��",$ѧ��,"���");
	if($ԭ�༶==$�°༶)		{
		//print $ԭ�༶.$�°༶;exit;
		return true;
	}
	else	{
		//����ִ��
	}

	$�����[] = array("dorm_changelog","�༶","ѧ��");
	$�����[] = array("dorm_liusu","�༶","ѧ��");
	$�����[] = array("dorm_rooming","�༶","ѧ��");
	$�����[] = array("edu_banfeiguanli","�����༶","ѧ��");
	$�����[] = array("edu_banweiguanli","�����༶","ѧ��");
	$�����[] = array("edu_biyejianding","�༶","ѧ��");
	$�����[] = array("edu_biyezheng","�༶","ѧ��");
	$�����[] = array("edu_diaochamingxi","�༶","ѧ��");
	$�����[] = array("edu_dierketangbaoming","�༶����","ѧ��ѧ��");
	$�����[] = array("edu_evaluatepersonal","�༶","ѧ��");
	$�����[] = array("edu_exam","�༶","ѧ��");
	$�����[] = array("edu_grad","���","ѧ��");
	$�����[] = array("edu_jiafang","�༶","ѧ��");
	$�����[] = array("edu_jiangxuejin","�༶","ѧ��");
	$�����[] = array("edu_kewaifudao","�༶","ѧ��");
	$�����[] = array("edu_leaguemember","�༶","ѧ��");
	$�����[] = array("edu_louzhangguanli","�༶","ѧ��");
	$�����[] = array("edu_partymember","�༶","ѧ��");
	$�����[] = array("edu_partymember2","�༶","ѧ��");
	$�����[] = array("edu_pingjiamingxi","�༶","ѧ��");
	$�����[] = array("edu_qimopingyu","�༶","ѧ��");
	$�����[] = array("edu_qingongjianxue","ѧ���༶","ѧ��ѧ��");
	$�����[] = array("edu_shenghuobuzhu","�༶","ѧ��");
	$�����[] = array("edu_shixishenqing","�༶","ѧ��");
	$�����[] = array("edu_shoufeidan","�༶","ѧ��");
	$�����[] = array("edu_shoufeidanprint","�༶","ѧ��");
	$�����[] = array("edu_smsrecord","�༶","ѧ��");
	$�����[] = array("edu_studentcardkaoqinmingxi","�༶����","ѧ��");
	$�����[] = array("edu_studentcourse","�༶����","ѧ��");
	$�����[] = array("edu_studentjiangcheng","�༶","ѧ��ѧ��");
	$�����[] = array("edu_studentjiesong","�༶����","ѧ��");
	$�����[] = array("edu_studentjiuye","���","ѧ��");
	$�����[] = array("edu_studentkaoqin","�༶����","ѧ��");
	$�����[] = array("edu_shoufeidan","�༶","ѧ��");
	$�����[] = array("edu_studentpingjiamingxi","�༶","ѧ��");
	$�����[] = array("edu_tanhuajilu","�����༶","ѧ��");
	$�����[] = array("edu_tuibandengji","�༶����","ѧ��");
	$�����[] = array("edu_tuifeidan","�༶����","ѧ��");
	$�����[] = array("edu_tuijianjiuye","���","ѧ��");
	$�����[] = array("edu_uchome","�༶","ѧ��");
	$�����[] = array("edu_waichuzhufang","�༶","ѧ��");
	$�����[] = array("edu_wanguixinxi","�༶","ѧ��");
	$�����[] = array("edu_weijihuizong","�༶����","ѧ��ѧ��");
	$�����[] = array("edu_weizhangxinxi","�༶","ѧ��");
	$�����[] = array("edu_xiaoyou","�༶","ѧ��");
	$�����[] = array("edu_youxiubiyesheng","���","ѧ��");
	$�����[] = array("edu_zhaopinshenqin","�༶","ѧ��");
	$�����[] = array("edu_zhengshuguanli","�༶","ѧ��");
	$�����[] = array("edu_zuoweixinxi","�����༶","ѧ��ѧ��");

	for($i=0;$i<sizeof($�����);$i=$i+1)		{
		$Element = $�����[$i];
		$sql = "update ".$Element[0]." set ".$Element[1]."='$�°༶' where ".$Element[2]."='$ѧ��'";
		$db->Execute($sql);
		//print $sql."<BR>";
	}
	//exit;
}

function ���ݰ༶����ѧ��($���)			{
	global $db;

	//�Զ�����ѧ��
	$sql = "select max(ѧ��) as ���ѧ�� from edu_student where ���='".$���."'";
	$rss = $db->Execute($sql);
	$���ѧ�� = $rss->fields['���ѧ��'];
	//print $���ѧ��."<BR>";
	if($���ѧ��=="")							{
		$ѧ�� = returntablefield("edu_banji","�༶����",$���,"�༶����")."01";
	}
	else		{
		$ѧ��		=		ѧ�Ÿ�ʽ��($���ѧ��);
	}
	//ѭ��100��,�����ǰѧ�Ŵ���,��ִ��ѧ�Ÿ�ʽ������(�Զ�+1),Ȼ����ִ��,���������,������FORѭ��.
	for($i=0;$i<100;$i++)			{
		$�м�ѧ�� = returntablefield("edu_student","ѧ��",$ѧ��,"ѧ��");
		//print $ѧ��."||$�м�ѧ��<BR>";
		if($�м�ѧ��!="")		{
			//ִ��+1
			$ѧ��	=		ѧ�Ÿ�ʽ��($�м�ѧ��);
		}
		else		{
			//ֱ�����
			break;
		}
	}
	//print $ѧ��;;exit;
	return $ѧ��;
}

function ѧ�Ÿ�ʽ��($���ѧ��)		{
	if(strlen(substr($���ѧ��,-2)+1)=="1")
		$ѧ�ź�׺ = "0".(substr($���ѧ��,-2)+1);
	else
		$ѧ�ź�׺ = (substr($���ѧ��,-2)+1);
	$���ѧ�� = substr($���ѧ��,0,-2).$ѧ�ź�׺;
	return $���ѧ��;

}


//����ɼ�����,Ĭ�Ͻ�ʦΪ���������Ľ�ʦ��Ӧ��ϵ
function DoDealExamTeacherDataInfor()				{
	global $db,$SCHOOL_MODEL_TEXT;
	$��ǰѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
	$sql = "select * from edu_exam where ��ʦ=''";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	for($i=0;$i<sizeof($rs_a);$i++)		{
		$�γ� = $rs_a[$i]['�γ�'];
		$�༶ = $rs_a[$i]['�༶'];
		$��� = $rs_a[$i]['���'];
		$�γ� = $rs_a[$i]['�γ�'];
		$��ѧ��� = returntablefield("edu_banji","�༶����",$�༶,"��ѧ���");
		$returnCurXueQiIndex = returnCurXueQiIndex($��ѧ���);
		if($SCHOOL_MODEL_TEXT=="4")			{
			$sql = "select ���ν�ʦ from edu_planexec where �༶����='$�༶' and ����ѧ��='$returnCurXueQiIndex' and �γ�����='$�γ�'";
		}
		else		{
			$sql = "select ���ν�ʦ from edu_planexec where �༶����='$�༶' and ����ѧ��='$returnCurXueQiIndex' and �γ�����='$�γ�'";
		}
		//print $sql."<BR>";
		$rsX = $db->Execute($sql);
		$���ν�ʦ = $rsX->fields['���ν�ʦ'];
		if($���ν�ʦ!="")				{
			$sql = "update edu_exam set ��ʦ='$���ν�ʦ' where ���='$���' ";
			$db->Execute($sql);
			//print $sql."<BR>";
		}
	}


}

//���������������Ϣ
function returnArrayMingCi($Result='')				{
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
	return $NewSortArray;
}

//���ظ���ʱ����ܴ���Ϣ
function returnCurWeekIndex($Target='')				{
	global $db;
	$sql = "select ��ʼʱ�� from edu_xueqiexec where ��ǰѧ��='1'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$��ʼʱ�� = $rs_a[0]['��ʼʱ��'];
	$��ʼʱ��Array = explode('-',$��ʼʱ��);
	if($Target=="0000-00-00")	return '1';
	if($Target=="") $Target = date("Y-m-d");


	$TargetArray = explode('-',$Target);
	/*
	$M1 = mktime(1,1,1,$��ʼʱ��Array[1],$��ʼʱ��Array[2],$��ʼʱ��Array[0]);
	$M2 = mktime(1,1,1,$TargetArray[1],$TargetArray[2],$TargetArray[0]);
	$ʱ���߲�ֵ = $M2-$M1;
	$���� = $ʱ���߲�ֵ/(3600*24*7);
	$���� = ceil($����);
	return $����;
	*/

	$W1 = date('W',mktime(2,1,1,$��ʼʱ��Array[1],$��ʼʱ��Array[2],$��ʼʱ��Array[0]));
	$W2 = date('W',mktime(2,1,1,$TargetArray[1],$TargetArray[2],$TargetArray[0]));
	$W = $W2-$W1+1;
	$����� = $TargetArray[0];
		//print_R($TargetArray);
		//print $�����;
		//print_R($��ʼʱ��Array);
		//print "���������-".$���������."<BR>";
		//print "W-".$W."<BR>";
		//print "W1-".$W1."<BR>";
		//print "W2-".$W2."".date('W',mktime(2,1,1,1,1,2010))."<BR>";
	$��������� = date('W',mktime(1,1,1,12,31,$�����-1));
	//print "W-".$W."<BR>";
	if($W<0)					{
		//print $Target;
		$W = $���������-$W1+$W2+1;
		//��������ܴ� - ��ѧʱ���ܴ� + ��ǰʱ���ܴ� +1
		//print "W2-".$W2."".date('W',mktime(2,1,1,1,1,2010))."<BR>";
		//print "W-".$W."<BR>";
		//exit;
	}
	return $W;
}

//���ݰ༶��Ϣ�õ����а༶�ļ�����Ϣ�б�
function returnBanjiJiBieList()				{
	global $db;
	$sql = "select distinct ��ѧ��� from edu_banji order by ��ѧ��� desc";
	$rs = $db->CacheExecute(36,$sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)									{
		$NewArray[] = $rs_a[$i]['��ѧ���'];
	}
	return $NewArray;
}


//���ݰ༶���ƺ͵�ǰѧ���ڽ�ѧ�ƻ��еõ��γ������б�
function returnBanjiCourseList($ClassCode,$returnCurXueQiIndex,$��������='')				{
	global $db,$SCHOOL_MODEL_TEXT;
	//print $SCHOOL_MODEL_TEXT;
	if($SCHOOL_MODEL_TEXT=="4")			{
		$����ѧ�� = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
		$sql = "select distinct �γ����� from edu_planexec where �༶����='$ClassCode' and ����ѧ��='$����ѧ��'";
	}
	else		{
		//�ӿ��Գɼ�������õ�ѧ������
		$sql = "select ѧ������ from edu_examname where ��������='$��������'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		$ѧ������ = $rs_a[0]['ѧ������'];
		$���� = returntablefield("edu_banji","�༶����",$ClassCode,"��ѧ���");
		$returnCurXueQiIndex = returnCurXueQiIndex($����,$ѧ������);
		$sql = "select distinct �γ����� from edu_planexec where ����ѧ��='$returnCurXueQiIndex' and �༶����='$ClassCode' order by �γ�����";
	}
	//print $sql;exit;

	$rs = $db->Execute($sql);
	$rs_am = $rs->GetArray();
	$�γ�����Array1 = array();
	for($i=0;$i<count($rs_am);$i++)			{
		$�γ����� = $rs_am[$i]['�γ�����'];
		$�γ�����Array1[] = $�γ�����;
		$�γ�����Array2[$�γ�����] = $�γ�����;
	}

	if($��������!="")						{
		//�����еĳɼ������и��ӿγ���Ϣ
		$sql = "select distinct �γ� from edu_exam  where ��������='$��������' and �༶='$ClassCode' and ѧ������='$ѧ������'";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();//print_R($rs_a);
		for($i=0;$i<count($rs_a);$i++)			{
			$�γ� = $rs_a[$i]['�γ�'];
			if(@!in_array($�γ�,$�γ�����Array1))		{
				$�γ�����Array1[] = $�γ�;
				$�γ�����Array2[$�γ�] = $�γ�;
			}
		}
	}
	$�γ�����Array = @array_keys($�γ�����Array2);
	for($i=0;$i<count($�γ�����Array);$i++)			{
		$�γ����� = $�γ�����Array[$i];
		$rs_amX[$i]['�γ�����'] = $�γ�����;
	}

	return $rs_amX;
}



//���ذ༶���ϵĿγ�
function returnBanjiCourseListMiddleSchool($ClassCode,$returnCurXueQiIndex)				{
	global $db;
	$sql = "select distinct �γ����� from edu_course order by �γ�����";
	$rs = $db->Execute($sql);
	$rs_am = $rs->GetArray();
	return $rs_am;
}

//�����꼶��ѧ������_����ѧ������
function �����꼶��ѧ������_����ѧ������($�꼶,$ѧ������)							{
	global $db;
	$ѧ�����		= floor($ѧ������%2);
	$��ѧ����ѧ��	= $ѧ������%2;
	if($��ѧ����ѧ��==0)		$ѧ������ = "".($�꼶+$ѧ�����-1)."-".($�꼶+$ѧ�����)."-�ڶ�ѧ��";
	if($��ѧ����ѧ��==1)		$ѧ������ = "".($�꼶+$ѧ�����)."-".($�꼶+$ѧ�����+1)."-��һѧ��";
	return $ѧ������;
}

//�����꼶���ص�ǰ�Ŀ���ѧ������
function returnCurXueQiIndex($NJ,$ѧ������='')				{
	global $db;
	//�滻ԭ��ѧ������������,�µķ�������ѧ�����Ƶķ�ʽ,ȥ��ԭ�л���ķ��� 2010-07-21
	if($ѧ������=="")
		$ѧ������ = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");
	return $ѧ������;
}

//�Ӳ˵�Ȩ�޹�����,ͬʱ��FRAMEWORK��EDU������ж���
function returnPrivMenuEDU($ModuleName)		{
	global $db,$_SERVER,$_SESSION;
	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	$PHP_SELF = array_pop($PHP_SELF_ARRAY);
	$sql = "select * from systemprivateinc where `FILE`='$PHP_SELF' and `MODULE`='$ModuleName'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray(); //print_R($rs_a);
	$DEPT_NAME = $rs_a[0]['DEPT_ID'];
	$USER_NAME = $rs_a[0]['USER_ID'];
	$ROLE_NAME = $rs_a[0]['ROLE_ID'];
	$return = 0;
	//������Ϊ��ʱ������ж�
	if($DEPT_NAME==""&&$USER_NAME==""&&$ROLE_NAME=="")		{
		$return = 1;
	}
	//ȫ�岿��
	if($DEPT_NAME=="ALL_DEPT")			{
		$return = 1.5;
	}
	//�û��ж�
	$LOGIN_USER_ID = $_SESSION['LOGIN_USER_ID'];
	$LOGIN_USER_ID_ARRAY = explode(',',$USER_NAME);
	if(in_array($LOGIN_USER_ID,$LOGIN_USER_ID_ARRAY))		{
		$return = 2;
	}
	//�����ж�
	$LOGIN_DEPT_ID = $_SESSION['LOGIN_DEPT_ID'];
	$LOGIN_DEPT_ID_ARRAY = explode(',',$DEPT_NAME);
	if(in_array($LOGIN_DEPT_ID,$LOGIN_DEPT_ID_ARRAY))		{
		$return = 3;
	}
	//��ɫ�ж�
	$LOGIN_USER_PRIV = $_SESSION['LOGIN_USER_PRIV'];
	$LOGIN_USER_PRIV_ARRAY = explode(',',$ROLE_NAME);
	if(in_array($LOGIN_USER_PRIV,$LOGIN_USER_PRIV_ARRAY))		{
		$return = 4;
	}
	//print_R($_SESSION);
	return $return;
}

//���ظ���ʱ��
function returnUpdateDate($CurXueQi,$FieldName="�༶",$BanJi='')		{
	global $db;
	$sql = "select max(Date) as Date from edu_exam where $FieldName='$BanJi' and ��������='$CurXueQi'";
	$rs = $db->Execute($sql);
	return $rs->fields['Date'];
}

//���سɼ�ͳ�������ֶ�
function returnStatisticsDomain($Value)		{
	switch($Value)			{
		case $Value<0:
			$return = 1;
			break;
		case $Value>=0&&$Value<=10:
			$return = 1;
			break;
		case $Value>10&&$Value<=20:
			$return = 2;
			break;
		case $Value>20&&$Value<=30:
			$return = 3;
			break;
		case $Value>30&&$Value<=40:
			$return = 4;
			break;
		case $Value>40&&$Value<=50:
			$return = 5;
			break;
		case $Value>50&&$Value<=60:
			$return = 6;
			break;
		case $Value>60&&$Value<=70:
			$return = 7;
			break;
		case $Value>70&&$Value<=80:
			$return = 8;
			break;
		case $Value>80&&$Value<=90:
			$return = 9;
			break;
		case $Value>90&&$Value<=100:
			$return = 10;
			break;
		case $Value>100&&$Value<=110:
			$return = 11;
			break;
		case $Value>110&&$Value<=120:
			$return = 12;
			break;
		case $Value>120&&$Value<=130:
			$return = 13;
			break;
		case $Value>130&&$Value<=140:
			$return = 14;
			break;
		case $Value>140&&$Value<=150:
			$return = 15;
			break;
		case $Value>150:
			$return = 15;
			break;
	}
	return $return;
}

//���سɼ���Χ
function returnExamScope($Value)		{
	switch($Value)			{
		case 1:
			$return = "0-10";
			break;
		case 2:
			$return = "10-20";
			break;
		case 3:
			$return = "20-30";
			break;
		case 4:
			$return = "30-40";
			break;
		case 5:
			$return = "40-50";
			break;
		case 6:
			$return = "50-60";
			break;
		case 7:
			$return = "60-70";
			break;
		case 8:
			$return = "70-80";
			break;
		case 9:
			$return = "80-90";
			break;
		case 10:
			$return = "90-100";
			break;
		case 11:
			$return = "100-110";
			break;
		case 12:
			$return = "110-120";
			break;
		case 13:
			$return = "120-130";
			break;
		case 14:
			$return = "130-140";
			break;
		case 15:
			$return = "140-150";
			break;
	}
	return $return;
}

//��ʾ��ʾ��Ϣ
function EDU_TripInfor($CONTENT = "��ʦû�е�¼�������µ�¼!")		{
	global $LOGIN_THEME;
	print "<LINK href=\"/theme/$LOGIN_THEME/style.css\" type=text/css rel=stylesheet>
		<table width=360  border=0 align=center cellpadding=0 cellspacing=0 class=\"small\" style=\"border:1px solid #006699;\">
		<tr>
		<td height=\"50\" align=\"middle\" colspan=2 background=\"/theme/$LOGIN_THEME/images/index_01_backup.gif\" bgcolor=\"#E0F2FC\">
		<font color=red>$CONTENT</font>
		</td>
		</table>";
}

//����ҳ��
function EDU_Indextopage($page,$nums='0')		{
	print  "<META HTTP-EQUIV=REFRESH CONTENT='".$nums.";URL=".$page."'>\n";
}

//����ʦ���Ͷ���֪ͨ
function send_sms_teacher($MobileText,$Content,$Header="�����µĹ���֪ͨ:")				{
	global $db,$_GET,$_POST;
	$Content = $Header.$Content;
	$SERVER_NAME = $_SERVER['SERVER_NAME'];
	//$SERVER_NAME = "sz070811.dipns.com";
	if($_POST['SendSmsTime']!="")	$DateTime = $_POST['SendSmsTime'];
	else			$DateTime = date("Y-m-d");

	$Count = 0;
	//��ʼ������ͳ��
	preg_match_all("/[\x80-\xff]?./",$Content,$CH_Array);
	//�õ�����������
	$MaxLen = count($CH_Array[0]);
	$array_slice = array_slice($CH_Array[0], $from=0, $length=138);
	$Content = join('',$array_slice);

	global $SYSTEM_SMS_INFOR;
	require_once('../Teacher/configsms.inc.php');
	//WebService
	////http://221.236.8.245/admin/sms3.aspx?phone=13540087220;02889615587;13681234567&code=940318&msg=��ɫУ԰
	//WEB GET
	$URL = "http://".$SYSTEM_SMS_INFOR."/admin/sms3.aspx?cityname=&schooldns=$SERVER_NAME&phone=$MobileText&time1=$DateTime&code=940318&msg=$Content";
	$URL = ereg_replace(' ','%20',$URL);
	//print strlen($Content);
	//print $URL."<BR>";exit;
	$file = @file($URL);
	//print $URL."<BR>";exit;
	$Text = @join('',$file);

}

//���ذ༶��ѧ������
function returnClassNumber($ClassName)		{
	global $db;
	$sql = "select count(���) as num from edu_student where ���='$ClassName' and ѧ��״̬='����״̬'";
	$rs = $db->CacheExecute(5,$sql);
	$rs_a = $rs->GetArray();
	return $rs_a[0]['num'];
}

//��ѵ������Ҫʹ�õĺ���
function CashLeftNumber($��ǰʱ��='')		{
	global $db;
	if($��ǰʱ��=="")		$��ǰʱ�� = date("Y-m-d H:i:s");
	//�շѵ��ݽ��
	$sql = "select SUM(�շѽ��) AS NUMBER from  edu_shoufeidan where �շ�����<='$��ǰʱ��' and ֧����ʽ='�ֽ�'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NUMBER1 = $rs_a[0]['NUMBER'];
	//print $sql;
	//�˷ѵ��ݽ��
	$sql = "select SUM(�˷ѽ��) AS NUMBER from  edu_tuifeidan where �˷�����<='$��ǰʱ��' and ֧����ʽ='�ֽ�'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NUMBER2 = $rs_a[0]['NUMBER'];
	$LEFT = $NUMBER1-$NUMBER2;
	return $LEFT;
}
function BankLeftNumber($��ǰʱ��='')		{
	global $db;
	if($��ǰʱ��=="")		$��ǰʱ�� = date("Y-m-d H:i:s");
	//�շѵ��ݽ��
	$sql = "select SUM(�շѽ��) AS NUMBER from  edu_shoufeidan where �շ�����<='$��ǰʱ��' and ֧����ʽ!='�ֽ�'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NUMBER1 = $rs_a[0]['NUMBER'];
	//�˷ѵ��ݽ��
	$sql = "select SUM(�˷ѽ��) AS NUMBER from  edu_tuifeidan where �˷�����<='$��ǰʱ��' and ֧����ʽ!='�ֽ�'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NUMBER2 = $rs_a[0]['NUMBER'];
	//��������
	$sql = "select SUM(������) AS NUMBER from  edu_qitashouru where ��������<='$��ǰʱ��' and ֧����ʽ!='�ֽ�'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NUMBER3 = $rs_a[0]['NUMBER'];
	//����֧��
	$sql = "select SUM(֧�����) AS NUMBER from  edu_qitazhichu where ֧������<='$��ǰʱ��' and ֧����ʽ!='�ֽ�'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NUMBER4 = $rs_a[0]['NUMBER'];
	//��
	$sql = "select SUM(�����) AS NUMBER from  edu_cunkuandan where �������<='$��ǰʱ��'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NUMBER5 = $rs_a[0]['NUMBER'];
	//ȡ�
	$sql = "select SUM(ȡ����) AS NUMBER from  edu_qukuandan where ȡ������<='$��ǰʱ��'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NUMBER6 = $rs_a[0]['NUMBER'];
	$LEFT = $NUMBER1-$NUMBER2+$NUMBER3-$NUMBER4+$NUMBER5-$NUMBER6;
	return $LEFT;
}

function ReturnAlreadyFee($XH='20051082150',$XN='2006-2007')		{
global $db;
$sql = "select * from edu_shoufeidan where ѧ��='$XH' and ѧ��='$XN'";
//print $sql."<BR>";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
$NewArray = array();
//$ZYMC = returntablefield("XSJBXXB","XH",$XH,"ZYMC");
//$XMC = returntablefield("XSJBXXB","XH",$XH,"XI");
//$XYMC = returntablefield("XSJBXXB","XH",$XH,"XY");
for($i=0;$i<sizeof($rs_a);$i++)									{
		$XN = $rs_a[$i]['XN'];
		$ѧ�� = $rs_a[$i]['ѧ��'];
		$XM = $rs_a[$i]['XM'];
		$NJ = $rs_a[$i]['NJ'];
		$BJMC = $rs_a[$i]['BJMC'];
		$BZ = $rs_a[$i]['BZ'];
		$CZRQ = $rs_a[$i]['CZRQ'];
		$SFLX = $rs_a[$i]['SFLX'];
		$SSHJ = $rs_a[$i]['SSHJ'];
		$�շ���Ŀ���� = $rs_a[$i]['�շ���Ŀ����'];
		$NewArray['��ϸ'][$�շ���Ŀ����] += $rs_a[$i]['�շѽ��'];
		$NewArray['�ϼ�'] += $rs_a[$i]['�շѽ��'];
}
//print_R($NewArray);
return $NewArray;
}
//����Ӧ��ѧ������-��У����
function ReturnOfficeFee($ZYDM='1211',$NJ='2006',$XN='��������ѧ��ѧ��',$�����շѱ�׼='��ͨ')		{
	global $db;
	if($XN=='��������ѧ��ѧ��')		{
		$sql = "select * from edu_zhuanyeshoufei where רҵ����='$ZYDM' and �꼶='$NJ' and �����շѱ�׼='$�����շѱ�׼'";
	}
	else		{
		$sql = "select * from edu_zhuanyeshoufei where רҵ����='$ZYDM' and �꼶='$NJ' and ѧ��='$XN' and �����շѱ�׼='$�����շѱ�׼'";
	}
	//print $sql."<BR>";
	$rs = $db->Execute($sql);
    $rs_a = $rs->GetArray();
	$NewArray = array();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$�շѱ�׼ = $rs_a[$i]['�շѱ�׼'];
		$�շ���Ŀ���� = $rs_a[$i]['�շ���Ŀ����'];
		$NewArray['��ϸ'][$�շ���Ŀ����] = $�շѱ�׼;
		$NewArray['�ϼ�'] += $�շѱ�׼;
	}
	//print_R($rs_a);
	return $NewArray;
}


//����Ӧ��ѧ������-��Сѧ����
function ReturnOfficeFeeMiddleSchool($XN='2006-2007',$NJ='2006',$�����շѱ�׼='��ͨ')		{
	global $db;
	// and ѧ��='$XN'
	if($XN=='��������ѧ��ѧ��')		{
		$sql = "select * from edu_zhuanyeshoufei where �꼶='$NJ' and �����շѱ�׼='$�����շѱ�׼'";
	}
	else		{
		$sql = "select * from edu_zhuanyeshoufei where �꼶='$NJ' and ѧ��='$XN' and �����շѱ�׼='$�����շѱ�׼'";
	}
	$rs = $db->Execute($sql);
    $rs_a = $rs->GetArray();
	$NewArray = array();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$�շѱ�׼ = $rs_a[$i]['�շѱ�׼'];
		$�շ���Ŀ���� = $rs_a[$i]['�շ���Ŀ����'];
		$NewArray['��ϸ'][$�շ���Ŀ����] = $�շѱ�׼;
		$NewArray['�ϼ�'] += $�շѱ�׼;
	}
	//print_R($rs_a);
	return $NewArray;
}

function ѧ�������ɷ��Զ��ۿ��($ѧ��,$����,$�༶,$רҵ,$�꼶,$���ý��,$�շѵ���='',$�շ�����='',$��Ʊ������='')				{
	global $db,$_SESSION;
	global $db,$_SESSION;

	if($�շѵ���==""||$�շѵ���=='�����������շѵ���')	$�շѵ��� = date("YmdHis").rand(101,999);
	if($�շ�����=="")	$�շ����� = date("Y-m-d H:i:s",mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")));

	$XN = $XNARRAY[0];
	$֧����ʽ = $_POST['�ɷѷ�ʽ'];
	if($֧����ʽ=='') $֧����ʽ = '�ֽ�';
	$�˻���� = "��λ�˻�";
	$��ע = $��Ʊ������;
	$YEAR  = date("Y");
	$ѧ�� = $YEAR."-".($YEAR+1);

	$¼��Ա = $_SESSION['SUNSHINE_USER_NAME'];
	$��� = CashLeftNumber($�շ�����);

	$�����շѱ�׼ = returntablefield("edu_student","ѧ��",$ѧ��,"�����շѱ�׼");

	$sql = "select * from edu_zhuanyeshoufei where רҵ����='$רҵ' and �꼶='$�꼶' and �����շѱ�׼='$�����շѱ�׼' order by ѧ��,�շ���Ŀ����,�շ���Ŀ����";
	//print $sql."<BR>";
	$rs = $db->Execute($sql);
    $rsX_a = $rs->GetArray();
	$NewArray = array();
	$ʣ���� = $���ý��;
	//print_R($rsX_a);exit;
	for($iX=0;$iX<sizeof($rsX_a);$iX++)		{
		$�շѱ�׼		= $rsX_a[$iX]['�շѱ�׼'];
		$�շ���Ŀ����	= $rsX_a[$iX]['�շ���Ŀ����'];
		$�շ���Ŀ����	= $rsX_a[$iX]['�շ���Ŀ����'];
		$ѧ��			= $rsX_a[$iX]['ѧ��'];

		//�����趨�����շѱ�׼
		$sql = "select SUM(�շѽ��) AS �շѽ��NUM from edu_shoufeidan where ѧ��='$ѧ��' and ѧ��='$ѧ��' and �շ���Ŀ����='$�շ���Ŀ����'";
		//print $sql."<BR>";
		$rs = $db->Execute($sql);
		$�ϴμ����շѽ�� = (int)$rs->fields['�շѽ��NUM'];
		//���û�м�¼,$�ϴμ����շѽ�� Ϊ0
		if($�ϴμ����շѽ��<$�շѱ�׼)					{
			$�շѱ�׼ = $�շѱ�׼ - $�ϴμ����շѽ��;
			//�������������
			$ʣ����		= $ʣ����-$�շѱ�׼;
			if($ʣ����>0)	    {
				$ʵ�ʽ�� = $�շѱ�׼;
				$break = 0;
			}
			else	{
				$ʵ�ʽ�� = $ʣ����+$�շѱ�׼;
				$break = 1;
			}
			if($ʵ�ʽ��>0)							{
				$��� = CashLeftNumber($�շ�����);
				$��� += $���ý��;
				$ʵ���ܽ�� += $ʵ�ʽ��;
				//print_R($_SESSION);
				$¼��Ա = $_SESSION['SUNSHINE_USER_NAME'];
				$ժҪ= "����:".$����."(".$ѧ��.")".$ѧ��."ѧ��".$�շ���Ŀ����."".$ʵ�ʽ��."Ԫ";

				$sql = "insert into edu_shoufeidan values('','$�շѵ���','$�շ�����','$ѧ��','$����','$�༶','$ժҪ','$ʵ�ʽ��','$֧����ʽ','$�˻����','$��ע','$¼��Ա','$���','$רҵ','$XMC','$ѧ��','$�꼶','$�շ���Ŀ����','$�շ���Ŀ����');";
				$db->Execute($sql);
				//print "����ѧ��:".$sql."<BR>";
				//print $sql."<BR>";
			}
			if($break)  break;
		}//���û�м�¼,$�ϴμ����շѽ�� Ϊ0

	}
	if($ʵ���ܽ��>0)								{
		$��� = CashLeftNumber($�շ�����);
		$ժҪ= "����:".$����."(".$ѧ��.")".$ѧ��."ѧ��".$�շ���Ŀ����."".$ʵ���ܽ��."Ԫ";
		$sql = "insert into edu_shoufeidanprint values('','$�շѵ���','$�շ�����','$ѧ��','$����','$�༶','$ժҪ','$ʵ���ܽ��','$֧����ʽ','$�˻����','$��ע','$¼��Ա','$���','$רҵ','$XDM','$ѧ��','$�꼶');";
		$db->Execute($sql);
		//print $sql."<BR>";
	}
	//exit;
}

//Array ( [2009-2010_ѧ��] => on [CHECKJIAOFEI0] => 2009-2010_ѧ�� [CHECKJIAOFEI0VALUE] => 3600 [2009-2010_ס�޷�] => on [CHECKJIAOFEI1] => 2009-2010_ס�޷� [CHECKJIAOFEI1VALUE] => 1200 [2009-2010_����] => on [CHECKJIAOFEI2] => 2009-2010_���� [CHECKJIAOFEI2VALUE] => 20 [�շѵ���] => [CHECKJIAOFEINUM] => 3 [JIAOFEIJINER] => 4820 ) insert into edu_shoufeidan values('','20100817160532','2010-08-17 16:05:32','0829006158','ׯ����','���0901��','����:ׯ����(0829006158)2009-2010ѧ��ѧ��3600Ԫ','3600','�ֽ�','��λ�˻�','��ע','admin','13240','��Ƶ��㻯','','2009-2010','2009','10','ѧ��');
//����ѧ���ɷѺ���,��Ҫ����POST����
function ѧ���ɷ�($XH,$XM,$BJMC,$ZYMC,$XMC,$NJ)				{
	global $db,$_POST,$_GET;
	//print_R($_POST);exit;
	$JIAOFEIJINER = $_POST['JIAOFEIJINER'];
	$CHECKJIAOFEINUM = $_POST['CHECKJIAOFEINUM'];
	$�շѵ��� = strip_tags($_POST['�շѵ���']);
	$�շѵ��� = ereg_replace("'","",$�շѵ���);
	$LeftJIAOFEIJINER = $JIAOFEIJINER;
	$ѧ�� = $XH;
	$CHECKJIAOFEI0VALUE = $_POST['CHECKJIAOFEI0VALUE'];

	if($�շѵ���!=""&&$�շѵ���!="�����������շѵ���")		{
		$�շѵ��� = $�շѵ���;
	}
	else	{
		$�շѵ��� = date("YmdHis",mktime(date("H"),date("i"),date("s")+$i,date("m"),date("d"),date("Y")));
	}

	$ʵ�ɷѽ�� = 0;

	for($i=0;$i<$CHECKJIAOFEINUM;$i++)		{
		$MiddleName  = "CHECKJIAOFEI".$i;
		$MiddelValue = "CHECKJIAOFEI".$i."VALUE";
		$MiddleNamePOST = $_POST["CHECKJIAOFEI".$i];
		$MiddleNamePOSTValue = $_POST[$MiddleNamePOST];
		if($MiddleNamePOSTValue=="ON"||$MiddleNamePOSTValue=="on")		{
			$XNARRAY = explode('_',$MiddleNamePOST);
			$�շ���Ŀ���� = $XNARRAY[1];
			$XN = $XNARRAY[0];
			$֧����ʽ = $_POST['�ɷѷ�ʽ'];
			$�˻���� = "��λ�˻�";
			$��ע = $_POST['���ݽ�����'];
			$�շ����� = date("Y-m-d H:i:s",mktime(date("H"),date("i"),date("s")+$i,date("m"),date("d"),date("Y")));
			$���ý�� = $_POST["CHECKJIAOFEI".$i."VALUE"];
			$LeftJIAOFEIJINER = $LeftJIAOFEIJINER-$���ý��;
			if($LeftJIAOFEIJINER>0)	    {
				//$���ý�� = $���ý��;
			}
			else	{
				$���ý�� = $LeftJIAOFEIJINER+$���ý��;
			}
			if($���ý��>0)							{
				$��� = CashLeftNumber($�շ�����);
				$��� += $���ý��;
				//print_R($_SESSION);
				$¼��Ա = $_SESSION['SUNSHINE_USER_NAME'];
				$�շ���Ŀ���� = returntablefield("dict_shoufeixiangmu","����",$�շ���Ŀ����,"���");
				$ժҪ= "����:".$XM."(".$XH.")".$XN."ѧ��".$�շ���Ŀ����."".$���ý��."Ԫ";
				$sql = "insert into edu_shoufeidan values('','$�շѵ���','$�շ�����','$XH','$XM','$BJMC','$ժҪ','$���ý��','$֧����ʽ','$�˻����','$��ע','$¼��Ա','$���','$ZYMC','$XMC','$XN','$NJ','$�շ���Ŀ����','$�շ���Ŀ����');";
				//print $sql."<BR>";
				//print_R($XNARRAY);
				$rs = $db->Execute($sql);
				$ʵ�ɷѽ�� = $ʵ�ɷѽ��+$���ý��;
				//$rs_a = $rs->GetArray();
				//print_R($rs_a);
			}
		}
	}
	//print_R($_POST);
	$XNARRAY = explode('_',$MiddleNamePOST);
	$�շ���Ŀ���� = "�ɷѽ��";
	$XN = $XNARRAY[0];
	$֧����ʽ = "�ֽ�";
	$�˻���� = "��λ�˻�";
	$��ע = "��ע";
	$�շ����� = date("Y-m-d H:i:s",mktime(date("H"),date("i"),date("s")+$i,date("m"),date("d"),date("Y")));
	if($�շѵ���!="")		{
		//$�շѵ��� = $�շѵ���;
	}
	else	{
		//$�շѵ��� = date("YmdHis",mktime(date("H"),date("i"),date("s")+$i,date("m"),date("d"),date("Y"))).rand(101,999);
	}
	$���ý�� = $_POST['JIAOFEIJINER'];
	$���ý�� = $ʵ�ɷѽ��;//2010-8-21�ո�Ϊ�ɷѽ��Ϊʵ�ʲ�ֽ���֮��
	$¼��Ա = $_SESSION['SUNSHINE_USER_NAME'];
	$�շ���Ŀ���� = returntablefield("dict_shoufeixiangmu","����",$�շ���Ŀ����,"���");
	$ժҪ= "����:".$XM."(".$XH.")".$XN."ѧ��".$�շ���Ŀ����."".$���ý��."Ԫ";
	$sql = "insert into edu_shoufeidanprint values('','$�շѵ���','$�շ�����','$XH','$XM','$BJMC','$ժҪ','$���ý��','$֧����ʽ','$�˻����','$��ע','$¼��Ա','$���','$ZYMC','$XMC','$XN','$NJ');";
	//print $sql."<BR>";
	//print_R($XNARRAY);
	$rs = $db->Execute($sql);
	//exit;
	return $�շѵ���;
}




function aksort(&$array,$valrev=false,$keyrev=false) {
  if ($valrev) { arsort($array); } else { asort($array); }
    $vals = array_count_values($array);
    $i = 0;
    foreach ($vals AS $val=>$num) {
        $first = array_splice($array,0,$i);
        $tmp = array_splice($array,0,$num);
        if ($keyrev) { krsort($tmp); } else { ksort($tmp); }
        $array = array_merge($first,$tmp,$array);
        unset($tmp);
        $i = $num;
    }
}


//�Ӳ˵�Ȩ�޹�����,ͬʱ��FRAMEWORK��EDU������ж���
function returnPrivMenu($ModuleName)		{
	global $db,$_SERVER,$_SESSION;
	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	$PHP_SELF = array_pop($PHP_SELF_ARRAY);
	$sql = "select * from systemprivateinc where `FILE`='$PHP_SELF' and `MODULE`='$ModuleName'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray(); //print_R($rs_a);
	$DEPT_NAME = $rs_a[0]['DEPT_ID'];
	$USER_NAME = $rs_a[0]['USER_ID'];
	$ROLE_NAME = $rs_a[0]['ROLE_ID'];
	$return = 0;
	//������Ϊ��ʱ������ж�
	if($DEPT_NAME==""&&$USER_NAME==""&&$ROLE_NAME=="")		{
		$return = 1;
	}
	//ȫ�岿��
	if($DEPT_NAME=="ALL_DEPT")			{
		$return = 1.5;
	}
	//�û��ж�
	$LOGIN_USER_ID = $_SESSION['LOGIN_USER_ID'];
	$LOGIN_USER_ID_ARRAY = explode(',',$USER_NAME);
	if(in_array($LOGIN_USER_ID,$LOGIN_USER_ID_ARRAY))		{
		$return = 2;
	}
	//�����ж�
	$LOGIN_DEPT_ID = $_SESSION['LOGIN_DEPT_ID'];
	$LOGIN_DEPT_ID_ARRAY = explode(',',$DEPT_NAME);
	if(in_array($LOGIN_DEPT_ID,$LOGIN_DEPT_ID_ARRAY))		{
		$return = 3;
	}
	//��ɫ�ж�
	$LOGIN_USER_PRIV = $_SESSION['LOGIN_USER_PRIV'];
	$LOGIN_USER_PRIV_ARRAY = explode(',',$ROLE_NAME);
	if(in_array($LOGIN_USER_PRIV,$LOGIN_USER_PRIV_ARRAY))		{
		$return = 4;
	}
	//print_R($_SESSION);
	return $return;
}

function base64_encode2($value)		{
	return $value;
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