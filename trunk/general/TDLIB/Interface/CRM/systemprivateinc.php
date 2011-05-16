<?
if($_SESSION['SYSTEM_IS_TD_OA']=="0")									{
	$PRIVATE_SYSTEM['我的个人事务']['我的办公用品'] = array("../officeproduct/officeproduct_my.php","我的办公用品");
	$PRIVATE_SYSTEM['我的个人事务']['我的固定资产'] = array("../fixedasset/my_fixedasset.php","我的固定资产");
	$PRIVATE_SYSTEM['我的个人事务']['我的行政考勤'] = array("../XinZhengGuanLi/my_xingzheng.php","我的行政考勤");
	$PRIVATE_SYSTEM['我的个人事务']['网上公物报修'] = array("../WuYeGuanLi/wygl_teacher.php","网上公物报修");
	$PRIVATE_SYSTEM['我的个人事务']['申请管理']		= array("main_shenqing.php","申请管理");
	$PRIVATE_SYSTEM['我的部门事务']['固定资产部门级管理']		= array("../fixedasset/fixedasset_department_newai.php","固定资产部门级管理");
	$PRIVATE_SYSTEM['我的部门事务']['行政考勤部门级管理']		= array("../XinZhengGuanLi/my_bumen_xingzheng.php","行政考勤部门级管理");
}

//$PRIVATE_SYSTEM['总经理权限']['日程'] = array("crm_clendar_newai.php","日程");
$PRIVATE_SYSTEM['我的公司业务']['消息']		= array("crm_clendar_newai.php","消息中心");
$PRIVATE_SYSTEM['我的公司业务']['客户']		= array("crm_customer_newai.php","客户信息");
$PRIVATE_SYSTEM['我的公司业务']['费用(沟通)'] = array("crm_expense_newai.php","费用沟通");
$PRIVATE_SYSTEM['我的公司业务']['服务']		= array("crm_service_newai.php","客户服务");
$PRIVATE_SYSTEM['我的公司业务']['产品']		= array("crm_product_newai.php","产品信息");
$PRIVATE_SYSTEM['我的公司业务']['供应商']	= array("crm_provider_newai.php","供应商");
$PRIVATE_SYSTEM['我的公司业务']['订单']		= array("crm_order_newai.php","客户订单");
//$PRIVATE_SYSTEM['我的公司业务']['订单2']	= array("crm_order2_newai.php","客户订单2");
$PRIVATE_SYSTEM['我的公司业务']['合同']		= array("crm_contract_newai.php","客户合同");

$PRIVATE_SYSTEM['我的公司业务']['审核管理']['PARENT']	= array("main_jinglishenqing.php","审核管理");
$PRIVATE_SYSTEM['我的公司业务']['审核管理']['开票审核']	= array("crm_kaipiao_jlsq_newai.php","开票审核");
$PRIVATE_SYSTEM['我的公司业务']['审核管理']['佣金审核']	= array("crm_yongjin_jlsq_newai.php","佣金审核");
$PRIVATE_SYSTEM['我的公司业务']['审核管理']['延误付款']	= array("crm_yanchifukuan_jlsq_newai.php","延误付款");

$PRIVATE_SYSTEM['我的公司业务']['审核管理']['费用审核']	= array("crm_expense_newai.php","费用审核");
$PRIVATE_SYSTEM['我的公司业务']['审核管理']['其他审核']	= array("crm_qita_jlsq_newai.php","其他审核");

$PRIVATE_SYSTEM['我的公司业务']['审核管理']['请假审核']	= array("../Help/flowgraph_xingzhengkaoqin.php","请假审核");

$PRIVATE_SYSTEM['我的公司业务']['部门权限管理']	= array("inc_crm_priv.php","部门权限管理");
$PRIVATE_SYSTEM['我的公司业务']['CRM工具集']	= array("inc_crm_tools.php","CRM工具集");



//$PRIVATE_SYSTEM['部门经理权限']['日程']	= array("crm_clendar_newai.php","日程");
$PRIVATE_SYSTEM['我的部门业务']['消息']		= array("crm_clendar_dept_newai.php","消息中心");
$PRIVATE_SYSTEM['我的部门业务']['客户']		= array("crm_customer_dept_newai.php","客户信息");
$PRIVATE_SYSTEM['我的部门业务']['费用(沟通)'] = array("crm_expense_dept_newai.php","费用沟通");
$PRIVATE_SYSTEM['我的部门业务']['服务']		= array("crm_service_dept_newai.php","客户服务");
$PRIVATE_SYSTEM['我的部门业务']['产品']		= array("crm_product_dept_newai.php","产品信息");
$PRIVATE_SYSTEM['我的部门业务']['供应商']	= array("crm_provider_dept_newai.php","供应商");
$PRIVATE_SYSTEM['我的部门业务']['订单']		= array("crm_order_dept_newai.php","客户订单");
$PRIVATE_SYSTEM['我的部门业务']['合同']		= array("crm_contract_dept_newai.php","客户合同");

