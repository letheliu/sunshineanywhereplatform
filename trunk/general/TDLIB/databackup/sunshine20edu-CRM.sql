
delete from TD_OA.sys_menu where MENU_ID='cc';
delete from TD_OA.sys_menu where MENU_ID='cd';
delete from TD_OA.sys_menu where MENU_ID='ce';



INSERT INTO TD_OA.SYS_MENU VALUES('cc','通达CRM组件','TDLIB');
INSERT INTO TD_OA.SYS_MENU VALUES('cd','我的相关软件','TDLIB');
INSERT INTO TD_OA.SYS_MENU VALUES('ce','通达软件实验室','TDLIB');

delete from TD_OA.sys_function where FUNC_ID>='372' and FUNC_ID<='385';

#沿用诚信网菜单ID值
INSERT INTO TD_OA.SYS_FUNCTION VALUES('372','cc02','普通业务人员','TDLIB/Interface/CRM/MAIN_CRM_PERSON.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('373','cc04','部门经理菜单','TDLIB/Interface/CRM/MAIN_CRM_DEPT.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('374','cc06','总经理菜单','TDLIB/Interface/CRM/MAIN_CRM_ADMIN.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('375','cd02','我的办公用品','TDLIB/Interface/officeproduct/officeproduct_my.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('376','cd04','我的固定资产','TDLIB/Interface/fixedasset/my_fixedasset.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('377','cd06','我的行政考勤','TDLIB/Interface/XinZhengGuanLi/my_xingzheng.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('378','cd08','网上公物报修','TDLIB/Interface/WuYeGuanLi/wygl_teacher.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('379','ce02','人力资源系统','TDLIB/Interface/XinZhengGuanLi/MAIN_RENLIZIYUAN.php');
#INSERT INTO TD_OA.SYS_FUNCTION VALUES('380','ce04','在线报名考试','TDLIB/Interface/ZAIXIANKAOSHI/MAIN_ZAIXIANKAOSHI.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('381','ce06','后勤管理系统','TDLIB/Interface/HOUQIN/MAIN_HOUQIN.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('382','ce08','综合信息查询','TDLIB/Interface/InforSearch/MAIN_INFOR.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('383','ce20','系统信息设置','TDLIB/Interface/CRM/MAIN_SETTINGS.php');

#INSERT INTO TD_OA.SYS_FUNCTION VALUES('384','cd08','通达软件实验室','TDLIB/Interface/WuYeGuanLi/wygl_teacher.php');
#INSERT INTO TD_OA.SYS_FUNCTION VALUES('385','cd08','备用菜单','TDLIB/Interface/WuYeGuanLi/wygl_teacher.php');



#最大MENU_ID 393 ;



SET USER PRIV ALL;






