
delete from TD_OA.sys_menu where MENU_ID='cc';
delete from TD_OA.sys_menu where MENU_ID='cd';
delete from TD_OA.sys_menu where MENU_ID='ce';



INSERT INTO TD_OA.SYS_MENU VALUES('cc','ͨ��CRM���','TDLIB');
INSERT INTO TD_OA.SYS_MENU VALUES('cd','�ҵ�������','TDLIB');
INSERT INTO TD_OA.SYS_MENU VALUES('ce','ͨ�����ʵ����','TDLIB');

delete from TD_OA.sys_function where FUNC_ID>='372' and FUNC_ID<='385';

#���ó������˵�IDֵ
INSERT INTO TD_OA.SYS_FUNCTION VALUES('372','cc02','��ͨҵ����Ա','TDLIB/Interface/CRM/MAIN_CRM_PERSON.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('373','cc04','���ž���˵�','TDLIB/Interface/CRM/MAIN_CRM_DEPT.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('374','cc06','�ܾ���˵�','TDLIB/Interface/CRM/MAIN_CRM_ADMIN.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('375','cd02','�ҵİ칫��Ʒ','TDLIB/Interface/officeproduct/officeproduct_my.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('376','cd04','�ҵĹ̶��ʲ�','TDLIB/Interface/fixedasset/my_fixedasset.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('377','cd06','�ҵ���������','TDLIB/Interface/XinZhengGuanLi/my_xingzheng.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('378','cd08','���Ϲ��ﱨ��','TDLIB/Interface/WuYeGuanLi/wygl_teacher.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('379','ce02','������Դϵͳ','TDLIB/Interface/XinZhengGuanLi/MAIN_RENLIZIYUAN.php');
#INSERT INTO TD_OA.SYS_FUNCTION VALUES('380','ce04','���߱�������','TDLIB/Interface/ZAIXIANKAOSHI/MAIN_ZAIXIANKAOSHI.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('381','ce06','���ڹ���ϵͳ','TDLIB/Interface/HOUQIN/MAIN_HOUQIN.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('382','ce08','�ۺ���Ϣ��ѯ','TDLIB/Interface/InforSearch/MAIN_INFOR.php');
INSERT INTO TD_OA.SYS_FUNCTION VALUES('383','ce20','ϵͳ��Ϣ����','TDLIB/Interface/CRM/MAIN_SETTINGS.php');

#INSERT INTO TD_OA.SYS_FUNCTION VALUES('384','cd08','ͨ�����ʵ����','TDLIB/Interface/WuYeGuanLi/wygl_teacher.php');
#INSERT INTO TD_OA.SYS_FUNCTION VALUES('385','cd08','���ò˵�','TDLIB/Interface/WuYeGuanLi/wygl_teacher.php');



#���MENU_ID 393 ;



SET USER PRIV ALL;