$PRIVATE_SYSTEM['我的部门业务']['申请管理']['PARENT']	= array("main_bumenshenqing.php","申请管理");
$PRIVATE_SYSTEM['我的部门业务']['申请管理']['开票申请']	= array("crm_kaipiao_bmsq_newai.php","开票申请");
$PRIVATE_SYSTEM['我的部门业务']['申请管理']['佣金申请']	= array("crm_yongjin_bmsq_newai.php","佣金申请");
$PRIVATE_SYSTEM['我的部门业务']['申请管理']['延误付款']	= array("crm_yanchifukuan_bmsq_newai.php","延误付款");
$PRIVATE_SYSTEM['我的部门业务']['申请管理']['费用申请']	= array("crm_expense_dept_newai.php","费用申请");
$PRIVATE_SYSTEM['我的部门业务']['申请管理']['请假申请']	= array("..\XinZhengGuanLi\my_xingzheng_qingjia_newai.php","请假申请");
$PRIVATE_SYSTEM['我的部门业务']['申请管理']['加班申请']	= array("..\XinZhengGuanLi\my_xingzheng_jiabanbuxiu_newai.php","加班申请");
$PRIVATE_SYSTEM['我的部门业务']['申请管理']['调休加班']	= array("..\XinZhengGuanLi\my_xingzheng_tiaoxiububan_newai.php","调休加班");
$PRIVATE_SYSTEM['我的部门业务']['申请管理']['调班申请']	= array("..\XinZhengGuanLi\my_xingzheng_tiaoban_newai.php","调班申请");
$PRIVATE_SYSTEM['我的部门业务']['申请管理']['相互调班']	= array("..\XinZhengGuanLi\my_xingzheng_tiaobanxianghu_newai.php","相互调班");
$PRIVATE_SYSTEM['我的部门业务']['申请管理']['其他申请']	= array("crm_qita_bmsq_newai.php","其他申请");



//$PRIVATE_SYSTEM['普通业务人员']['日程'] = array("crm_clendar_newai.php","日程");
$PRIVATE_SYSTEM['我的个人业务']['消息']		= array("crm_clendar_person_newai.php","消息中心");
$PRIVATE_SYSTEM['我的个人业务']['客户']		= array("crm_customer_person_newai.php","客户信息");
$PRIVATE_SYSTEM['我的个人业务']['费用(沟通)'] = array("crm_expense_person_newai.php","费用沟通");
$PRIVATE_SYSTEM['我的个人业务']['服务']		= array("crm_service_person_newai.php","客户服务");
$PRIVATE_SYSTEM['我的个人业务']['产品']		= array("crm_product_person_newai.php","产品信息");
$PRIVATE_SYSTEM['我的个人业务']['供应商']	= array("crm_provider_person_newai.php","供应商");
$PRIVATE_SYSTEM['我的个人业务']['订单']		= array("crm_order_person_newai.php","客户订单");
$PRIVATE_SYSTEM['我的个人业务']['合同']		= array("crm_contract_person_newai.php","客户合同");
$PRIVATE_SYSTEM['我的个人业务']['申请管理']	= array("main_shenqing.php","申请管理");


/* FXP
$PRIVATE_SYSTEM['我的个人业务']['申请管理']['PARENT']	= array("MAIN_SHENQING.php","申请管理");
$PRIVATE_SYSTEM['我的个人业务']['申请管理']['开票申请']	= array("","开票申请");
$PRIVATE_SYSTEM['我的个人业务']['申请管理']['佣金申请']	= array("","佣金申请");
$PRIVATE_SYSTEM['我的个人业务']['申请管理']['延误付款']	= array("","延误付款");
$PRIVATE_SYSTEM['我的个人业务']['申请管理']['加班申请']	= array("","加班申请");
$PRIVATE_SYSTEM['我的个人业务']['申请管理']['请假申请']	= array("","请假申请");
$PRIVATE_SYSTEM['我的个人业务']['申请管理']['费用申请']	= array("","费用申请");
$PRIVATE_SYSTEM['我的个人业务']['申请管理']['其他申请']	= array("","其他申请");
$PRIVATE_SYSTEM['我的个人业务']['申请管理']['费用报销']	= array("","费用报销");
*/


