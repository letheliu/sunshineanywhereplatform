-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 12 �� 14:33
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_piaoju_type`
-- 

CREATE TABLE `crm_piaoju_type` (
  `���` int(11) NOT NULL auto_increment,
  `Ʊ������` varchar(200) NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='Ʊ�����ͱ�' AUTO_INCREMENT=4 ;

-- 
-- �������е����� `crm_piaoju_type`
-- 

INSERT INTO `crm_piaoju_type` (`���`, `Ʊ������`) VALUES 
(1, '��ֵ'),
(2, '�վ�');

-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 12 �� 14:34
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_feiyong_sq`
-- 

CREATE TABLE `crm_feiyong_sq` (
  `���` int(11) NOT NULL auto_increment,
  `����` varchar(255) NOT NULL,
  `��������` varchar(255) NOT NULL,
  `���` varchar(255) NOT NULL,
  `������;` text NOT NULL,
  `��������` datetime NOT NULL,
  `�ͻ�����` varchar(255) NOT NULL,
  `������` varchar(255) NOT NULL,
  `¼��Ա` varchar(255) NOT NULL,
  `�Ƿ����` varchar(255) NOT NULL,
  `�������` datetime NOT NULL,
  `�Ƿ�����` varchar(255) NOT NULL,
  `��������` datetime NOT NULL,
  `��ע` text NOT NULL,
  `������` varchar(255) NOT NULL,
  `����ʱ��` datetime NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='���������' AUTO_INCREMENT=4 ;

-- 
-- �������е����� `crm_feiyong_sq`
-- 

INSERT INTO `crm_feiyong_sq` (`���`, `����`, `��������`, `���`, `������;`, `��������`, `�ͻ�����`, `������`, `¼��Ա`, `�Ƿ����`, `�������`, `�Ƿ�����`, `��������`, `��ע`, `������`, `����ʱ��`) VALUES 
(1, '0002152', '�д�����', '5000', '�ͷ������д�', '2011-05-11 00:00:00', '��ʯ��', 'С��', 'С��', '1', '2011-05-04 00:00:00', '0', '0000-00-00 00:00:00', '', 'admin', '2011-05-11 16:24:33'),
(2, '102153', '�����', '500', '�������', '2011-05-12 00:00:00', '��ʯ��', 'ϵͳ����Ա', 'ϵͳ����Ա', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-12 10:21:06'),
(3, '102154', '��ͨ', '200', '����', '2011-05-12 00:00:00', '֣�ݵ���Ƽ�������޹�˾', 'ϵͳ����Ա', 'ϵͳ����Ա', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-12 14:25:02');

-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 12 �� 14:35
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_kaipiao_sq`
-- 

CREATE TABLE `crm_kaipiao_sq` (
  `���` int(11) NOT NULL auto_increment,
  `����` varchar(255) NOT NULL,
  `������` varchar(255) NOT NULL,
  `��������` date NOT NULL,
  `Ʊ������` varchar(255) NOT NULL,
  `ҵ������` varchar(255) NOT NULL,
  `��Ʊ��˾` varchar(255) NOT NULL,
  `�ͻ���˾` varchar(255) NOT NULL,
  `Ʊ������` varchar(255) NOT NULL,
  `Ʊ�ݽ��` varchar(255) NOT NULL,
  `¼��Ա` varchar(255) NOT NULL,
  `�Ƿ����` varchar(255) NOT NULL,
  `�Ƿ�����` varchar(255) NOT NULL,
  `��ע` text NOT NULL,
  `������` varchar(255) NOT NULL,
  `����ʱ��` date NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='��Ʊ�����' AUTO_INCREMENT=5 ;

-- 
-- �������е����� `crm_kaipiao_sq`
-- 

INSERT INTO `crm_kaipiao_sq` (`���`, `����`, `������`, `��������`, `Ʊ������`, `ҵ������`, `��Ʊ��˾`, `�ͻ���˾`, `Ʊ������`, `Ʊ�ݽ��`, `¼��Ա`, `�Ƿ����`, `�Ƿ�����`, `��ע`, `������`, `����ʱ��`) VALUES 
(1, '001', 'С��', '2011-05-11', '��ֵ', '����', '����Ƽ����', 'ͨ���в�', '��������������������', '100000', 'С��', '1', '0', '', 'admin', '2011-05-12'),
(2, '0002', 'С��', '2011-05-11', '�վ�', '�칫֧��', '����Ƽ����', 'ͨ���в�', 'Ӫҵ��ֵ˰��Ʊ', '2000', 'С��', '1', '0', '', 'admin', '2011-05-12'),
(3, '100002', 'ϵͳ����Ա', '2011-05-12', '��ֵ', '����', '����Ƽ����', '��ʯ��', '������ֵ��Ʊ����', '11000', 'ϵͳ����Ա', '', '', '', 'admin', '2011-05-12'),
(4, '100003', 'ϵͳ����Ա', '2011-05-12', '��ֵ', '�칫֧��', '����Ƽ����', '��ʯ��', '����ȷ�', '2000', 'ϵͳ����Ա', '', '', '', 'admin', '2011-05-12');


-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 12 �� 14:35
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_qita_sq`
-- 

CREATE TABLE `crm_qita_sq` (
  `���` int(11) NOT NULL auto_increment,
  `����` varchar(255) NOT NULL,
  `������` varchar(255) NOT NULL,
  `��������` datetime NOT NULL,
  `��������` varchar(255) NOT NULL,
  `¼��Ա` varchar(255) NOT NULL,
  `�Ƿ����` varchar(255) NOT NULL,
  `�������` datetime NOT NULL,
  `�Ƿ�����` varchar(255) NOT NULL,
  `��������` datetime NOT NULL,
  `��ע` text NOT NULL,
  `������` varchar(255) NOT NULL,
  `����ʱ��` datetime NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='���������' AUTO_INCREMENT=3 ;

-- 
-- �������е����� `crm_qita_sq`
-- 

INSERT INTO `crm_qita_sq` (`���`, `����`, `������`, `��������`, `��������`, `¼��Ա`, `�Ƿ����`, `�������`, `�Ƿ�����`, `��������`, `��ע`, `������`, `����ʱ��`) VALUES 
(1, '0210515', 'С��', '2011-05-11 00:00:00', '��ͳԷ�', 'С��', '1', '2011-05-14 00:00:00', '0', '0000-00-00 00:00:00', '.....', 'admin', '2011-05-11 16:40:37'),
(2, '00255', 'ϵͳ����Ա', '2011-05-11 00:00:00', '���빫����', 'ϵͳ����Ա', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-11 17:23:00');

-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 12 �� 14:36
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_yewu_type`
-- 

CREATE TABLE `crm_yewu_type` (
  `���` int(11) NOT NULL auto_increment,
  `ҵ������` varchar(200) NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='ҵ�����ͱ�' AUTO_INCREMENT=4 ;

-- 
-- �������е����� `crm_yewu_type`
-- 

INSERT INTO `crm_yewu_type` (`���`, `ҵ������`) VALUES 
(1, '����'),
(2, '�칫֧��'),
(3, '');


-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 12 �� 14:37
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_yongjin_sq`
-- 

CREATE TABLE `crm_yongjin_sq` (
  `���` int(11) NOT NULL auto_increment,
  `����` varchar(255) NOT NULL,
  `��ͬ���` varchar(255) NOT NULL,
  `������` varchar(255) NOT NULL,
  `��������` varchar(255) NOT NULL,
  `��������` varchar(255) NOT NULL,
  `������` varchar(255) NOT NULL,
  `�����˺�` varchar(255) NOT NULL,
  `������` varchar(255) NOT NULL,
  `������ϸ` text NOT NULL,
  `�ͻ�����` varchar(255) NOT NULL,
  `¼��Ա` varchar(255) NOT NULL,
  `�Ƿ����` varchar(255) NOT NULL,
  `�Ƿ�����` varchar(255) NOT NULL,
  `��ע` text NOT NULL,
  `������` varchar(255) NOT NULL,
  `����ʱ��` datetime NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='Ӷ�������' AUTO_INCREMENT=3 ;

-- 
-- �������е����� `crm_yongjin_sq`
-- 

INSERT INTO `crm_yongjin_sq` (`���`, `����`, `��ͬ���`, `������`, `��������`, `��������`, `������`, `�����˺�`, `������`, `������ϸ`, `�ͻ�����`, `¼��Ա`, `�Ƿ����`, `�Ƿ�����`, `��ע`, `������`, `����ʱ��`) VALUES 
(1, '0001', '0020202', 'С��', '2011-05-11', 'AAAAA', 'С��', '620000145210454', '500000', '�����', 'С��', 'С��', '1', '0', '', 'admin', '2011-05-11 14:48:32'),
(2, '0021', 'AAA', 'AA', '2011-05-11', 'AAAAA', 'С��', '620000145210454', '500000', 'AAA', 'С��', 'AA', '', '', '', 'admin', '2011-05-11 17:15:57');

-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 12 �� 14:39
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_yanchifukuan_sq`
-- 

CREATE TABLE `crm_yanchifukuan_sq` (
  `���` int(11) NOT NULL auto_increment,
  `����` varchar(255) NOT NULL,
  `������` varchar(255) NOT NULL,
  `��������` datetime NOT NULL,
  `��������` varchar(255) NOT NULL,
  `�ɽ�����` datetime NOT NULL,
  `�ͻ�����` varchar(255) NOT NULL,
  `�ɽ���Ϣ` varchar(255) NOT NULL,
  `Ӧ�ս��` varchar(255) NOT NULL,
  `ʵ�ս��` varchar(255) NOT NULL,
  `Ӧ������` datetime NOT NULL,
  `��ŵ����` datetime NOT NULL,
  `ʵ������` datetime NOT NULL,
  `����ԭ��` varchar(255) NOT NULL,
  `¼��Ա` varchar(255) NOT NULL,
  `�Ƿ����` varchar(255) NOT NULL,
  `�������` datetime NOT NULL,
  `�Ƿ�����` varchar(255) NOT NULL,
  `��ע` text NOT NULL,
  `������` varchar(255) NOT NULL,
  `����ʱ��` datetime NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='�ӳٸ����' AUTO_INCREMENT=2 ;

-- 
-- �������е����� `crm_yanchifukuan_sq`
-- 

INSERT INTO `crm_yanchifukuan_sq` (`���`, `����`, `������`, `��������`, `��������`, `�ɽ�����`, `�ͻ�����`, `�ɽ���Ϣ`, `Ӧ�ս��`, `ʵ�ս��`, `Ӧ������`, `��ŵ����`, `ʵ������`, `����ԭ��`, `¼��Ա`, `�Ƿ����`, `�������`, `�Ƿ�����`, `��ע`, `������`, `����ʱ��`) VALUES 
(1, '1010', 'С��', '2011-05-11 00:00:00', 'AAAAA', '2011-05-05 00:00:00', '��ʯ��', '����δ���', '100000', '0.0', '2011-05-06 00:00:00', '2011-05-11 00:00:00', '2011-05-11 00:00:00', '2011-05-11', 'С��', '1', '2011-05-05 00:00:00', '0', '', 'admin', '2011-05-11 15:57:21');


-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 12 �� 14:56
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_suoshufenlei_sq`
-- 

CREATE TABLE `crm_suoshufenlei_sq` (
  `���` int(11) NOT NULL auto_increment,
  `��������` varchar(200) NOT NULL,
  `��ע` varchar(255) NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='���������' AUTO_INCREMENT=4 ;

-- 
-- �������е����� `crm_suoshufenlei_sq`
-- 

INSERT INTO `crm_suoshufenlei_sq` (`���`, `��������`, `��ע`) VALUES 
(1, 'AAAAA', ''),
(2, 'BBBBB', ''),
(3, '', '');


-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 13 �� 09:42
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_baoxiao_sq`
-- 

CREATE TABLE `crm_baoxiao_sq` (
  `���` int(11) NOT NULL auto_increment,
  `����` varchar(200) NOT NULL,
  `������` varchar(200) NOT NULL,
  `����ʱ��` datetime NOT NULL,
  `����ԭ��` text NOT NULL,
  `��Ӧ�ͻ�` varchar(200) NOT NULL,
  `�������` varchar(200) NOT NULL,
  `������` varchar(200) NOT NULL,
  `¼��Ա` varchar(200) NOT NULL,
  `�Ƿ���` varchar(200) NOT NULL,
  `����ʱ��` datetime NOT NULL,
  `�Ƿ�����` varchar(200) NOT NULL,
  `����ʱ��` datetime NOT NULL,
  `��ע` text NOT NULL,
  `������` varchar(200) NOT NULL,
  `����ʱ��` datetime NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='���ñ�����' AUTO_INCREMENT=3 ;

-- 
-- �������е����� `crm_baoxiao_sq`
-- 

INSERT INTO `crm_baoxiao_sq` (`���`, `����`, `������`, `����ʱ��`, `����ԭ��`, `��Ӧ�ͻ�`, `�������`, `������`, `¼��Ա`, `�Ƿ���`, `����ʱ��`, `�Ƿ�����`, `����ʱ��`, `��ע`, `������`, `����ʱ��`) VALUES 
(1, '100001', 'ϵͳ����Ա', '2011-05-13 00:00:00', '����ס��', '��ʯ��', '1000', 'ϵͳ����Ա', 'ϵͳ����Ա', '1', '2011-05-13 00:00:00', '0', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 09:40:45'),
(2, '100002', 'ϵͳ����Ա', '2011-05-13 00:00:00', '���λ��', '֣�ݵ���Ƽ�������޹�˾', '2000', 'ϵͳ����Ա', 'ϵͳ����Ա', '1', '2011-05-13 00:00:00', '0', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 09:41:43');


-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 13 �� 11:23
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_jiaban_sq`
-- 

CREATE TABLE `crm_jiaban_sq` (
  `���` int(11) NOT NULL auto_increment,
  `����` varchar(200) NOT NULL,
  `������` varchar(200) NOT NULL,
  `��������` datetime NOT NULL,
  `�Ӱ�ص�` text NOT NULL,
  `�Ӱ�ԭ��` varchar(255) NOT NULL,
  `��ʼʱ��` datetime NOT NULL,
  `����ʱ��` datetime NOT NULL,
  `¼��Ա` varchar(200) NOT NULL,
  `�Ƿ����` varchar(200) NOT NULL,
  `�������` varchar(200) NOT NULL,
  `�������` datetime NOT NULL,
  `������` text NOT NULL,
  `�Ƿ�����` varchar(200) NOT NULL,
  `��������` datetime NOT NULL,
  `��ע` text NOT NULL,
  `������` varchar(200) NOT NULL,
  `����ʱ��` datetime NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='�Ӱ������' AUTO_INCREMENT=4 ;

-- 
-- �������е����� `crm_jiaban_sq`
-- 

INSERT INTO `crm_jiaban_sq` (`���`, `����`, `������`, `��������`, `�Ӱ�ص�`, `�Ӱ�ԭ��`, `��ʼʱ��`, `����ʱ��`, `¼��Ա`, `�Ƿ����`, `�������`, `�������`, `������`, `�Ƿ�����`, `��������`, `��ע`, `������`, `����ʱ��`) VALUES 
(1, '100001', 'ϵͳ����Ա', '2011-05-13 00:00:00', '��˾�ڲ�', '����δ���', '2011-05-13 00:00:00', '2011-05-14 00:00:00', 'ϵͳ����Ա', '1', 'ϵͳ����Ա', '2011-05-13 00:00:00', '��׼�Ӱ�', '0', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 11:13:19'),
(2, '100002', 'ϵͳ����Ա', '2011-05-13 00:00:00', '�칫��', '������', '2011-05-13 00:00:00', '2011-05-14 00:00:00', 'ϵͳ����Ա', '', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 11:01:12'),
(3, '100003', 'ϵͳ����Ա', '2011-05-13 00:00:00', '�ܾ���', 'ҵ����ϵ', '2011-05-13 00:00:00', '2011-05-14 00:00:00', 'ϵͳ����Ա', '', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 11:08:57');

-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- ����: 192.168.0.12:3336
-- ��������: 2011 �� 05 �� 13 �� 11:48
-- �������汾: 5.0.76
-- PHP �汾: 5.2.10
-- 
-- ���ݿ�: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- ��Ľṹ `crm_qingjia_sq`
-- 

CREATE TABLE `crm_qingjia_sq` (
  `���` int(11) NOT NULL auto_increment,
  `����` varchar(200) NOT NULL,
  `������` varchar(200) NOT NULL,
  `��������` datetime NOT NULL,
  `�������` varchar(255) NOT NULL,
  `��ʼʱ��` datetime NOT NULL,
  `����ʱ��` datetime NOT NULL,
  `¼��Ա` varchar(200) NOT NULL,
  `�Ƿ����` varchar(200) NOT NULL,
  `�������` varchar(200) NOT NULL,
  `������` varchar(255) NOT NULL,
  `�������` datetime NOT NULL,
  `�Ƿ�����` varchar(200) NOT NULL,
  `��������` datetime NOT NULL,
  `��ע` varchar(255) NOT NULL,
  `������` varchar(200) NOT NULL,
  `����ʱ��` datetime NOT NULL,
  PRIMARY KEY  (`���`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='��������' AUTO_INCREMENT=4 ;

-- 
-- �������е����� `crm_qingjia_sq`
-- 

INSERT INTO `crm_qingjia_sq` (`���`, `����`, `������`, `��������`, `�������`, `��ʼʱ��`, `����ʱ��`, `¼��Ա`, `�Ƿ����`, `�������`, `������`, `�������`, `�Ƿ�����`, `��������`, `��ע`, `������`, `����ʱ��`) VALUES 
(1, '100001', 'ϵͳ����Ա', '2011-05-13 00:00:00', '��������', '2011-05-13 00:00:00', '2011-05-14 00:00:00', 'ϵͳ����Ա', '1', 'ϵͳ����Ա', '��׼���', '2011-05-13 00:00:00', '1', '2011-05-14 00:00:00', '', 'admin', '2011-05-13 11:47:55'),
(2, '100002', 'ϵͳ����Ա', '2011-05-13 00:00:00', '����', '2011-05-13 00:00:00', '2011-05-14 00:00:00', 'ϵͳ����Ա', '1', 'ϵͳ����Ա', '��׼��٣�', '2011-05-13 00:00:00', '0', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 11:47:13'),
(3, '100003', 'ϵͳ����Ա', '2011-05-13 00:00:00', '�ؼҴ�����', '2011-05-13 00:00:00', '2011-05-15 00:00:00', 'ϵͳ����Ա', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 11:46:43');

