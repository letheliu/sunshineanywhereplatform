<?php

echo "<!--=============== Google���߷��� =====================-->\r\n";
$module_func_id = "";
$module_desc = "Google���߷���";
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
					 <option value=\"en|zh-TW\">Ӣ�ﵽ����(����)</option>
					 <option value=\"en|zh-CN\" selected>Ӣ�ﵽ����(����)</option>
					 <option value=\"zh|en\" class=\"line-above\">���ĵ�Ӣ��</option>
					 <option value=\"zh-TW|zh-CN\">����(���嵽����)</option>
					 <option value=\"zh-CN|zh-TW\">����(���嵽����)</option>
					 <option value=\"ar|en\">�������ĵ�Ӣ��</option>
					 <option value=\"ko|en\">�����ﵽӢ��</option>
					 <option value=\"de|fr\" class=\"line-above\">���ﵽ����</option>
					 <option value=\"de|en\">���ﵽӢ��</option>
					 <option value=\"ru|en\" class=\"line-above\">���ﵽӢ��</option>
					 <option value=\"fr|de\" class=\"line-above\">���ﵽ����</option>
					 <option value=\"fr|en\">���ﵽӢ��</option>
					 <option value=\"nl|en\" class=\"line-above\">�����ﵽӢ��</option>
					 <option value=\"pt|en\">�������ﵽӢ��</option>
					 <option value=\"ja|en\">���ﵽӢ��</option>
					 <option value=\"es|en\">�������ﵽӢ��</option>
					 <option value=\"el|en\">ϣ���ﵽӢ��</option>
					 <option value=\"it|en\">������ﵽӢ��</option>
					 <option value=\"en|ar\" class=\"line-above\">Ӣ�ﵽ��������</option>
					 <option value=\"en|ko\">Ӣ�ﵽ������</option>
					 <option value=\"en|de\">Ӣ�ﵽ����</option>
					 <option value=\"en|ru\">Ӣ�ﵽ����</option>
					 <option value=\"en|fr\">Ӣ�ﵽ����</option>
					 <option value=\"en|nl\">Ӣ�ﵽ������</option>
					 <option value=\"en|pt\">Ӣ�ﵽ��������</option>
					 <option value=\"en|ja\">Ӣ�ﵽ����</option>
					 <option value=\"en|es\">Ӣ�ﵽ��������</option>
					 <option value=\"en|el\">Ӣ�ﵽϣ����</option>
					 <option value=\"en|it\">Ӣ�ﵽ�������</option>
				 </select>
				 <input type=\"button\" calss=\"SmallButton\" style=\"display:inline;\" value=\"����\" onClick=\"trans();\"></input>
				 <textarea id=\"text\" class=\"SmallInput\" style=\"width:98%;height:".floor( ( $SHOW_COUNT * 20 - 40 ) / 2 )."px;background:#ffffcc;\">
				 </textarea>
				 <textarea id=\"translation\" class=\"SmallInput\" style=\"width:98%;height:".floor( ( $SHOW_COUNT * 20 - 40 ) / 2 )."px;background:#ffffcc;\">
				 </textarea>";
?>

<?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�Ѿ��ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>