$PRIVATE_SYSTEM['人力资源']['人事管理']['PARENT']	= array("../XinZhengGuanLi/MAIN_RENSHI.php","人事管理");
$PRIVATE_SYSTEM['人力资源']['人事管理']['人事档案'] = array("../XinZhengGuanLi/hrms_file_newai.php","人事档案");
$PRIVATE_SYSTEM['人力资源']['人事管理']['奖惩']		= array("../XinZhengGuanLi/hrms_reward_punishment_newai.php","奖惩管理");
$PRIVATE_SYSTEM['人力资源']['人事管理']['调动']		= array("../XinZhengGuanLi/hrms_transfer_newai.php","人事调动");
$PRIVATE_SYSTEM['人力资源']['人事管理']['离职']		= array("../XinZhengGuanLi/hrms_file_lizhi_newai.php","离职管理");
$PRIVATE_SYSTEM['人力资源']['人事管理']['复职']		= array("../XinZhengGuanLi/hrms_file_fuzhi_newai.php","复职管理");
$PRIVATE_SYSTEM['人力资源']['人事管理']['职称']		= array("../XinZhengGuanLi/hrms_worker_zhicheng_newai.php","职称评定");
$PRIVATE_SYSTEM['人力资源']['人事管理']['证照']		= array("../XinZhengGuanLi/hrms_worker_zhengzhao_newai.php","证照管理");
$PRIVATE_SYSTEM['人力资源']['人事管理']['合同']		= array("../XinZhengGuanLi/hrms_worker_hetong_newai.php","合同管理");
$PRIVATE_SYSTEM['人力资源']['人事管理']['学习经历'] = array("../XinZhengGuanLi/hrms_educationalexperience_newai.php","学习经历");
$PRIVATE_SYSTEM['人力资源']['人事管理']['工作经历'] = array("../XinZhengGuanLi/hrms_workexperience_newai.php","工作经历");
$PRIVATE_SYSTEM['人力资源']['人事管理']['劳动技能'] = array("../XinZhengGuanLi/hrms_laboringskill_newai.php","劳动技能");
$PRIVATE_SYSTEM['人力资源']['人事管理']['社会关系'] = array("../XinZhengGuanLi/hrms_socialrelation_newai.php","社会关系");
//$PRIVATE_SYSTEM['人力资源']['人事管理']['调查问卷'] = array("../XinZhengGuanLi/hrms_socialrelation_newai.php","调查问卷");

$PRIVATE_SYSTEM['人力资源']['行政考勤']['PARENT']		= array("../XinZhengGuanLi/MAIN_XINGZHENGKAOQIN.php","行政考勤");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['组别']			= array("../XinZhengGuanLi/edu_xingzheng_group_newai.php","行政组别设置");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['班次']			= array("../XinZhengGuanLi/edu_xingzheng_banci_newai.php","行政班次设置");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['排班']			= array("../XinZhengGuanLi/edu_xingzheng_paiban.php","行政排班设置");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['原始打卡']		= array("../XinZhengGuanLi/edu_xingzheng_kaoqin_newai.php","原始打卡数据");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['考勤数据']		= array("../XinZhengGuanLi/edu_xingzheng_kaoqinmingxi_newai.php","考勤数据明细");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['考勤统计']		= array("../XinZhengGuanLi/edu_xingzheng_kaoqin_static.php","考勤数据统计");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['流程明细']		= array("../XinZhengGuanLi/edu_xingzheng_workflow.php","流程操作明细");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['部门级管理']	= array("../XinZhengGuanLi/my_bumen_xingzheng.php","考勤管理部门级");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['初始化']		= array("../XinZhengGuanLi/edu_xingzheng_kaoqinmingxi_administrator_change.php","考勤初始化");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['我的考勤']		= array("../XinZhengGuanLi/my_xingzheng.php","我的行政考勤");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['考勤机']		= array("../Help/XingzhengKaoQin.php","考勤机使用说明");
$PRIVATE_SYSTEM['人力资源']['行政考勤']['自动获取']		= array("../XinZhengGuanLi/edu_xingzheng_kaoqinmingxi_automake.php","自动获取考勤机数据");

$PRIVATE_SYSTEM['人力资源']['党员管理']['PARENT']		= array("../DangWuGuanLi/RLZY_MAIN_DANGWU.php","党员管理");
$PRIVATE_SYSTEM['人力资源']['党员管理']['党员管理']		= array("../DangWuGuanLi/edu_teacher_partymember_newai.php","党员管理");
$PRIVATE_SYSTEM['人力资源']['党员管理']['党费缴纳']		= array("../DangWuGuanLi/edu_teacher_partyfee_newai.php","党费缴纳");
$PRIVATE_SYSTEM['人力资源']['党员管理']['缴纳统计']		= array("../DangWuGuanLi/teacher_partyfeein.static.php","缴纳统计");
$PRIVATE_SYSTEM['人力资源']['党员管理']['预备党员']		= array("../DangWuGuanLi/edu_teacher_partymember2_newai.php","预备党员");
$PRIVATE_SYSTEM['人力资源']['党员管理']['党组织活动']	= array("../DangWuGuanLi/xingzheng_partyactive_newai.php","党组织活动");
$PRIVATE_SYSTEM['人力资源']['党员管理']['党支部管理']	= array("../DangWuGuanLi/xingzheng_partyunit_newai.php","党支部管理");
$PRIVATE_SYSTEM['人力资源']['党员管理']['党员状态']		= array("../DangWuGuanLi/xingzheng_partystatus_newai.php","党员状态");
//$PRIVATE_SYSTEM['人力资源']['党员管理']['党员年度量化考核']=array("../DangWuGuanLi/edu_dangyuan_yearcheck_newai.php","党员年度量化考核");
//$PRIVATE_SYSTEM['人力资源']['党员管理']['民主评议党员登记表']=array("../DangWuGuanLi/edu_dangyuan_work_check_register_newai.php","民主评议党员登记表");

