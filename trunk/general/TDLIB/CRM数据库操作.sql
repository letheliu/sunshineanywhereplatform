-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 12 日 14:33
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_piaoju_type`
-- 

CREATE TABLE `crm_piaoju_type` (
  `编号` int(11) NOT NULL auto_increment,
  `票据类型` varchar(200) NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='票据类型表' AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `crm_piaoju_type`
-- 

INSERT INTO `crm_piaoju_type` (`编号`, `票据类型`) VALUES 
(1, '增值'),
(2, '收据');

-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 12 日 14:34
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_feiyong_sq`
-- 

CREATE TABLE `crm_feiyong_sq` (
  `编号` int(11) NOT NULL auto_increment,
  `单号` varchar(255) NOT NULL,
  `费用类型` varchar(255) NOT NULL,
  `金额` varchar(255) NOT NULL,
  `费用用途` text NOT NULL,
  `申请日期` datetime NOT NULL,
  `客户姓名` varchar(255) NOT NULL,
  `报销人` varchar(255) NOT NULL,
  `录单员` varchar(255) NOT NULL,
  `是否审核` varchar(255) NOT NULL,
  `审核日期` datetime NOT NULL,
  `是否作废` varchar(255) NOT NULL,
  `作废日期` datetime NOT NULL,
  `备注` text NOT NULL,
  `创建人` varchar(255) NOT NULL,
  `创建时间` datetime NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='费用申请表' AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `crm_feiyong_sq`
-- 

INSERT INTO `crm_feiyong_sq` (`编号`, `单号`, `费用类型`, `金额`, `费用用途`, `申请日期`, `客户姓名`, `报销人`, `录单员`, `是否审核`, `审核日期`, `是否作废`, `作废日期`, `备注`, `创建人`, `创建时间`) VALUES 
(1, '0002152', '招待费用', '5000', '客服考察招待', '2011-05-11 00:00:00', '中石化', '小范', '小王', '1', '2011-05-04 00:00:00', '0', '0000-00-00 00:00:00', '', 'admin', '2011-05-11 16:24:33'),
(2, '102153', '出差车费', '500', '出公差车费', '2011-05-12 00:00:00', '中石化', '系统管理员', '系统管理员', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-12 10:21:06'),
(3, '102154', '交通', '200', '车费', '2011-05-12 00:00:00', '郑州单点科技软件有限公司', '系统管理员', '系统管理员', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-12 14:25:02');

-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 12 日 14:35
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_kaipiao_sq`
-- 

CREATE TABLE `crm_kaipiao_sq` (
  `编号` int(11) NOT NULL auto_increment,
  `单号` varchar(255) NOT NULL,
  `申请人` varchar(255) NOT NULL,
  `申请日期` date NOT NULL,
  `票据类型` varchar(255) NOT NULL,
  `业务类型` varchar(255) NOT NULL,
  `开票公司` varchar(255) NOT NULL,
  `客户公司` varchar(255) NOT NULL,
  `票据内容` varchar(255) NOT NULL,
  `票据金额` varchar(255) NOT NULL,
  `录单员` varchar(255) NOT NULL,
  `是否审核` varchar(255) NOT NULL,
  `是否作废` varchar(255) NOT NULL,
  `备注` text NOT NULL,
  `创建人` varchar(255) NOT NULL,
  `创建时间` date NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='开票申请表' AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `crm_kaipiao_sq`
-- 

INSERT INTO `crm_kaipiao_sq` (`编号`, `单号`, `申请人`, `申请日期`, `票据类型`, `业务类型`, `开票公司`, `客户公司`, `票据内容`, `票据金额`, `录单员`, `是否审核`, `是否作废`, `备注`, `创建人`, `创建时间`) VALUES 
(1, '001', '小凡', '2011-05-11', '增值', '销售', '单点科技软件', '通达中部', '啊啊啊啊啊啊啊啊啊啊', '100000', '小王', '1', '0', '', 'admin', '2011-05-12'),
(2, '0002', '小凡', '2011-05-11', '收据', '办公支出', '单点科技软件', '通达中部', '营业增值税发票', '2000', '小王', '1', '0', '', 'admin', '2011-05-12'),
(3, '100002', '系统管理员', '2011-05-12', '增值', '销售', '单点科技软件', '中石油', '销售增值发票开具', '11000', '系统管理员', '', '', '', 'admin', '2011-05-12'),
(4, '100003', '系统管理员', '2011-05-12', '增值', '办公支出', '单点科技软件', '中石油', '大幅度发', '2000', '系统管理员', '', '', '', 'admin', '2011-05-12');


-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 12 日 14:35
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_qita_sq`
-- 

CREATE TABLE `crm_qita_sq` (
  `编号` int(11) NOT NULL auto_increment,
  `单号` varchar(255) NOT NULL,
  `申请人` varchar(255) NOT NULL,
  `申请日期` datetime NOT NULL,
  `申请事项` varchar(255) NOT NULL,
  `录单员` varchar(255) NOT NULL,
  `是否审核` varchar(255) NOT NULL,
  `审核日期` datetime NOT NULL,
  `是否作废` varchar(255) NOT NULL,
  `作废日期` datetime NOT NULL,
  `备注` text NOT NULL,
  `创建人` varchar(255) NOT NULL,
  `创建时间` datetime NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='其他申请表' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `crm_qita_sq`
-- 

INSERT INTO `crm_qita_sq` (`编号`, `单号`, `申请人`, `申请日期`, `申请事项`, `录单员`, `是否审核`, `审核日期`, `是否作废`, `作废日期`, `备注`, `创建人`, `创建时间`) VALUES 
(1, '0210515', '小范', '2011-05-11 00:00:00', '请客吃饭', '小王', '1', '2011-05-14 00:00:00', '0', '0000-00-00 00:00:00', '.....', 'admin', '2011-05-11 16:40:37'),
(2, '00255', '系统管理员', '2011-05-11 00:00:00', '申请公车费', '系统管理员', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-11 17:23:00');

-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 12 日 14:36
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_yewu_type`
-- 

CREATE TABLE `crm_yewu_type` (
  `编号` int(11) NOT NULL auto_increment,
  `业务类型` varchar(200) NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='业务类型表' AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `crm_yewu_type`
-- 

INSERT INTO `crm_yewu_type` (`编号`, `业务类型`) VALUES 
(1, '销售'),
(2, '办公支出'),
(3, '');


-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 12 日 14:37
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_yongjin_sq`
-- 

CREATE TABLE `crm_yongjin_sq` (
  `编号` int(11) NOT NULL auto_increment,
  `单号` varchar(255) NOT NULL,
  `合同编号` varchar(255) NOT NULL,
  `申请人` varchar(255) NOT NULL,
  `申请日期` varchar(255) NOT NULL,
  `所属分类` varchar(255) NOT NULL,
  `经办人` varchar(255) NOT NULL,
  `银行账号` varchar(255) NOT NULL,
  `付款金额` varchar(255) NOT NULL,
  `付款明细` text NOT NULL,
  `客户名称` varchar(255) NOT NULL,
  `录单员` varchar(255) NOT NULL,
  `是否审核` varchar(255) NOT NULL,
  `是否作废` varchar(255) NOT NULL,
  `备注` text NOT NULL,
  `创建人` varchar(255) NOT NULL,
  `创建时间` datetime NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='佣金申请表' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `crm_yongjin_sq`
-- 

INSERT INTO `crm_yongjin_sq` (`编号`, `单号`, `合同编号`, `申请人`, `申请日期`, `所属分类`, `经办人`, `银行账号`, `付款金额`, `付款明细`, `客户名称`, `录单员`, `是否审核`, `是否作废`, `备注`, `创建人`, `创建时间`) VALUES 
(1, '0001', '0020202', '小凡', '2011-05-11', 'AAAAA', '小王', '620000145210454', '500000', '出差补助', '小张', '小王', '1', '0', '', 'admin', '2011-05-11 14:48:32'),
(2, '0021', 'AAA', 'AA', '2011-05-11', 'AAAAA', '小王', '620000145210454', '500000', 'AAA', '小张', 'AA', '', '', '', 'admin', '2011-05-11 17:15:57');

-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 12 日 14:39
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_yanchifukuan_sq`
-- 

CREATE TABLE `crm_yanchifukuan_sq` (
  `编号` int(11) NOT NULL auto_increment,
  `单号` varchar(255) NOT NULL,
  `申请人` varchar(255) NOT NULL,
  `申请日期` datetime NOT NULL,
  `所属分类` varchar(255) NOT NULL,
  `成交日期` datetime NOT NULL,
  `客户名称` varchar(255) NOT NULL,
  `成交信息` varchar(255) NOT NULL,
  `应收金额` varchar(255) NOT NULL,
  `实收金额` varchar(255) NOT NULL,
  `应收日期` datetime NOT NULL,
  `承诺日期` datetime NOT NULL,
  `实付日期` datetime NOT NULL,
  `延误原因` varchar(255) NOT NULL,
  `录单员` varchar(255) NOT NULL,
  `是否审核` varchar(255) NOT NULL,
  `审核日期` datetime NOT NULL,
  `是否作废` varchar(255) NOT NULL,
  `备注` text NOT NULL,
  `创建人` varchar(255) NOT NULL,
  `创建时间` datetime NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='延迟付款表' AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `crm_yanchifukuan_sq`
-- 

INSERT INTO `crm_yanchifukuan_sq` (`编号`, `单号`, `申请人`, `申请日期`, `所属分类`, `成交日期`, `客户名称`, `成交信息`, `应收金额`, `实收金额`, `应收日期`, `承诺日期`, `实付日期`, `延误原因`, `录单员`, `是否审核`, `审核日期`, `是否作废`, `备注`, `创建人`, `创建时间`) VALUES 
(1, '1010', '小凡', '2011-05-11 00:00:00', 'AAAAA', '2011-05-05 00:00:00', '中石化', '交易未完成', '100000', '0.0', '2011-05-06 00:00:00', '2011-05-11 00:00:00', '2011-05-11 00:00:00', '2011-05-11', '小王', '1', '2011-05-05 00:00:00', '0', '', 'admin', '2011-05-11 15:57:21');


-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 12 日 14:56
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_suoshufenlei_sq`
-- 

CREATE TABLE `crm_suoshufenlei_sq` (
  `编号` int(11) NOT NULL auto_increment,
  `所属分类` varchar(200) NOT NULL,
  `备注` varchar(255) NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='所属分类表' AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `crm_suoshufenlei_sq`
-- 

INSERT INTO `crm_suoshufenlei_sq` (`编号`, `所属分类`, `备注`) VALUES 
(1, 'AAAAA', ''),
(2, 'BBBBB', ''),
(3, '', '');


-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 13 日 09:42
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_baoxiao_sq`
-- 

CREATE TABLE `crm_baoxiao_sq` (
  `编号` int(11) NOT NULL auto_increment,
  `单号` varchar(200) NOT NULL,
  `申请人` varchar(200) NOT NULL,
  `申请时间` datetime NOT NULL,
  `报销原因` text NOT NULL,
  `对应客户` varchar(200) NOT NULL,
  `报销金额` varchar(200) NOT NULL,
  `报销人` varchar(200) NOT NULL,
  `录单员` varchar(200) NOT NULL,
  `是否报销` varchar(200) NOT NULL,
  `报销时间` datetime NOT NULL,
  `是否作废` varchar(200) NOT NULL,
  `作废时间` datetime NOT NULL,
  `备注` text NOT NULL,
  `创建人` varchar(200) NOT NULL,
  `创建时间` datetime NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='费用报销表' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `crm_baoxiao_sq`
-- 

INSERT INTO `crm_baoxiao_sq` (`编号`, `单号`, `申请人`, `申请时间`, `报销原因`, `对应客户`, `报销金额`, `报销人`, `录单员`, `是否报销`, `报销时间`, `是否作废`, `作废时间`, `备注`, `创建人`, `创建时间`) VALUES 
(1, '100001', '系统管理员', '2011-05-13 00:00:00', '出差住宿', '中石化', '1000', '系统管理员', '系统管理员', '1', '2011-05-13 00:00:00', '0', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 09:40:45'),
(2, '100002', '系统管理员', '2011-05-13 00:00:00', '出差车位费', '郑州单点科技软件有限公司', '2000', '系统管理员', '系统管理员', '1', '2011-05-13 00:00:00', '0', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 09:41:43');


-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 13 日 11:23
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_jiaban_sq`
-- 

CREATE TABLE `crm_jiaban_sq` (
  `编号` int(11) NOT NULL auto_increment,
  `单号` varchar(200) NOT NULL,
  `申请人` varchar(200) NOT NULL,
  `申请日期` datetime NOT NULL,
  `加班地点` text NOT NULL,
  `加班原因` varchar(255) NOT NULL,
  `开始时间` datetime NOT NULL,
  `结束时间` datetime NOT NULL,
  `录单员` varchar(200) NOT NULL,
  `是否审核` varchar(200) NOT NULL,
  `审核主管` varchar(200) NOT NULL,
  `审核日期` datetime NOT NULL,
  `审核意见` text NOT NULL,
  `是否作废` varchar(200) NOT NULL,
  `作废日期` datetime NOT NULL,
  `备注` text NOT NULL,
  `创建人` varchar(200) NOT NULL,
  `创建时间` datetime NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='加班申请表' AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `crm_jiaban_sq`
-- 

INSERT INTO `crm_jiaban_sq` (`编号`, `单号`, `申请人`, `申请日期`, `加班地点`, `加班原因`, `开始时间`, `结束时间`, `录单员`, `是否审核`, `审核主管`, `审核日期`, `审核意见`, `是否作废`, `作废日期`, `备注`, `创建人`, `创建时间`) VALUES 
(1, '100001', '系统管理员', '2011-05-13 00:00:00', '公司内部', '任务未完成', '2011-05-13 00:00:00', '2011-05-14 00:00:00', '系统管理员', '1', '系统管理员', '2011-05-13 00:00:00', '批准加班', '0', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 11:13:19'),
(2, '100002', '系统管理员', '2011-05-13 00:00:00', '办公室', '任务繁重', '2011-05-13 00:00:00', '2011-05-14 00:00:00', '系统管理员', '', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 11:01:12'),
(3, '100003', '系统管理员', '2011-05-13 00:00:00', '总经办', '业务联系', '2011-05-13 00:00:00', '2011-05-14 00:00:00', '系统管理员', '', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 11:08:57');

-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- 主机: 192.168.0.12:3336
-- 生成日期: 2011 年 05 月 13 日 11:48
-- 服务器版本: 5.0.76
-- PHP 版本: 5.2.10
-- 
-- 数据库: `td_crm`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `crm_qingjia_sq`
-- 

CREATE TABLE `crm_qingjia_sq` (
  `编号` int(11) NOT NULL auto_increment,
  `单号` varchar(200) NOT NULL,
  `申请人` varchar(200) NOT NULL,
  `申请日期` datetime NOT NULL,
  `请假事由` varchar(255) NOT NULL,
  `开始时间` datetime NOT NULL,
  `结束时间` datetime NOT NULL,
  `录单员` varchar(200) NOT NULL,
  `是否审核` varchar(200) NOT NULL,
  `审核主管` varchar(200) NOT NULL,
  `审核意见` varchar(255) NOT NULL,
  `审核日期` datetime NOT NULL,
  `是否作废` varchar(200) NOT NULL,
  `作废日期` datetime NOT NULL,
  `备注` varchar(255) NOT NULL,
  `创建人` varchar(200) NOT NULL,
  `创建时间` datetime NOT NULL,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='请假申请表' AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `crm_qingjia_sq`
-- 

INSERT INTO `crm_qingjia_sq` (`编号`, `单号`, `申请人`, `申请日期`, `请假事由`, `开始时间`, `结束时间`, `录单员`, `是否审核`, `审核主管`, `审核意见`, `审核日期`, `是否作废`, `作废日期`, `备注`, `创建人`, `创建时间`) VALUES 
(1, '100001', '系统管理员', '2011-05-13 00:00:00', '生病疗养', '2011-05-13 00:00:00', '2011-05-14 00:00:00', '系统管理员', '1', '系统管理员', '批准请假', '2011-05-13 00:00:00', '1', '2011-05-14 00:00:00', '', 'admin', '2011-05-13 11:47:55'),
(2, '100002', '系统管理员', '2011-05-13 00:00:00', '旅游', '2011-05-13 00:00:00', '2011-05-14 00:00:00', '系统管理员', '1', '系统管理员', '比准请假！', '2011-05-13 00:00:00', '0', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 11:47:13'),
(3, '100003', '系统管理员', '2011-05-13 00:00:00', '回家带孩子', '2011-05-13 00:00:00', '2011-05-15 00:00:00', '系统管理员', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'admin', '2011-05-13 11:46:43');

