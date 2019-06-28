<div class="wpcalc">
<form name="form">
<table>
<tr><td>Входящее напряжение: </td><td><INPUT type="text" size=10 name="input_voltage" value="5" onfocus='if (this.value=="5") this.value="";' onblur='if (this.value=="") this.value="5";'></td><td></td></tr>
<tr><td>Напряжение на выходе: </td><td><INPUT type="text" size=10 name="output_voltage" value="3.3" onfocus='if (this.value=="3.3") this.value="";' onblur='if (this.value=="") this.value="3.3";'></td><td></td></tr>
<tr>
 <td>Ряд сопротивлений: </td>
 <td>
 <SELECT name="seq"><OPTION value="96">E96</OPTION><OPTION value="24">E24</OPTION></SELECT>
 </td><td></td>
</tr>
<tr><td>Единицы (Oм):  </td>
 <td>
 <SELECT name="seed"><OPTION value="1">1</OPTION><OPTION value="10">10</OPTION><OPTION value="100">100</OPTION><OPTION selected="" value="1000">1000</OPTION><OPTION value="10000">10000</OPTION><OPTION value="100000">100000</OPTION><OPTION value="1000000">1000000</OPTION></SELECT>
 </td><td></td>
</tr>
<tr><td colspan=3 align=center><INPUT type="button" value="Вычислить" onclick="calculate1()"></td></tr>

<tr><td>R 1 (Oм)</td><td>R 2 (Oм)</td><td></td></tr>
<tr><td><INPUT type="text"name="c0" size=10 ></td><td><INPUT type="text" name="r0" size=10 ></td><td><INPUT type="text" name="caption0" size=10></td></tr>
<tr><td><INPUT type="text" name="c1" size=10 ></td><td><INPUT type="text" name="r1" size=10></td><td><INPUT type="text" name="caption1" size=10></td></tr>
<tr><td><INPUT type="text" name="c2" size=10></td><td><INPUT type="text" name="r2" size=10 ></td><td><INPUT type="text" name="caption2" size=10 ></td></tr>
<tr><td><INPUT type="text" name="c3" size=10 ></td><td><INPUT type="text" name="r3" size=10></td><td><INPUT type="text" name="caption3" size=10 ></td></tr>
<tr><td><INPUT type="text" name="c4" size=10 ></td><td><INPUT type="text" name="r4" size=10 ></td><td><INPUT type="text" name="caption4" size=10></td></tr>
<tr><td><INPUT type="text" name="c5" size=10 ></td><td><INPUT type="text" name="r5" size=10 ></td><td><INPUT type="text" name="caption5" size=10 ></td></tr>
<tr><td><INPUT type="text" name="c6" size=10 ></td><td><INPUT type="text" name="r6" size=10 ></td><td><INPUT type="text" name="caption6" size=10 ></td></tr>
<tr><td><INPUT type="text" name="c7" size=10></td><td><INPUT type="text" name="r7" size=10 ></td><td><INPUT type="text" name="caption7" size=10></td></tr>
<tr><td><INPUT type="text" name="c8" size=10 ></td><td><INPUT type="text" name="r8" size=10 ></td><td><INPUT type="text" name="caption8" size=10 ></td></tr>
<tr><td><INPUT type="text" name="c9" size=10 ></td><td><INPUT type="text" name="r9" size=10 ></td><td><INPUT type="text" name="caption9" size=10 ></td></tr>
<tr><td> </td></tr>
<tr><td>Выходное действующее напряжение:</td><td><INPUT type="text" name="real_output" ></td><td></td></tr>
<tr><td>Ошибка (%):</td><td><INPUT type="text" name="error"></td><td></td></tr></table>
</form>
</div>