$PRIVATE_SYSTEM['人力资源']['干部测评']['PARENT']	= array("../XinZhengGuanLi/MAIN_GANBUCEPING.php","行政考勤");
$PRIVATE_SYSTEM['人力资源']['干部测评']['测评项目管理'] = array("../zhongcengpingce/edu_zhongcengceping_newai.php","测评项目管理");
$PRIVATE_SYSTEM['人力资源']['干部测评']['人事部门设置'] = array("../zhongcengpingce/edu_zhongcenggangweishezhi_newai.php","人事部门设置");
$PRIVATE_SYSTEM['人力资源']['干部测评']['设置我的自评'] = array("../zhongcengpingce/edu_zhongcengmyziping_newai.php","设置我的自评");
$PRIVATE_SYSTEM['人力资源']['干部测评']['参与干部测评'] = array("../zhongcengpingce/edu_zhongcengcanyupingce_newai.php","参与干部测评");
$PRIVATE_SYSTEM['人力资源']['干部测评']['查看我的测评'] = array("../zhongcengpingce/edu_zhongcengviewceping_newai.php","查看我的测评");
$PRIVATE_SYSTEM['人力资源']['干部测评']['干部测评统计'] = array("../zhongcengpingce/edu_zhongcengtognji_newai.php","干部测评统计");
$PRIVATE_SYSTEM['人力资源']['干部测评']['测评内容明细'] = array("../zhongcengpingce/edu_zhongcengmingxi_newai.php","测评内容明细");
$PRIVATE_SYSTEM['人力资源']['干部测评']['测评项目设置'] = array("../zhongcengpingce/edu_zhongcengxingmu_newai.php","测评项目设置");

$PRIVATE_SYSTEM['人力资源']['招聘管理']['PARENT']		= array("../XinZhengGuanLi/MAIN_ZHAOPIN.php","招聘管理");
$PRIVATE_SYSTEM['人力资源']['招聘管理']['招聘计划']		= array("../XinZhengGuanLi/hrms_zpjihua_newai.php","招聘计划");
$PRIVATE_SYSTEM['人力资源']['招聘管理']['招聘计划审批'] = array("../XinZhengGuanLi/hrms_zpjihua_shenpi_newai.php","招聘计划审批");
$PRIVATE_SYSTEM['人力资源']['招聘管理']['招聘人才库']	= array("../XinZhengGuanLi/hrms_zprencaiku_newai.php","招聘人才库");
$PRIVATE_SYSTEM['人力资源']['招聘管理']['招聘录用']		= array("../XinZhengGuanLi/hrms_file_luyong_newai.php","招聘录用");

$PRIVATE_SYSTEM['人力资源']['薪酬管理']['PARENT']		= array("../XinZhengGuanLi/MAIN_XINCHOU.php","薪酬管理");
$PRIVATE_SYSTEM['人力资源']['薪酬管理']['我的工资福利'] = array("../XinZhengGuanLi/hrms_salary_detail_newai.php","我的工资福利");
$PRIVATE_SYSTEM['人力资源']['薪酬管理']['工资福利设置'] = array("../XinZhengGuanLi/hrms_salary_type.php","工资福利设置");
$PRIVATE_SYSTEM['人力资源']['薪酬管理']['薪酬分组设置'] = array("../XinZhengGuanLi/hrms_salary_group_newai.php","薪酬分组设置");
$PRIVATE_SYSTEM['人力资源']['薪酬管理']['薪酬设置']		= array("../XinZhengGuanLi/hrms_salary_newai.php","薪酬设置");
$PRIVATE_SYSTEM['人力资源']['薪酬管理']['薪酬统计']		= array("../XinZhengGuanLi/hrms_salary_tongji_newai.php","薪酬统计");

$PRIVATE_SYSTEM['人力资源']['日常费用']['PARENT']		= array("../XinZhengGuanLi/MAIN_FEIYONG.php","日常费用");
$PRIVATE_SYSTEM['人力资源']['日常费用']['费用明细']		= array("../XinZhengGuanLi/hrms_expense_newai.php","费用明细");
$PRIVATE_SYSTEM['人力资源']['日常费用']['费用类型']		= array("../XinZhengGuanLi/hrms_expense_type_newai.php","费用类型");

