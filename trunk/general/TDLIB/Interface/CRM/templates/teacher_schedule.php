<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><strong><font color="#000000"><?php echo $TeacherName; ?>
��ʦ�α�</font></strong></td>
    <td><div align="right"><strong><font color="#000000">http://<?php echo $Website; ?>
</font></strong></div></td>
  </tr>
</table>

<hr width="100%" height="1" align="$align" color="#000000">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right"><font color="#000000">����ʱ��:<?php echo $UpdateDate; ?>
</font>���� 
        <input type="button" value="��ӡ" class="SmallButton" onclick="execCommand('Print');" title="��ӡ��ҳ">��<input type="button" value="�ر�" class="SmallButton" onclick="window.close();" title="�رձ�ҳ">
      </div></td>
  </tr>
</table>
<br>
<table border="1" cellspacing="0" class="TableBlock" bordercolor="#000000" cellpadding="3" align="center" width="720" style="border-collapse:collapse">
  <tr align="center"> 
    <td nowrap colspan="2" rowspan="1"><div align=center>ʱ��</div></td>
    <td nowrap colspan="1" width=100><div align="center">��һ</div></td>
    <td nowrap colspan="1" width=100><div align="center">�ܶ�</div></td>
    <td nowrap colspan="1" width=100><div align="center">����</div></td>
    <td nowrap colspan="1" width=100><div align="center">����</div></td>
    <td nowrap colspan="1" width=100><div align="center">����</div></td>
    <?php if ($IS6 == '1'): ?><td nowrap colspan="1" width=100><div align="center" >����</div></td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap colspan="1" width=100><div align="center" >����</div></td><?php endif; ?>
  </tr>
<?php if ($ISZAOSHANG == '1'): ?>
<tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>����</div></font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['0']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['0']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['0']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['0']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['0']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['0']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['0']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['0']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['0']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['0']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['0']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['0']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['0']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['0']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['0']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['0']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['0']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['0']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['0']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['0']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['0']; ?>
</td><?php endif; ?>
  </tr>


<tr> 
    <td nowrap rowspan="1" height=3 Colspan="9">&nbsp; </td>
</tr>
<?php endif; ?>


<tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>��1��</div></font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['1']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['1']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['1']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['1']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['1']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['1']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['1']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['1']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['1']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['1']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['1']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['1']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['1']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['1']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['1']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['1']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['1']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['1']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['1']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['1']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['1']; ?>
</td><?php endif; ?>
  </tr>




<? if(MergeArray
  <tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>��2��</font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['2']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['2']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['2']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['2']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['2']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['2']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['2']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['2']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['2']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['2']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['2']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['2']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['2']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['2']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['2']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['2']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['2']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['2']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['2']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['2']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['2']; ?>
</td><?php endif; ?>
  </tr>

  <tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>��3��</div></font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['3']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['3']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['3']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['3']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['3']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['3']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['3']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['3']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['3']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['3']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['3']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['3']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['3']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['3']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['3']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['3']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['3']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['3']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['3']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['3']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['3']; ?>
</td><?php endif; ?>
  </tr>

  <tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>��4��</div></font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['4']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['4']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['4']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['4']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['4']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['4']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['4']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['4']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['4']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['4']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['4']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['4']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['4']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['4']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['4']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['4']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['4']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['4']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['4']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['4']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['4']; ?>
</td><?php endif; ?>
  </tr>

<tr> 
    <td nowrap rowspan="1" height=3 Colspan="9">&nbsp; </td>
</tr>

  <tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>��5��</div></font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['5']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['5']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['5']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['5']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['5']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['5']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['5']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['5']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['5']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['5']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['5']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['5']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['5']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['5']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['5']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['5']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['5']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['5']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['5']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['5']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['5']; ?>
</td><?php endif; ?>
  </tr>
  <tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>��6��</div></font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['6']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['6']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['6']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['6']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['6']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['6']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['6']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['6']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['6']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['6']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['6']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['6']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['6']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['6']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['6']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['6']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['6']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['6']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['6']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['6']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['6']; ?>
</td><?php endif; ?>
  </tr>
  <tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>��7��</div></font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['7']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['7']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['7']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['7']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['7']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['7']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['7']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['7']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['7']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['7']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['7']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['7']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['7']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['7']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['7']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['7']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['7']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['7']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['7']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['7']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['7']; ?>
</td><?php endif; ?>
  </tr>
  <tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>��8��</div></font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['8']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['8']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['8']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['8']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['8']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['8']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['8']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['8']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['8']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['8']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['8']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['8']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['8']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['8']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['8']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['8']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['8']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['8']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['8']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['8']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['8']; ?>
</td><?php endif; ?>
  </tr>

<?php if ($ISWANSHANG == '1'): ?>
<tr> 
    <td nowrap rowspan="1" height=3 Colspan="9">&nbsp; </td>
</tr>
  <tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>����1</div><br><div align=center></div></font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['9']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['9']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['9']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['9']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['9']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['9']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['9']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['9']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['9']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['9']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['9']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['9']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['9']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['9']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['9']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['9']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['9']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['9']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['9']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['9']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['9']; ?>
</td><?php endif; ?>
  </tr>
  <tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>����2</div><br><div align=center></div></font></td>
    <td nowrap width="54">�γ�</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['1']['10']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['2']['10']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['3']['10']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['4']['10']; ?>
</td>
    <td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['5']['10']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['6']['10']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor="#ffccff" class=td1 ><?php echo $classtablename['7']['10']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td>�༶</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['1']['10']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['2']['10']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['3']['10']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['4']['10']; ?>
</td>
    <td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['5']['10']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['6']['10']; ?>
</td><?php endif; ?>
    <?php if ($IS6 == '1'): ?><td nowrap bgcolor="#CCFFCC" ><?php echo $banjiname['7']['10']; ?>
</td><?php endif; ?>
  </tr>
<tr>
    <td nowrap width=60>����</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['1']['10']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['2']['10']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['3']['10']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['4']['10']; ?>
</td>
    <td nowrap bgcolor=#ffffCC><?php echo $classroomname['5']['10']; ?>
</td>

    <?php if ($IS6 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['6']['10']; ?>
</td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap bgcolor=#ffffCC><?php echo $classroomname['7']['10']; ?>
</td><?php endif; ?>
  </tr>
<?php endif; ?>
</table><?
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