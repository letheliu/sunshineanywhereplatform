<?
require_once("lib.inc.php");

$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-固定资产-操作明细");

/*
  编号 int(100)   否  auto_increment
  资产名称 varchar(200) gbk_chinese_ci  否
  资产编号 varchar(200) gbk_chinese_ci  否
  资产类别 varchar(200) gbk_chinese_ci  否
  采购标识 varchar(200) gbk_chinese_ci  否
  供应商 varchar(200) gbk_chinese_ci  否
  所属部门 varchar(200) gbk_chinese_ci  否
  使用人员 varchar(200) gbk_chinese_ci  否
  资产原值 varchar(200) gbk_chinese_ci  否
  启用日期 date   否
  型号规格 varchar(255) gbk_chinese_ci  否
  所属状态 varchar(20) gbk_chinese_ci  否 购置未分配
  备注 varchar(255) gbk_chinese_ci  否
  创建人 varchar(200) gbk_chinese_ci  否
  创建时间

*/

if($_GET['action']=="add_default_data")		{
	page_css('采购');
	$所属部门 = $_POST['所属部门'];
	$采购标识 = $_POST['采购标识'];
	$批准人 = $_POST['批准人'];
	$数量 = $_POST['数量'];
	$创建人 = $_POST['创建人'];
	$创建时间 = $_POST['创建时间'];
	if($批准人!=""&&$数量>0)	{
		//print_R($_POST);exit;
		for($i=1;$i<=$数量;$i++)			{

			//得到资产编号
			$sql = "select 资产编号 from fixedasset order by 编号 desc limit 1";
			$rs = $db->Execute($sql);
			$资产编号 = $rs->fields['资产编号'];
			if($资产编号!="")			{
				$资产编号  = $资产编号+1;
				$资产名称 = $采购标识;//."".date("Ymd")
			}
			else	{
				$资产编号1 = substr($资产编号,0,10);
				//print $资产编号1."<HR>$资产编号";
				$资产编号2 = substr($资产编号,10,4);
				$资产编号2 = $资产编号2+10001;
				$资产编号2 = substr($资产编号2,1,strlen($资产编号2));
				$资产编号  = $资产编号1.$资产编号2;
				$资产名称 = $采购标识;
			}

			$单价 = returntablefield("fixedasset","资产名称",$资产名称,"单价");
			$金额 = $单价*$数量;
			//处理固定资产表的数据
			$sql = "insert into fixedasset
				(资产名称,资产编号,资产类别,采购标识,所属部门,所属状态,创建人,创建时间,单价,数量,金额)
				values('$资产名称','$资产编号','$资产类别','$采购标识','$所属部门','购置未分配','$创建人','$创建时间','$单价','$数量','$金额');";
			$db->Execute($sql);

			//处理固定资产采购表的数据
			$sql = "insert into fixedassetin
				(资产名称,资产编号,所属部门,批准人,备注,创建人,创建时间,单价,数量,金额)
				values('$资产名称','$资产编号','$所属部门','$批准人','$备注','$创建人','$创建时间','$单价','$数量','$金额');";
			$db->Execute($sql);
			//print $sql."<BR>";
		}
		//print_R($_POST);exit;
		print_infor("你的操作己经完成!",$infor='trip',$return="location='fixedasset_newai.php?'",$indexto='fixedasset_newai.php');


		//Array ( [采购标识] => 台式电脑 [数量] => 6 [所属部门] => 行政管理部 [批准人_ID] => admin [批准人] => 系统管理员 [备注] => [创建人] => admin [创建时间] => 2009-08-27 16:52:16 [submit] => 保存 )
	}

	else			{
		$SYSTEM_SECOND = 1;
		print_infor("批准人为空或数量小于1,您的操作没有执行成功!",$infor='该参数新版本没有被使用',$return="location='fixedasset_newai.php'",$indexto='fixedasset_newai.php');
	}

	exit;
}





$filetablename='fixedassetin';
require_once('include.inc.php');
?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>