//$PRIVATE_SYSTEM['人力资源']['人员考核']['PARENT']		= array("../DangWuGuanLi/MAIN_RENYUANKAOHE.php","人员考勤");
//$PRIVATE_SYSTEM['人力资源']['人员考核']['行政人员工作考核登记表'] = array("../DangWuGuanLi/edu_xingzheng_work_check_register_newai.php","行政人员工作考核登记表");
//$PRIVATE_SYSTEM['人力资源']['人员考核']['行政人员年度考核量化表'] = array("../DangWuGuanLi/edu_xingzheng_yearcheck_newai.php","行政人员年度考核量化表");

$PRIVATE_SYSTEM['人力资源']['节假日值班']				= array("../XinZhengGuanLi/edu_zhiban_newai.php","节假日值班");


$PRIVATE_SYSTEM['后勤管理']['办公用品']['PARENT']		= array("../officeproduct/MAIN_OFFICEPRODUCT.php","办公用品");
$PRIVATE_SYSTEM['后勤管理']['办公用品']['办公用品查阅'] = array("../officeproduct/officeproduct_view.php","办公用品查阅");
$PRIVATE_SYSTEM['后勤管理']['办公用品']['办公用品管理'] = array("../officeproduct/officeproduct_newai.php","办公用品管理");
$PRIVATE_SYSTEM['后勤管理']['办公用品']['操作明细']		= array("../officeproduct/officeproduct_admin.php","操作明细");
$PRIVATE_SYSTEM['后勤管理']['办公用品']['仓库设置']		= array("../officeproduct/officeproductcangku_newai.php","仓库设置");
$PRIVATE_SYSTEM['后勤管理']['办公用品']['仓库统计']		= array("../officeproduct/officeproduct_tongji.php","仓库统计");
$PRIVATE_SYSTEM['后勤管理']['办公用品']['分项统计']		= array("../officeproduct/officeproduct_fenxiang.php","分项统计");
$PRIVATE_SYSTEM['后勤管理']['办公用品']['分类设置']		= array("../officeproduct/officeproductgroup_newai.php","分类设置");

$PRIVATE_SYSTEM['后勤管理']['固定资产']['PARENT']		= array("../fixedasset/MAIN_FIXEDASSET.php","固定资产");
$PRIVATE_SYSTEM['后勤管理']['固定资产']['全权限管理']	= array("../fixedasset/fixedasset_newai.php","全权限管理");
$PRIVATE_SYSTEM['后勤管理']['固定资产']['资产管理员']	= array("../fixedasset/fixedasset_admin_newai.php","资产管理员");
$PRIVATE_SYSTEM['后勤管理']['固定资产']['部门级管理']	= array("../fixedasset/fixedasset_department_newai.php","资产部门级管理");
$PRIVATE_SYSTEM['后勤管理']['固定资产']['操作明细']		= array("../fixedasset/admin_fixedasset.php","操作明细");
$PRIVATE_SYSTEM['后勤管理']['固定资产']['部门总括统计'] = array("../fixedasset/fixedasset_tongjijianjie.php","部门总括统计");
$PRIVATE_SYSTEM['后勤管理']['固定资产']['部门明细统计'] = array("../fixedasset/fixedasset_tongji.php","部门明细统计");
$PRIVATE_SYSTEM['后勤管理']['固定资产']['按批次统计']	= array("../fixedasset/fixedasset_pici.php","按批次统计");
$PRIVATE_SYSTEM['后勤管理']['固定资产']['己报废资产']	= array("../fixedasset/fixedasset_baofei.php","己报废资产");
$PRIVATE_SYSTEM['后勤管理']['固定资产']['分类设置']		= array("../fixedasset/fixedassetgroup_newai.php","分类设置");
$PRIVATE_SYSTEM['后勤管理']['固定资产']['部门权限管理'] = array("../fixedasset/inc_fixedasset_priv.php","部门权限管理");

$PRIVATE_SYSTEM['后勤管理']['公物维修']['PARENT']	= array("../WuYeGuanLi/MAIN_WYGL.php","公物维修");
$PRIVATE_SYSTEM['后勤管理']['公物维修']['报修信息'] = array("../WuYeGuanLi/wygl_baoxiuxinxi1_newai.php","报修信息");
$PRIVATE_SYSTEM['后勤管理']['公物维修']['报修受理'] = array("../WuYeGuanLi/wygl_baoxiuxinxi2_newai.php","报修受理");
$PRIVATE_SYSTEM['后勤管理']['公物维修']['修复确认'] = array("../WuYeGuanLi/wygl_baoxiuxinxi3_newai.php","修复确认");
$PRIVATE_SYSTEM['后勤管理']['公物维修']['用料登记'] = array("../WuYeGuanLi/wygl_baoxiuxinxi4_newai.php","用料登记");
$PRIVATE_SYSTEM['后勤管理']['公物维修']['费用结算'] = array("../WuYeGuanLi/wygl_baoxiuxinxi5_newai.php","费用结算");
$PRIVATE_SYSTEM['后勤管理']['公物维修']['服务评价'] = array("../WuYeGuanLi/wygl_weixiupingjia_newai.php","服务评价");
$PRIVATE_SYSTEM['后勤管理']['公物维修']['类型设置'] = array("../WuYeGuanLi/MAIN_SETTING.php","类型设置");
$PRIVATE_SYSTEM['后勤管理']['公物维修']['楼房设置'] = array("../WuYeGuanLi/MAIN_BUILDING.php","楼房设置");


