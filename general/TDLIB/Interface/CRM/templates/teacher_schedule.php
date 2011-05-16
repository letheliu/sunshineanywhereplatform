<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><strong><font color="#000000"><?php echo $TeacherName; ?>
教师课表</font></strong></td>
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
    <td><div align="right"><font color="#000000">更新时间:<?php echo $UpdateDate; ?>
</font>　　 
        <input type="button" value="打印" class="SmallButton" onclick="execCommand('Print');" title="打印本页">　<input type="button" value="关闭" class="SmallButton" onclick="window.close();" title="关闭本页">
      </div></td>
  </tr>
</table>
<br>
<table border="1" cellspacing="0" class="TableBlock" bordercolor="#000000" cellpadding="3" align="center" width="720" style="border-collapse:collapse">
  <tr align="center"> 
    <td nowrap colspan="2" rowspan="1"><div align=center>时间</div></td>
    <td nowrap colspan="1" width=100><div align="center">周一</div></td>
    <td nowrap colspan="1" width=100><div align="center">周二</div></td>
    <td nowrap colspan="1" width=100><div align="center">周三</div></td>
    <td nowrap colspan="1" width=100><div align="center">周四</div></td>
    <td nowrap colspan="1" width=100><div align="center">周五</div></td>
    <?php if ($IS6 == '1'): ?><td nowrap colspan="1" width=100><div align="center" >周六</div></td><?php endif; ?>
    <?php if ($IS7 == '1'): ?><td nowrap colspan="1" width=100><div align="center" >周日</div></td><?php endif; ?>
  </tr>
<?php if ($ISZAOSHANG == '1'): ?>
<tr> 
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>早上</div></font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>第1节</div></font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>第2节</font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>第3节</div></font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>第4节</div></font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>第5节</div></font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>第6节</div></font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>第7节</div></font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>第8节</div></font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>晚上1</div><br><div align=center></div></font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
    <td nowrap width="90" rowspan="3"><font color=blue style="font-size:9pt"><div align=center>晚上2</div><br><div align=center></div></font></td>
    <td nowrap width="54">课程</td>
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
    <td>班级</td>
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
    <td nowrap width=60>教室</td>
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
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前已经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>