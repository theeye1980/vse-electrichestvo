<div class="wpcalc">
<FORM name="form1" >
<table>
<tr>
<td>Частота:</td>
<td><input type="text" size=6 name="ft" value = '50'></td>
<td>
<SELECT  name="fmt" onChange="impedance1(form1)"><option value=1>Hz</option><OPTION value=1000>kHz</option><OPTION value=1000000>MHz</option></SELECT></td>
</tr>
<tr>
<td>Ёмкость:</td>
<td> <INPUT type="text" size=6 name="ct" value = '3.1831' onChange="impedance1(form1)"></td>
<td>
<p><SELECT  name="cmt" onChange="impedance1(form1)"><option value=0.000001>µF</option><OPTION value=0.000000001>nF</option><OPTION value=0.000000000001>pF</option></SELECT></td>
</tr>
<tr>
<td>Индуктивность:</td>
<td> <INPUT type="text" size=6 name="lt" value='3.1831' ></td>
<td>
<p><SELECT  name="lmt" onChange="impedance1(form1)"><option value=1>H</option><OPTION value=0.001>mH</option><OPTION value=0.000001>µH</option></SELECT> </td>
</tr>
<tr>
<td>Активное R:</td>
<td> <INPUT type="text" size=6 name="rt" value = '1000'></td>
<td>
<p><SELECT  name="rmt" onChange="impedance1(form1)"><option value=1>&#937;</option><OPTION value=1000>k&#937;</option><OPTION value=1000000>M&#937;</option></SELECT></td>
</tr>
<tr>
<td colspan=3><center><input type="button" onclick="impedance1(form1)" value="Рассчитать"></center></td>
</tr>
<tr>
<td colspan=2><b>Результаты вычислений:<b/></td>
<td> <select name = 'okr' ><option value = 12> округлять до 12 знаков </option><option value = 9> округлять до 9 знаков </option><option value = 6> округлять до 6 знаков </option><option value = 3> округлять до тысячных </option></select></td>
</tr>
<tr>
<td> XL </td>
<td><INPUT type="text" size=16 name="xl"></td>
<td>
<INPUT type="text" size=4 name="xlm">  </td>
</tr>
<tr>
<td> XC</td>
<td> <INPUT type="text" size=16 name="xc"></td>
<td>
<INPUT type="text" size=4 name="xcm"> </td>
</tr>
<tr>
<td>Импеданс Z:</td>
<td> <INPUT type="text" size=16 name="zt"></td>
<td>
<INPUT type="text" size=4 name="xzm"> </td>
</tr>
<tr>
<td>Угол &phi;:</td>
<td> <INPUT type="text" size=16 name="fi"></td>
<td>
 </td>
</tr>
<tr>
<td>Угол &delta;: </td>
<td><INPUT type="text" size=16 name="d"></td>
<td>
 </td>
</tr>
<p></TABLE><br />
<center><INPUT type="reset" value="Сбросить"></center><br />
</FORM>
</div>