//$PRIVATE_SYSTEM['在线报名考试']['题库卷库']['PARENT']		= array("../ZAIXIANKAOSHI/MAIN_TIKUJUANKU.php","题库卷库");
//$PRIVATE_SYSTEM['在线报名考试']['题库卷库']['所属课程信息']	= array("../ZAIXIANKAOSHI/tiku_kecheng_newai.php","所属课程信息");
//$PRIVATE_SYSTEM['在线报名考试']['题库卷库']['试题信息管理'] = array("../ZAIXIANKAOSHI/tiku_shiti_newai.php","试题信息管理");
//$PRIVATE_SYSTEM['在线报名考试']['题库卷库']['试卷信息管理'] = array("../ZAIXIANKAOSHI/tiku_shijuan_newai.php","试卷信息管理");
//$PRIVATE_SYSTEM['在线报名考试']['题库卷库']['试卷考题生成'] = array("../ZAIXIANKAOSHI/tiku_shiti_makeexec.php","试卷考题生成");
//$PRIVATE_SYSTEM['在线报名考试']['题库卷库']['试卷考题明细'] = array("../ZAIXIANKAOSHI/tiku_shijuanku_newai.php","试卷考题明细");
//$PRIVATE_SYSTEM['在线报名考试']['题库卷库']['考试信息管理'] = array("../ZAIXIANKAOSHI/tiku_kaoshi_newai.php","考试信息管理");
//$PRIVATE_SYSTEM['在线报名考试']['题库卷库']['试题难易程度'] = array("../ZAIXIANKAOSHI/tiku_shitinanyi_newai.php","试题难易程度");
//$PRIVATE_SYSTEM['在线报名考试']['题库卷库']['试题题目类型'] = array("../ZAIXIANKAOSHI/tiku_shititype_newai.php","试题题目类型");

//$PRIVATE_SYSTEM['在线报名考试']['在线考试']['PARENT']		= array("../ZAIXIANKAOSHI/MAIN_KAOSHI.php","在线考试");
//$PRIVATE_SYSTEM['在线报名考试']['在线考试']['考试信息管理']	= array("../ZAIXIANKAOSHI/tiku_kaoshi_newai.php","考试信息管理");
//$PRIVATE_SYSTEM['在线报名考试']['在线考试']['考生考试明细'] = array("../ZAIXIANKAOSHI/tiku_examdata_newai.php","学生考试明细");
//$PRIVATE_SYSTEM['在线报名考试']['在线考试']['考生考试成绩'] = array("../ZAIXIANKAOSHI/tiku_examdata_static.php","学生考试成绩");


$PRIVATE_SYSTEM['综合信息查询']['后勤管理查询']['PARENT']	= array("../InforSearch/MAIN_HOUQIN.php","后勤管理");
$PRIVATE_SYSTEM['综合信息查询']['后勤管理查询']['办公用品'] = array("../InforSearch/my_officeproduct.php","办公用品");
$PRIVATE_SYSTEM['综合信息查询']['后勤管理查询']['固定资产'] = array("../InforSearch/my_fixedasset.php","固定资产");
$PRIVATE_SYSTEM['综合信息查询']['后勤管理查询']['物业管理'] = array("../InforSearch/my_wuyeguanli.php","物业管理");


if($_SESSION['SYSTEM_IS_TD_OA']=="0")									{
   $PRIVATE_SYSTEM['系统信息设置']['组织机构设置'] = array("../Framework/MAIN_UNIT.php","组织机构设置");
}
$PRIVATE_SYSTEM['系统信息设置']['数据库管理'] = array("database_setting.php","数据库管理");
$PRIVATE_SYSTEM['系统信息设置']['系统权限'] = array("systemprivateview.php","系统权限");
$PRIVATE_SYSTEM['系统信息设置']['系统授权'] = array("../../Framework/system_infor.php","系统授权");
$PRIVATE_SYSTEM['系统信息设置']['在线升级'] = array("../../databackup/update.php","在线升级");
$PRIVATE_SYSTEM['系统信息设置']['数据字典'] = array("FileSettings.php","数据字典");
$PRIVATE_SYSTEM['系统信息设置']['消息中心'] = array("../DICT/crm_clendar.php","消息中心");
$PRIVATE_SYSTEM['系统信息设置']['在线反馈'] = array("onlineguestbook.php","在线反馈");


