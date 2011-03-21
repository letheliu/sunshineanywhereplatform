<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
session_start();

require_once('lib.inc.php');

$����汾��FILE = @file("../Interface/EDU/version.ini");
$����汾�� = $����汾��FILE[0];
returnRemoteRegisterInfor();
CheckSystemVersionInformation();
//����Զ��ע����������������֤��Ϣ�����ڱ��ؽ���ע�ᣬû��Զ��û�У���ɾ������ע���ļ�
function returnRemoteRegisterInfor()					{
	$MACHINE_CODE = returnmachinecode();
	$SERVER_NAME = $_SERVER['SERVER_NAME'];
	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	array_pop($PHP_SELF_ARRAY);
	array_shift($PHP_SELF_ARRAY);
	//print_R($PHP_SELF_ARRAY);
	if(in_array("TDLIB",$PHP_SELF_ARRAY))		{
		$SOFTWARE = "TDLIB";
	}
	else	{
		$SOFTWARE = "EDU";
	}
	$URL = "http://www.sndg.net/tryout/register_check_code.php?".base64_encode("MACHINE_CODE=$MACHINE_CODE&SERVER_NAME=$SERVER_NAME&SOFTWARE=$SOFTWARE");;
	//print $URL;exit;
	$File = @file($URL);
	$TYPE_ARRAY = explode('||',$File['0']);
	$TYPE = $TYPE_ARRAY[0];
	$REGISTER_CODE = $TYPE_ARRAY[2];
	$SERVER_NAME = $TYPE_ARRAY[3];
	$SCHOOL_NAME = $TYPE_ARRAY[4];
	$����汾 = $TYPE_ARRAY[5];
	$��Ȩʱ�� = $TYPE_ARRAY[6];


	//print_R($TYPE);
	switch($TYPE)				{
		case 'Normal':
			MakeResiterFile($MACHINE_CODE,$REGISTER_CODE,$SERVER_NAME,$SCHOOL_NAME,$����汾,$��Ȩʱ��);
			break;
		case 'NoRegisterInfor':
			@unlink("license.ini");
			break;
		case 'NoCheckOut':
			@unlink("license.ini");
			break;
	}
	//exit;
}



