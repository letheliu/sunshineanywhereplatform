<?
//##########################################################
//格式：_add _view _Value		说明性表述方式
//userDefineInforStatus_add		新增与编辑的函数编制，两个参数：前者为数组图，后者为字段索引值
//userDefineInforStatus_view	查阅视图函数说明
//userDefineInforStatus_Value	列表视图说明
//#########################################################
//提供资产管理部分中资产状态的部分信息设定。
//#########################################################
$officeproductcangku = "提供资产管理部分中资产状态的部分信息设定。";
function officeproductcangku_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$现有库存 = $fields['value'][$i]['库存管理'];
	/*
	$办公用品编号 = $fields['value'][$i]['办公用品编号'];
	$办公用品名称 = $fields['value'][$i]['办公用品名称'];

	//得到该办公用品在不同仓库的库存

	$sql = "select SUM(入库数量) AS 入库数量,入库仓库 from officeproductin where 办公用品编号='$办公用品编号' group by 入库仓库";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$入库数量 += $rs_a[$i]['入库数量'];
		$入库仓库 = $rs_a[$i]['入库仓库'];
		$入库信息[$入库仓库] = $rs_a[$i]['入库数量'];
		$NewArray[$入库仓库] = $入库仓库;
	}

	$sql = "select SUM(退库数量) AS 退库数量,退库仓库 from officeproducttui where 办公用品编号='$办公用品编号' group by 退库仓库";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$退库数量 += $rs_a[$i]['退库数量'];
		$退库仓库 = $rs_a[$i]['退库仓库'];
		$退库信息[$退库仓库] = $rs_a[$i]['退库数量'];
		$NewArray[$退库仓库] = $退库仓库;
	}

	$sql = "select SUM(出库数量) AS 出库数量,出库仓库 from officeproductout where 办公用品编号='$办公用品编号' group by 出库仓库";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$出库数量 += $rs_a[$i]['出库数量'];
		$出库仓库 = $rs_a[$i]['出库仓库'];
		$出库信息[$出库仓库] = $rs_a[$i]['出库数量'];
		$NewArray[$出库仓库] = $出库仓库;
	}


	$sql = "select SUM(报废数量) AS 报废数量,所属仓库 from officeproductbaofei where 办公用品编号='$办公用品编号' group by 所属仓库";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$报废数量 += $rs_a[$i]['报废数量'];
		$所属仓库 = $rs_a[$i]['所属仓库'];
		$报废信息[$所属仓库] = $rs_a[$i]['报废数量'];
		$NewArray[$所属仓库] = $所属仓库;
	}


	
	$仓库列表 = array();
	$仓库列表 = @array_keys($NewArray);

	$现有库存 = $入库数量+$退库数量-$出库数量-$报废数量;
	*/

	//print ";";
	
	$Text = "<font color=red title='现有库存'>&nbsp;&nbsp;$现有库存</font>";
	
	//$仓库列表 = asort($仓库列表);
	//print_R($入库数量);print ";";
	//print_R($退库数量);print ";";
	//print_R($出库数量);print ";";
	//print_R($入库信息);print ";";
	//print_R($退库信息);print ";";
	//print_R($出库信息);exit;

	for($i=0;$i<sizeof($仓库列表);$i++)			{
		$仓库名称 = $仓库列表[$i];
		$该仓库库存 = $入库信息[$仓库名称]+$退库信息[$仓库名称]-$出库信息[$仓库名称]-$报废信息[$仓库名称];
		$Text2 .= $仓库名称.":".$该仓库库存." ";
	}

	//把结果更新到办公用品表里面
	//$sql = "update officeproduct set 库存管理='$现有库存' where 办公用品编号='$办公用品编号'";
	//$db->Execute($sql);
	//print $sql;
	//print_R($NewArray);exit;
	if($Text2!="")		{
		$Text .= "[".$Text2."]";
	}

	return $Text;
}
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