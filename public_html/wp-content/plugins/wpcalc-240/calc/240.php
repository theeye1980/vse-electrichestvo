<div class="wpcalc">
<form name=first>
<table>
<tr>
<td>Диаметр проволоки:  </td>
<td><input type=text id=d onkeyup=checnum(this)> мм</td>
</tr>
<tr>
<td>Число витков: </td>
<td><input type=text id=n onkeyup=checnum(this)></td>
</tr>
<tr>
<td>Длина катушки: </td>
<td> <input type=text id=bl onkeyup=checnum(this)> мм</td>
</tr>
<tr>
<td>Диаметр катушки: </td>
<td> <input type=text id=bd onkeyup=checnum(this)> мм</td>
</tr>
<tr>
<td>Ток (I): </td>
<td> <input type=text id=i onkeyup=checnum(this)> A</td>
</tr>
<tr>
<td align=center colspan=2><input type=button value=Рассчитать onclick=calc()> <input type=reset value=Сбросить onclick=rese()></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>Витков в обмотке:</td>
<td><input type=text id=res readonly> </td>
</tr>
<tr>
<td>Число витков:</td>
<td><input type=text id=res1 readonly>  </td>
</tr>
<tr>
<td>Диаметр катушки:</td>
<td><input type=text id=res2 readonly> (мм)<sup>2</sup></td>
</tr>
<tr>
<td>Площадь поперечного сечения:</td>
<td><input type=text id=res3 readonly> (мм)<sup>2</sup></td>
</tr>
<tr>
<td>Общая длина провода в катушке:</td>
<td><input type=text id=res4 readonly> м</td>
</tr>
<tr>
<td>Сопротивление/м:</td>
<td><input type=text id=res5 readonly> Ом/м </td>
</tr>
<tr>
<td>Сопротивление:</td>
<td><input type=text id=res6 readonly> Ом</td>
</tr>
<tr>
<td>Напряжение при номинальном токе:</td>
<td><input type=text id=res7 readonly> В </td>
</tr>
<tr>
<td>Мощность при номинальном токе:</td>
<td><input type=text id=res8 readonly> Вт </td>
</tr>
</table></form>
</div>