function CheckSystemVersionInformation()					{
	global $db;
	if(is_file("license.ini"))		{
		$ini_file	=	parse_ini_file('license.ini');
		$SOFTWARE_TYPE = $ini_file['SOFTWARE_TYPE'];
		$SOFTWARE_TYPE_ARRAY = explode("-",$SOFTWARE_TYPE);
		if($SOFTWARE_TYPE_ARRAY[0]=="��Сѧ��")				{
			$sql = "delete from TD_OA.sys_function where MENU_ID = 'c804'";		$db->Execute($sql);	//print $sql."<BR>";		//������ҵ����
			//��������SCHOOL_MODEL����
			$filename = "../Interface/EDU/SCHOOL_MODEL.ini";
			@unlink($filename);
			$somecontent="[section]\nSCHOOL_MODEL=4";
			$handle = fopen($filename, 'w');
			if (!fwrite($handle, $somecontent)) {
				exit;
			}
			fclose($handle);
		}
		elseif($SOFTWARE_TYPE_ARRAY[0]=="��У��")				{
			$sql = "INSERT INTO TD_OA.sys_function VALUES('362','c804','������ҵ����','EDU/Interface/EDU/MAIN_JIUYE.php');";		$db->Execute($sql);	//print $sql."<BR>";		//������ҵ����
			//��������SCHOOL_MODEL����
			$filename = "../Interface/EDU/SCHOOL_MODEL.ini";
			@unlink($filename);
			$somecontent="[section]\nSCHOOL_MODEL=2";
			$handle = fopen($filename, 'w');
			if (!fwrite($handle, $somecontent)) {
				exit;
			}
			fclose($handle);

		}

		if($SOFTWARE_TYPE_ARRAY[1]=="��׼��")				{
			//ȥ�����ں�����ģ��
			$sql = "delete from TD_OA.sys_menu where MENU_ID='c1';";			$db->Execute($sql);	//print $sql."<BR>";		//�ҵ��ʲ�
			$sql = "delete from TD_OA.sys_menu where MENU_ID='c7';";			$db->Execute($sql);	//print $sql."<BR>";		//���ڹ���
			$sql = "delete from TD_OA.sys_menu where MENU_ID='c5';";			$db->Execute($sql);	//print $sql."<BR>";		//���Ź���
			$sql = "delete from TD_OA.sys_function where MENU_ID like 'c1%';";  $db->Execute($sql);	//print $sql."<BR>";		//�ҵ��ʲ�
			$sql = "delete from TD_OA.sys_function where MENU_ID like 'c7%';";  $db->Execute($sql);	//print $sql."<BR>";		//���ڹ���
			$sql = "delete from TD_OA.sys_function where MENU_ID like 'c5%';";  $db->Execute($sql);	//print $sql."<BR>";		//���Ź���
			$sql = "delete from TD_OA.sys_function where MENU_ID = 'c810'";		$db->Execute($sql);	//print $sql."<BR>";		//���¹���
		}
		elseif($SOFTWARE_TYPE_ARRAY[1]=="���������")				{
			$sql = "INSERT INTO TD_OA.SYS_MENU VALUES('c1','�ҵ��ʲ�','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";		//�ҵ��ʲ�
			$sql = "INSERT INTO TD_OA.SYS_MENU VALUES('c5','�ҵĲ���','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";		//���ڹ���
			$sql = "INSERT INTO TD_OA.SYS_MENU VALUES('c7','���ڹ���','EDU');";			$db->Execute($sql);	//print $sql."<BR>";		//���Ź���
			$sql = "INSERT INTO TD_OA.sys_function VALUES('281','c102','�ҵİ칫��Ʒ','EDU/Interface/officeproduct/officeproduct_my.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('295','c104','�ҵĹ̶��ʲ�','EDU/Interface/fixedasset/my_fixedasset.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.SYS_FUNCTION VALUES('391','c106','�ҵ���������','EDU/Interface/XinZhengGuanLi/my_xingzheng.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.SYS_FUNCTION VALUES('346','c108','���Ϲ��ﱨ��','EDU/Interface/Teacher/wygl_teacher.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.SYS_FUNCTION VALUES('370','c502','�̶��ʲ����ż�����','EDU/Interface/fixedasset/fixedasset_department_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.SYS_FUNCTION VALUES('371','c504','�������ڲ��ż�����','EDU/Interface/XinZhengGuanLi/my_bumen_xingzheng.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('280','c730','�칫��Ʒ����','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('282','c73001','�칫��Ʒ��Ϣ����','EDU/Interface/officeproduct/officeproduct_view.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('283','c73002','�칫��Ʒ��Ϣ����','EDU/Interface/officeproduct/officeproduct_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('284','c73004','�칫��Ʒ������ϸ','EDU/Interface/officeproduct/officeproductout_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('285','c73005','�칫��Ʒ������ϸ','EDU/Interface/officeproduct/officeproductlingyong_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('286','c73006','�칫��Ʒ�黹��ϸ','EDU/Interface/officeproduct/officeproducttui_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('287','c73008','�칫��Ʒ�����ϸ','EDU/Interface/officeproduct/officeproductin_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('288','c73010','�칫��Ʒ������ϸ','EDU/Interface/officeproduct/officeproducttiaoku_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('289','c73012','�칫��Ʒ������ϸ','EDU/Interface/officeproduct/officeproductbaofei_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('290','c73020','�칫��Ʒ�ֿ�����','EDU/Interface/officeproduct/officeproductcangku_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('291','c73022','�칫��Ʒ�ֿ�ͳ��','EDU/Interface/officeproduct/officeproduct_tongji.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('292','c73026','�칫��Ʒ��������','EDU/Interface/officeproduct/officeproductgroup_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('293','c73024','�칫��Ʒ����ͳ��','EDU/Interface/officeproduct/officeproduct_fenxiang.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('294','c732','�̶��ʲ�','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('296','c73203','�̶��ʲ�ȫȨ�޹���','EDU/Interface/fixedasset/fixedasset_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('297','c73204','�̶��ʲ�����Ա����','EDU/Interface/fixedasset/fixedasset_admin_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('299','c73206','�̶��ʲ�������ϸ','EDU/Interface/fixedasset/fixedassetout_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('300','c73207','�̶��ʲ��黹��ϸ','EDU/Interface/fixedasset/fixedassettui_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('301','c73209','�̶��ʲ�������ϸ','EDU/Interface/fixedasset/fixedassetin_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('302','c73211','�̶��ʲ�������ϸ','EDU/Interface/fixedasset/fixedassettiaoku_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('303','c73212','�̶��ʲ�ά����ϸ','EDU/Interface/fixedasset/fixedassetweixiu_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('304','c73213','�̶��ʲ�������ϸ','EDU/Interface/fixedasset/fixedassetbaofei_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('305','c73215','�̶��ʲ���������ͳ��','EDU/Interface/fixedasset/fixedasset_tongjijianjie.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('306','c73216','�̶��ʲ�������ϸͳ��','EDU/Interface/fixedasset/fixedasset_tongji.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('307','c73224','�̶��ʲ�������ͳ��','EDU/Interface/fixedasset/fixedasset_pici.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('308','c73226','�������ʲ���ϸ','EDU/Interface/fixedasset/fixedasset_baofei.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('309','c73228','�̶��ʲ���������','EDU/Interface/fixedasset/fixedassetgroup_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('310','c73230','�̶��ʲ�����Ȩ�޹���','EDU/Interface/fixedasset/inc_fixedasset_priv.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('311','c740','����ά��','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('312','c74002','������Ϣ','EDU/Interface/WuYeGuanLi/wygl_baoxiuxinxi1_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('313','c74004','�޸�ȷ��','EDU/Interface/WuYeGuanLi/wygl_baoxiuxinxi3_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('314','c74003','��������','EDU/Interface/WuYeGuanLi/wygl_baoxiuxinxi2_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('315','c74005','���ϵǼ�','EDU/Interface/WuYeGuanLi/wygl_baoxiuxinxi4_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('316','c74006','���ý���','EDU/Interface/WuYeGuanLi/wygl_baoxiuxinxi5_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('317','c74007','��������','EDU/Interface/WuYeGuanLi/wygl_weixiupingjia_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('318','c74008','��������','EDU/Interface/WuYeGuanLi/MAIN_SETTING.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('319','c750','ˮ�繤��','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('320','c75001','������Ϣ����','EDU/Interface/WuYeGuanLi/wygl_gongchengxinxi_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('321','c75002','���̽��ȹ���','EDU/Interface/WuYeGuanLi/wygl_gongchengjindu_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('322','c75003','���̺�ͬ����','EDU/Interface/WuYeGuanLi/wygl_gongchenghetong_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";

			$sql = "INSERT INTO TD_OA.sys_function VALUES('388','c810','������Դ','EDU/Interface/XinZhengGuanLi/MAIN_RENLIZIYUAN.php');";		$db->Execute($sql);	//print $sql."<BR>";		//���¹���

		}




	}
}
?>
<HTML>
<?
page_css("�����Ȩ��Ϣ");
?>

