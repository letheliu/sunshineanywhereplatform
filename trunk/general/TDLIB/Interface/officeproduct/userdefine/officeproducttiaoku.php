<?
//##########################################################
//格式：_add _view _Value		说明性表述方式
//userDefineInforStatus_add		新增与编辑的函数编制，两个参数：前者为数组图，后者为字段索引值
//userDefineInforStatus_view	查阅视图函数说明
//userDefineInforStatus_Value	列表视图说明
//#########################################################
$officeproducttiaoku = "根据仓库信息统计办公用品的数量";
//#########################################################
function officeproducttiaoku_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$备注 = $fields['value'][$i]['备注'];
	$仓库名称 = $fields['value'][$i]['仓库名称'];

	$sql = "select SUM(入库数量) AS 入库 from officeproductin where 入库仓库='$仓库名称'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$入库 = (int)$rs_a[0]['入库'];

	$sql = "select SUM(出库数量) AS 出库 from officeproductout where 出库仓库='$仓库名称'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$出库 = (int)$rs_a[0]['出库'];

	$sql = "select SUM(退库数量) AS 退库 from officeproducttui where 退库仓库='$仓库名称'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$退库 = (int)$rs_a[0]['退库'];

	$sql = "select SUM(报废数量) AS 报废 from officeproducttui where 所属仓库='$仓库名称'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$报废 = (int)$rs_a[0]['报废'];
	
	$余额 = $入库+$退库-$出库-$报废;
	
	$Text = "<font color=red>余额:$余额</font>	\t\r<font color=green>入库:$入库 \t\r出库:$出库 \t\r退库:$退库</font> $备注";
	return $Text;
}

function officeproducttiaoku_add($fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	global $_SESSION;
	global $_GET;	
	$FieldName = $fields['name'][$i];
	$Html_etc = $html_etc[$tablename][$FieldName];
	$办公用品名称 = $_GET['办公用品名称'];

	$sql = "select SUM(入库数量) AS 入库,入库仓库,办公用品名称 from officeproductin group by 入库仓库,办公用品名称 having 办公用品名称='$办公用品名称'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$入库仓库 = $rs_a[$i]['入库仓库'];
		$NewArray[$入库仓库] = $rs_a[$i]['入库'];
	}
	
	$sql = "select SUM(退库数量) AS 退库,退库仓库,办公用品名称 from officeproducttui group by 退库仓库,办公用品名称 having 办公用品名称='$办公用品名称'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$退库 = (int)$rs_a[0]['退库'];
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$退库仓库 = $rs_a[$i]['退库仓库'];
		$NewArray[$退库仓库] += $rs_a[$i]['退库'];
	}

	$sql = "select SUM(出库数量) AS 出库,出库仓库,办公用品名称 from officeproductout group by 出库仓库,办公用品名称 having 办公用品名称='$办公用品名称'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$出库 = (int)$rs_a[0]['出库'];
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$出库仓库 = $rs_a[$i]['出库仓库'];
		$NewArray[$出库仓库] -= $rs_a[$i]['出库'];
	}

	//报废仓库
	$sql = "select SUM(报废数量) AS 报废,所属仓库,办公用品名称 from officeproductbaofei group by 所属仓库,办公用品名称 having 办公用品名称='$办公用品名称'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$报废 = (int)$rs_a[0]['报废'];
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$所属仓库 = $rs_a[$i]['所属仓库'];
		$NewArray[$所属仓库] -= $rs_a[$i]['报废'];
	}

	//print_R($NewArray);

	$sql = "select 仓库名称 from officeproductcangku";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

    print "<TR>";
	print "<TD class=TableData noWrap>$Html_etc:</TD>\n";
	print "<TD class=TableData noWrap colspan=\"2\">";
	for($i=0;$i<sizeof($rs_a);$i++)		{
		if($i==0) $Checked = "Checked"; else $Checked = '';
		$仓库名称 = $rs_a[$i]['仓库名称'];
		print "<input type=\"radio\" name=\"$FieldName\" title='' value=\"$仓库名称\" $Checked>".$仓库名称."[".(int)$NewArray[$仓库名称]."本]</label>";
	}
	print "</TD></TR>\n";

	
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