<div class="wpcalc">
<form name=first>
<table align=center>
<tr>
<td>Напряжение (V):  </td>
<td><input type=text id=v onkeyup=checnum(this)> В</td>
</tr>
<tr>
<td>Емкость (C): </td>
<td><input type=text id=c onkeyup=checnum(this)> мкФ</td>
</tr>
<tr>
<td>Сопротивление (R): </td>
<td> <input type=text id=r onkeyup=checnum(this)> Ом</td>
</tr>
<tr>
<td align=center colspan=2><input type=button value=Рассчитать onclick=calc()><input type=reset value=Сбросить onclick=rese()></td>
</tr>
<tr>
<td>T (RC):</td>
<td><input type=text id=res readonly> секунд</td>
</tr>
<tr>
<td>E:</td>
<td><input type=text id=res1 readonly> Джоулей </td>
</tr>
</table></form>
</div>
