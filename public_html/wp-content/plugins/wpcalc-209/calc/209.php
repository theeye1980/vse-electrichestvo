<div class="wpcalc">
<form name="form">
<table>
<tr>
<td>напряжение (В):</td>
<td><input type="text" name="x1" onkeyup="this.value=this.value.replace(/[^\d\.\,]+/g,'')"/ placeholder="220"/></td>
</tr>
<tr>
<td>Потребляемую мощность (Вт):</td>
<td><input type="text" name="x2" onkeyup="this.value=this.value.replace(/[^\d\.\,]+/g,'')"/ placeholder="12"/></td>
</tr>
<tr>
<td colspan=2 align=center>
              <input type="button" value="Рассчитать" onclick="y1.value=x2.value/x1.value"/></td>
</tr>
<tr>
<td>Сила тока:</td>
<td><input type="text" name="y1"/>А
          </td>
</tr>
</table>
</form>
</div>