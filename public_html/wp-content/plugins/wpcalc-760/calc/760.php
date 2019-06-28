<div class="wpcalc">
<form name="form1"> 
<table>
<tr><td>Выбор питающей сети</td><td><select name="num3">
<option value="1"> 1-фазная сеть </option>
<option value="1.73"> 3х-фазная сеть </option>
</select> </td></tr>
<tr><td>Выбор характера нагрузки</td><td><select name="num4">
<option value="0.95"> Активная </option>
<option value="0.8"> Реактивная </option>
</select> </td></tr>
<tr><td>Мощность нагрузки, Вт</td><td><input type ="text" name="num" size=10></td></tr>
<tr><td>Напряжение в сети, В</td><td><input type ="text" name="num1" size=10></td></tr>
<tr><td colspan=2 align=center><input type ="button" value="Рассчитать ток" onClick="u(form1)"> <input type ="reset" value=Сброс></td></tr>
<tr><td>Ток, A</td><td><input type ="text" name="res" size=10></td></tr>
</table>
</form>
</div>