//从现在权限信息中过滤出实际的权限,用于菜单部分限制
function SystemPrivateInc($TARGET_ARRAY,$TARGET_TITLE)					{

global $db,$_SESSION;		//USER_PRIV_OTHER
$LOGIN_USER_PRIV_OTHER	= $_SESSION['LOGIN_USER_PRIV_OTHER'];
$SUNSHINE_USER_PRIV		= $_SESSION['LOGIN_USER_PRIV'];

$SUNSHINE_USER_PRIV_STR_ARRAY = explode(',',$SUNSHINE_USER_PRIV.",".$LOGIN_USER_PRIV_OTHER);
$SUNSHINE_USER_PRIV_STR_ARRAY = array_values($SUNSHINE_USER_PRIV_STR_ARRAY);
for($i=0;$i<sizeof($SUNSHINE_USER_PRIV_STR_ARRAY);$i++)		{

	$SUNSHINE_USER_PRIV_TEXT_TEMP		= returntablefield("user_priv","USER_PRIV",TRIM($SUNSHINE_USER_PRIV_STR_ARRAY[$i]),"PRIV_NAME");
	$SUNSHINE_USER_PRIV_TEXT_ARRAY[]	= returntablefield("systemprivatetdlib","ID",TRIM($SUNSHINE_USER_PRIV_STR_ARRAY[$i]),"CONTENT");
	//print "<font color=red>".$SUNSHINE_USER_PRIV_TEXT_TEMP.TRIM($SUNSHINE_USER_PRIV_STR_ARRAY[$i])."</font>||";
}
//print_R($SUNSHINE_USER_PRIV_STR_ARRAY);exit;
//print_R($SUNSHINE_USER_PRIV_TEXT_ARRAY);exit;
$SUNSHINE_USER_PRIV_TEXT_ARRAY_TEXT = join(',',$SUNSHINE_USER_PRIV_TEXT_ARRAY);
$SUNSHINE_USER_PRIV_TEXT_ARRAY = explode(',',$SUNSHINE_USER_PRIV_TEXT_ARRAY_TEXT);
$SUNSHINE_USER_PRIV_TEXT_ARRAY = @array_flip($SUNSHINE_USER_PRIV_TEXT_ARRAY);
$SUNSHINE_USER_PRIV_TEXT_ARRAY = @array_flip($SUNSHINE_USER_PRIV_TEXT_ARRAY);
$SUNSHINE_USER_PRIV_TEXT_ARRAY = @array_values($SUNSHINE_USER_PRIV_TEXT_ARRAY);

$MENU_TOP_ARRAY = @array_keys($TARGET_ARRAY);

//print_R($SUNSHINE_USER_PRIV_TEXT_ARRAY);

for($ii=0;$ii<count($MENU_TOP_ARRAY);$ii++)			{
	$MENU_TOP_NAME = $MENU_TOP_ARRAY[$ii];
	$MENU_TOP_NAME_ARRAY = $TARGET_ARRAY[$MENU_TOP_NAME];
	//print_R($MENU_TOP_NAME_ARRAY);
	if(count($MENU_TOP_NAME_ARRAY)==2)	{
		$MENU_TOP_NAME_TEXT = $MENU_TOP_NAME_ARRAY[1];
		$MENU_TOP_NAME_URL = $MENU_TOP_NAME_ARRAY[0];
	}
	else	{
		$MENU_TOP_NAME_ARRAY = $MENU_TOP_NAME_ARRAY['PARENT'];
		$MENU_TOP_NAME_TEXT = $MENU_TOP_NAME_ARRAY[1];
		$MENU_TOP_NAME_URL = $MENU_TOP_NAME_ARRAY[0];
	}
	//判断是否具有子菜单,然后判断是否具有对应权限-开始
	$DEFAULT_MENU = 1;
	$MENU_TOP_ARRAY2 = @array_keys($TARGET_ARRAY[$MENU_TOP_NAME]);
	//判断是否具有子菜单
	//print_R($MENU_TOP_ARRAY2);
	//具有子菜单
	if($MENU_TOP_ARRAY2[0]!="0")							{
		$MenuArray_child = array();
		for($x=0;$x<count($MENU_TOP_ARRAY2);$x++)				{
			$MENU_TOP_ARRAY2_NAME = $MENU_TOP_ARRAY2[$x];
			$TARGET_TITLE_NAME2 = $TARGET_TITLE."-".$MENU_TOP_NAME."-".$MENU_TOP_ARRAY2_NAME;
			//print $TARGET_TITLE_NAME2."&nbsp;&nbsp;";
			if(in_array($TARGET_TITLE_NAME2,$SUNSHINE_USER_PRIV_TEXT_ARRAY))	{
				$MenuArray_child[] = array($TARGET_TITLE_NAME2);
			}
		}
		if(count($MenuArray_child)==0)		{
			$DEFAULT_MENU = 0;
		}
	}
	//print_R($SUNSHINE_USER_PRIV_TEXT_ARRAY);
	//判断是否具有子菜单,然后判断是否具有对应权限-结束
	if($MENU_TOP_NAME!="PARENT"&&$MENU_TOP_NAME!=""&&$DEFAULT_MENU==1)	{
		//判断是否有此权限,从系统权限中过滤权限信息
		$TARGET_TITLE_NAME = $TARGET_TITLE."-".$MENU_TOP_NAME;
		if(in_array($TARGET_TITLE_NAME,$SUNSHINE_USER_PRIV_TEXT_ARRAY))	{
			$MenuArray[] = array($MENU_TOP_NAME_URL,$MENU_TOP_NAME,$MENU_TOP_NAME_TEXT);
		}
	}
	//print_R($SUNSHINE_USER_PRIV_TEXT_ARRAY);
}
//print_R($SUNSHINE_USER_PRIV_TEXT_ARRAY);
return $MenuArray;

}

