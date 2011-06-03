<?php

echo "<!--=============== Google在线翻译 =====================-->\r\n";
$module_func_id = "";
$module_desc = "Google在线翻译";
$module_body = $module_op = "";
$module_body .= "<script type=\"text/javascript\" src=\"http://www.google.com/jsapi\"></script>
                <script type=\"text/javascript\">
                 google.load(\"language\", \"1\");
                 function trans()
                 {
                   var pair = document.getElementById(\"langpair\").value.split(\"|\");
                   if(pair.length != 2)
                   {
	                  alert(\"error\");
                      return;
                   }
                   var text = document.getElementById(\"text\").value;
                   google.language.detect(text, function(result)
	                                            {
												   if (!result.error && result.language)
												   {
													  google.language.translate(text, result.language, pair[1],function(result)
												                                                               {
													                                                              var translated = document.getElementById(\"translation\");
												                                                                  if (result.translation){
													                                                                 translated.innerHTML = result.translation;
												                                                                   }
												                                                                });
												   }
												 });
				}
				 </script>
				 <select name=\"langpair\" id=\"langpair\" class=\"SmallSelect\">
					 <option value=\"en|zh-TW\">英语到中文(繁体)</option>
					 <option value=\"en|zh-CN\" selected>英语到中文(简体)</option>
					 <option value=\"zh|en\" class=\"line-above\">中文到英语</option>
					 <option value=\"zh-TW|zh-CN\">中文(繁体到简体)</option>
					 <option value=\"zh-CN|zh-TW\">中文(简体到繁体)</option>
					 <option value=\"ar|en\">阿拉伯文到英语</option>
					 <option value=\"ko|en\">朝鲜语到英语</option>
					 <option value=\"de|fr\" class=\"line-above\">德语到法语</option>
					 <option value=\"de|en\">德语到英语</option>
					 <option value=\"ru|en\" class=\"line-above\">俄语到英语</option>
					 <option value=\"fr|de\" class=\"line-above\">法语到德语</option>
					 <option value=\"fr|en\">法语到英语</option>
					 <option value=\"nl|en\" class=\"line-above\">荷兰语到英语</option>
					 <option value=\"pt|en\">葡萄牙语到英语</option>
					 <option value=\"ja|en\">日语到英语</option>
					 <option value=\"es|en\">西班牙语到英语</option>
					 <option value=\"el|en\">希腊语到英语</option>
					 <option value=\"it|en\">意大利语到英语</option>
					 <option value=\"en|ar\" class=\"line-above\">英语到阿拉伯文</option>
					 <option value=\"en|ko\">英语到朝鲜语</option>
					 <option value=\"en|de\">英语到德语</option>
					 <option value=\"en|ru\">英语到俄语</option>
					 <option value=\"en|fr\">英语到法语</option>
					 <option value=\"en|nl\">英语到荷兰语</option>
					 <option value=\"en|pt\">英语到葡萄牙语</option>
					 <option value=\"en|ja\">英语到日语</option>
					 <option value=\"en|es\">英语到西班牙语</option>
					 <option value=\"en|el\">英语到希腊语</option>
					 <option value=\"en|it\">英语到意大利语</option>
				 </select>
				 <input type=\"button\" calss=\"SmallButton\" style=\"display:inline;\" value=\"翻译\" onClick=\"trans();\"></input>
				 <textarea id=\"text\" class=\"SmallInput\" style=\"width:98%;height:".floor( ( $SHOW_COUNT * 20 - 40 ) / 2 )."px;background:#ffffcc;\">
				 </textarea>
				 <textarea id=\"translation\" class=\"SmallInput\" style=\"width:98%;height:".floor( ( $SHOW_COUNT * 20 - 40 ) / 2 )."px;background:#ffffcc;\">
				 </textarea>";
?>

<?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前已经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>