</HEAD>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
-->
</style>

<body class="bodycolor">

<table id="about" width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td align="center" valign="middle">

		<table width="410"  border="0" align="center" cellpadding="0" cellspacing="0" class="small" style="border:1px solid #006699;">
          <tr>
		    <td height="30" align="middle" colspan=2  bgcolor="#E0F2FC">
			<font color=red>ͨ���в��з�����(����Ƽ�)�����Ȩ��Ϣ˵��</font>
			</td>
          </tr>
          <tr>
            <td bgcolor="#E9F6FD" colspan=2>
			<table width="100%" height="100"  border="0" cellpadding="0" cellspacing="12" bordercolor="#333333" class="small">
				<?
				//print_R($_SERVER['SERVER_NAME']);
				$returnmachinecode = returnmachinecode();
				$ini_file=@parse_ini_file('license.ini');
				if($ini_file['REGISTER_CODE']=="")	{
					$ini_file['REGISTER_CODE']	= "���δע��-���ð汾";
					$ini_file['USER_NUMBER']	= "���δע��-���ð汾";
					$ini_file['SERVER_NAME']	= "���δע��-���ð汾";
					$ini_file['SCHOOL_NAME']	= "���δע��-���ð汾";
					$ini_file['SOFTWARE_TYPE']	= "���δע��-���ð汾";
					$ini_file['SOFTWARE_DATE']	= "���δע��-���ð汾";
					@unlink('license.ini');
				}
				else	{
					$ini_file['USER_NUMBER'] = "������";
				}
				?>
				<tr>
                <td height="50" colspan="2" valign="top">
				<p class="td">
				�������汾��<b></b><font color=red><?=$_SERVER['SERVER_SOFTWARE']?></font><br>
				����汾�ţ�<b></b><font color=red>1.<?=$����汾��S?>.<?=$����汾��?></font><br>
				��������룺<b></b><font color=red><?=$returnmachinecode?></font><br>

				���ע���룺<b></b><font color=red><?=$ini_file['REGISTER_CODE']?></font><br>

				����û�����<b></b><font color=red><?=$ini_file['USER_NUMBER']?></font><br>
				���ע��������<b></b><font color=red><?=$ini_file['SERVER_NAME']?></font><br>
				���ע�ᵥλ��<b></b><font color=red><?=$ini_file['SCHOOL_NAME']?></font><br>
				���ע�����ͣ�<b></b><font color=red><?=$ini_file['SOFTWARE_TYPE']?></font><br>
				�����Ȩʱ�䣺<b></b><font color=red><?=$ini_file['SOFTWARE_DATE']?></font><br>
				</td>
                </tr>
				<tr>
                  <td colspan="2" valign="top"><p class="td"><font color=red>�����ݲ�������ݼ�ʹ�õ�˵��(ʹ��ALT��)��</font>
				  </td>
                </tr>
                <tr>
                  <td width="50%" valign="top"><font color=green>ALT+N</font>���½�(<U>N</U>ew)</td>
                  <td width="50%" valign="top"><font color=green>ALT+F</font>������(<U>F</U>ind)</td>
                </tr>
                <tr>
                  <td width="50%" valign="top"><font color=green>ALT+X</font>������(E<U>x</U>port)</td>
                  <td width="50%" valign="top"><font color=green>ALT+I</font>������(<U>I</U>mport)</td>
                </tr>
                <tr>
                  <td width="50%" valign="top"><font color=green>ALT+1</font>����1�м�¼(<U>1</U>)</td>
				  <td width="50%" valign="top"><font color=green>ALT+2</font>����2�м�¼(<U>2</U>)</td>

                </tr>
                <tr>
				  <td width="50%" valign="top"><font color=green>ALT+E</font>����ѡ�м�¼�༭(<U>E</U>dit)</td>
                  <td width="50%" valign="top"><font color=green>ALT+D</font>���Լ�¼ɾ��(<U>D</U>elete)</td>
                </tr>
                <tr>
				  <td width="50%" valign="top"><font color=green>ALT+S</font>������(<U>S</U>ave)</td>
                  <td width="50%" valign="top"><font color=green>ALT+C</font>������(<U>C</U>ancel)</td>
                </tr>
				<tr>
				  <td width="50%" valign="top"><font color=green>ALT+P</font>����ӡ(<U>P</U>rint)</td>
                  <td width="50%" valign="top"><font color=green>ALT+R</font>������(<U>R</U>eport)</td>
                </tr>

                <tr>
                  <td height="50" colspan="2" valign="top"><p class="td">���棺�����������������Ȩ���͹��ʹ�Լ�ı�����δ����Ȩ���Ը��ƻ�ɢ��������Ĳ��ֻ�ȫ�������������������º����´���������֪��Υ���߽����跨�ɷ�Χ�ڵ�ȫ���Ʋá� </p></td>
                </tr>
            </table>
			</td>
          </tr>
        </table>

	</td>
  </tr>
</table>

</body>
</HTML>