//较验页面的合法性,用于菜单部分限制
function CheckSystemPrivate($MODULE_NAME,$MODULE_NAME2='',$MODULE_NAME3='')	{

global $db,$_SESSION;		//USER_PRIV_OTHER
$LOGIN_USER_PRIV_OTHER = $_SESSION['LOGIN_USER_PRIV_OTHER'];
$SUNSHINE_USER_PRIV = $_SESSION['SUNSHINE_USER_PRIV'];
//print_R($_SESSION);//exit;
$SUNSHINE_USER_PRIV_STR_ARRAY = explode(',',$SUNSHINE_USER_PRIV.",".$LOGIN_USER_PRIV_OTHER);
for($i=0;$i<sizeof($SUNSHINE_USER_PRIV_STR_ARRAY);$i++)		{
	//$SUNSHINE_USER_PRIV_TEXT_TEMP = returntablefield("user_priv","USER_PRIV",$SUNSHINE_USER_PRIV_STR_ARRAY[$i],"PRIV_NAME");
	$SUNSHINE_USER_PRIV_TEXT_ARRAY[] = returntablefield("systemprivatetdlib","ID",$SUNSHINE_USER_PRIV_STR_ARRAY[$i],"CONTENT");
	//print_R($SUNSHINE_USER_PRIV_TEXT_ARRAY);
}

$SUNSHINE_USER_PRIV_TEXT_ARRAY_TEXT = join(',',$SUNSHINE_USER_PRIV_TEXT_ARRAY);
$SUNSHINE_USER_PRIV_TEXT_ARRAY = explode(',',$SUNSHINE_USER_PRIV_TEXT_ARRAY_TEXT);
$SUNSHINE_USER_PRIV_TEXT_ARRAY = @array_flip($SUNSHINE_USER_PRIV_TEXT_ARRAY);
$SUNSHINE_USER_PRIV_TEXT_ARRAY = @array_flip($SUNSHINE_USER_PRIV_TEXT_ARRAY);
$SUNSHINE_USER_PRIV_TEXT_ARRAY = @array_values($SUNSHINE_USER_PRIV_TEXT_ARRAY);

//print_R($SUNSHINE_USER_PRIV_TEXT_ARRAY);
if(in_array($MODULE_NAME,$SUNSHINE_USER_PRIV_TEXT_ARRAY)&&$MODULE_NAME!="")		{
	//权限合法
	//print $MODULE_NAME."-1-".$MODULE_NAME2;
}
else if(in_array($MODULE_NAME2,$SUNSHINE_USER_PRIV_TEXT_ARRAY)&&$MODULE_NAME2!="")		{
	//权限合法
	//print $MODULE_NAME."-2-".$MODULE_NAME2;
}
else if(in_array($MODULE_NAME3,$SUNSHINE_USER_PRIV_TEXT_ARRAY)&&$MODULE_NAME3!="")		{
	//权限合法
	//print $MODULE_NAME."-2-".$MODULE_NAME2;
}
else	{
	//权限不合法,中断显示

require_once('cache.inc.php');
if($SYSTEM_MODE)   {
	$SCRIPT_FILENAME = ereg_replace('/','\\',$_SERVER['SCRIPT_FILENAME']);
	$MODE_SHOW_TEXT = "<input type=text readonly class=SmallInput value='$SCRIPT_FILENAME' size=95/>";
}
//print_R($_SESSION);
if($_SESSION['LOGIN_THEME']=='')	$SHOW_THEME = 9;
else $SHOW_THEME = $_SESSION['LOGIN_THEME'];
print <<<EOF
<link rel="stylesheet" type="text/css" href="/theme/$SHOW_THEME/style.css">
<body class='bodycolor'><title>目录访问限制</title><body bgcolor='#264989'><table class="MessageBox" align="center" width="500">
  <tr>
    <td class="msg warning">
      <h4 class="title">警告:{$MODULE_NAME}</h4>
      <div class="content" style="font-size:12pt">无该模块使用权限！如需使用该模块，请联系管理员重新设置本角色权限！</div>
	  {$MODE_SHOW_TEXT}
    </td>
  </tr>
</table>
EOF;


exit;
}

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