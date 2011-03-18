<?





function SQL语句解析函数($sql)				{
	global $db,$MetaTables;
	//判断自定义表是否存在,如果不存在直接返回

	//判断是否是联合全操作,是否有子查询,是否用left
	//如果有,则表示为手写SQL代码,不是系统生成,则直接返回,不进行过滤
	$sql		= trim($sql);
	$sqllower	= strtolower($sqllower);
	if(substr($sqllower,0,strlen("create table"))=="create table")		{
		return $sql;
	}
	if(substr($sqllower,0,strlen("drop table"))=="drop table")			{
		return $sql;
	}
	if(substr($sqllower,0,strlen("check table"))=="check table")		{
		return $sql;
	}
	if(substr($sqllower,0,strlen("optimize table"))=="optimize table")	{
		return $sql;
	}
	if(substr($sqllower,0,strlen("repair table"))=="repair table")		{
		return $sql;
	}
	if(substr($sqllower,0,strlen("analyze table"))=="analyze table")	{
		return $sql;
	}

	//进行关键字过滤
	$sql = eregi_replace(" From "," from ",$sql);
	$sql = eregi_replace(" FROM "," from ",$sql);

	$sql = eregi_replace(" Where "," where ",$sql);
	$sql = eregi_replace(" WHERE "," where ",$sql);

	$sql = eregi_replace(" Select "," select ",$sql);
	$sql = eregi_replace(" SELECT "," select ",$sql);

	$sql = eregi_replace(" Order By "," order by ",$sql);
	$sql = eregi_replace(" ORDER BY "," order by ",$sql);

	$sql = eregi_replace(" Update "," update ",$sql);
	$sql = eregi_replace(" UPDATE "," update ",$sql);

	$sql = eregi_replace(" Delete "," delete ",$sql);
	$sql = eregi_replace(" DELETE "," delete ",$sql);

	$sql = eregi_replace(" Limit "," limit ",$sql);
	$sql = eregi_replace(" LIMITE "," limit ",$sql);

	$sql = eregi_replace(" Left "," left ",$sql);
	$sql = eregi_replace(" LEFT "," left ",$sql);

	//处理SELECT
	if(substr($sql,0,strlen("select "))=="select ")		{
		$FromArray = explode(" from ",$sql);
		//分析旧的SQL
		if($FromArray[1]!="")					{
			$FromSelectArray		= explode("select ",$FromArray[0]);
			$SQLArray['SelectText'] = $FromSelectArray[1];
			$FromWhereArray			= explode(" where ",$FromArray[1]);
			$SQLArray['FromText']	= $FromWhereArray[0];
			//如果是两个表,直接返回,不做处理
			$FromTablesArray		= explode(",",$SQLArray['FromText']);
			if($FromTablesArray[1]!='')			{
				print "两个表";
				return $sql;
			}
			//拆分数据库和表
			$FromDBArray			= explode(".",$SQLArray['FromText']);
			if($FromDBArray[1]!="")					{
				$SQLArray['FromText']	= $FromDBArray[1];
				$SQLArray['DBText']		= $FromDBArray[0];
			}
			$SQLArray['WhereText']	= $FromWhereArray[1];
			$FromOrderByArray		= explode(" order by ",$SQLArray['WhereText']);
			if($FromOrderByArray[1]!="")					{
				$SQLArray['WhereText']	= $FromOrderByArray[0];
				$SQLArray['OrderByText']= $FromOrderByArray[1];
			}
		}
		//处理新的SQL,之前要进行判断表自定义表是否存在
		$TABLENAME = $SQLArray['FromText'];
		$TABLENAME2 = "view_".$TABLENAME;
		if(in_array($TABLENAME2,$MetaTables))					{
			//自定义表存在
			$MetaColumnNames	= $db->MetaColumnNames($TABLENAME);
			$MetaColumnNames	= array_keys($MetaColumnNames);
			$原表主键	= $MetaColumnNames[0];
			$MetaColumnNames2	= $db->MetaColumnNames($TABLENAME2);
			$MetaColumnNames2	= array_keys($MetaColumnNames2);
			$新表主键	= $MetaColumnNames2[0];
			array_shift($MetaColumnNames2);
			$自定义表字段列表 = join(',',$MetaColumnNames2);
			$SQLArray['SelectText'] .= ",".$自定义表字段列表;
			$SQLArray['FromText']	.= ",".$TABLENAME2;
			if($SQLArray['WhereText']!="")		{
				$SQLArray['WhereText'] .= " and ".$TABLENAME.".".$原表主键."=".$TABLENAME2.".".$新表主键."";
			}
			else	{
				$SQLArray['WhereText']  = " ".$TABLENAME.".".$原表主键."=".$TABLENAME2.".".$新表主键."";
			}
		}
		else	{
			//不存在,直接返回
			return $sql;
		}
		//形成新的SQL文件
		$NEWTEXTSQL = "select ".$SQLArray['SelectText']." from ".$SQLArray['FromText']."";
		if(TRIM($SQLArray['WhereText'])!="")		{
			$NEWTEXTSQL .=" where ".$SQLArray['WhereText'];
		}
		if(TRIM($SQLArray['OrderByText'])!="")		{
			$NEWTEXTSQL .=" order by ".$SQLArray['WhereText'];
		}
		//形成后返回
		return $NEWTEXTSQL;
		//SELECT  部分结束
	}

	//UPDATE

	//DELETE

	//INSERT INTO



	print_R($NEWTEXTSQL);
	print_R($SQLArray);


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