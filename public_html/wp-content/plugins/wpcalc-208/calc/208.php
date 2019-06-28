<div class="wpcalc">
<form name="form">
<table>
<tbody>
<tr>
<td>Введите мощность:</td>
<td><input id="P" size="10" type="text" onkeyup="this.value=this.value.replace(/[^\d\.\,]+/g,'')" placeholder="5"/> кВт</td>
</tr>
<tr>
<td>Выберите номинальное напряжение:</td>
<td><select id="U"><option value="0.22">220 B</option><option value="0.38">380 B</option><option value="0.66">660 B</option><option value="6">6 kB</option><option value="10">10 kB</option></select></td>
</tr>
<tr>
<td>Укажите число фаз:</td>
<td><select id="faza"><option value="1">1</option><option value="3">3</option></select></td>
</tr>
<tr>
<td>Выберите материал жилы:</td>
<td><select id="gamma"><option value="Al">Алюминий (Al)</option><option value="Cu">Медь (Cu)</option></select></td>
</tr>
<p><input id="dU" type="hidden" value="5" /> </p>
<tr>
<td>Введите длину кабельной линии:</td>
<td><input id="L" size="10" type="text" onkeyup="this.value=this.value.replace(/[^\d\.\,]+/g,'')" placeholder="10"/> м</td>
</tr>
<p><input id="par" type="hidden" value="1" /> </p>
<tr>
<td>Укажите тип линии:</td>
<td><select id="lepn"><option value="0">Не определено</option><option value="4">до 1 kB</option><option value="10">6 kB</option><option value="16">10 kB</option></select></td>
</tr>
<tr>
<td colspan="2" align="center"><input id="calc_button" name="BB" onclick="calculate()" type="button" value="Рассчитать" /></td>
</tr>
<tr>
<td>Расчетное сечение жилы мм<sup>2 </sup>:</td>
<td><input id="S" type="text" /></td>
</tr>
<tr>
<td>Рекомендуемое сечение мм<sup>2 </sup>:</td>
<td><input id="Sv" type="text" /></td>
</tr>
</tbody>
</table>
</form>
</div>