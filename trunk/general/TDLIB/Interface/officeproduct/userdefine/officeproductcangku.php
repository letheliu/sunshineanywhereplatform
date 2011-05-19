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
?>