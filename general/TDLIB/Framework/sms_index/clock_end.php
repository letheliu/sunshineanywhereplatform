<?
GLOBAL $HTTP_SESSION_VARS;
include('../adodb/adodb.inc.php');
include('../adodb/adodb-session.php');
adodb_sess_open(false,false,false);
session_start();
$key=returnSessKey();
$sndg_community=$HTTP_SESSION_VARS[sndg_community];
$sess_val=adodb_sess_read($key) ;
if(!session_is_registered("sndg_community"))	{
echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=error/notlogin.php'>";
}
require_once('../config.inc.php');
require_once('./driver_database.php');
require_once('../database/user.php');
require_once('../lang/framework_html.php');
$choose_lang=getuser_lang($sndg_community);
global $framework_html;
page_css("ϵͳ��������");
?>
<script language=javascript>
var parent_window = window.dialogArguments;
function check_form()
{
    var date_time=parent_window.form1.END_DATE.value;
    var cur_time=form1.hour.value+":"+form1.minite.value+":"+form1.second.value;
    parent_window.form1.END_DATE.value+=" "+cur_time;
    window.close();
}
</script>

<body class="bodycolor" topmargin="5">


<div class="big1" align="center">
<b>
<form name=form1>
<?=$framework_html[$choose_lang]['Time']?>��<select name=hour class=BigSelect style="width:50px">
<option value=00>00</option><option value=01>01</option><option value=02>02</option><option value=03>03</option><option value=04>04</option><option value=05>05</option><option value=06>06</option><option value=07>07</option><option value=08>08</option><option value=09>09</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20 selected>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option></select>
��<select name=minite class=BigSelect style="width:50px">
<option value=00>00</option><option value=01>01</option><option value=02>02</option><option value=03>03</option><option value=04>04</option><option value=05>05</option><option value=06>06</option><option value=07>07</option><option value=08>08</option><option value=09>09</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17 selected>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option><option value=32>32</option><option value=33>33</option><option value=34>34</option><option value=35>35</option><option value=36>36</option><option value=37>37</option><option value=38>38</option><option value=39>39</option><option value=40>40</option><option value=41>41</option><option value=42>42</option><option value=43>43</option><option value=44>44</option><option value=45>45</option><option value=46>46</option><option value=47>47</option><option value=48>48</option><option value=49>49</option><option value=50>50</option><option value=51>51</option><option value=52>52</option><option value=53>53</option><option value=54>54</option><option value=55>55</option><option value=56>56</option><option value=57>57</option><option value=58>58</option><option value=59>59</option></select>
��<select name=second class=BigSelect style="width:50px">
<option value=00>00</option><option value=01>01</option><option value=02>02</option><option value=03>03</option><option value=04>04</option><option value=05>05</option><option value=06>06</option><option value=07>07</option><option value=08>08</option><option value=09>09</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option><option value=32>32</option><option value=33>33</option><option value=34 selected>34</option><option value=35>35</option><option value=36>36</option><option value=37>37</option><option value=38>38</option><option value=39>39</option><option value=40>40</option><option value=41>41</option><option value=42>42</option><option value=43>43</option><option value=44>44</option><option value=45>45</option><option value=46>46</option><option value=47>47</option><option value=48>48</option><option value=49>49</option><option value=50>50</option><option value=51>51</option><option value=52>52</option><option value=53>53</option><option value=54>54</option><option value=55>55</option><option value=56>56</option><option value=57>57</option><option value=58>58</option><option value=59>59</option></select>

<br>
<br>
<input type=button  onClick="check_form();" value="<?=$framework_html[$choose_lang]['Sure']?>" title="<?=$framework_html[$choose_lang]['Sure']?>" class="BigButton">
</form>
</b>
</div>

</body>
</html>
