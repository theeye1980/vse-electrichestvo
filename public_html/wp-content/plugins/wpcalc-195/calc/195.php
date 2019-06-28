<div class="wpcalc">
<form id="frmSt" onsubmit="inputCheck()" name=form>
<table>
<tr>
<th colspan="3">Размеры помещения</th>
</tr>
<tr>
<td>Длина помещения</td>
<td><input type="text" name="len" value="" onkeyup="return proverka(this);" placeholder="10"/></td>
<td>м</td>
</tr>
<tr>
<td>Ширина помещения</td>
<td><input type="text" name="width" value="" onkeyup="return proverka(this);" placeholder="5"/></td>
<td>м</td>
</tr>
<tr>
<td>Количество ламп</td>
<td><input type="text" name="lQuant" value="" onkeyup="return proverka(this);" placeholder="5"/></td>
<td>шт</td>
</tr>
<tr>
<td colspan="3" >
<fieldset>
<legend>Тип лампы</legend>
<table>
<tr>
<td><label for="fil">Лампа накаливания</label></td>
<td><input type="radio" name="lType" id="fil" value="fil" checked="checked" /></td>
<td class="pic"><label for="fil"><?php echo '<img src="' . plugins_url( 'img/fil.jpg', __FILE__ ) . '" > '; ?></label></td>
</tr>
<tr>
<td><label for="hal">Галогеновая лампа</label></td>
<td><input type="radio" name="lType" id="hal" value="hal" /></td>
<td class="pic"><label for="hal"><?php echo '<img src="' . plugins_url( 'img/hal.jpg', __FILE__ ) . '" > '; ?></label></td>
</tr>
<tr>
<td><label for="dll">Лампа дневного света</label></td>
<td><input type="radio" name="lType" id="dll" value="dll" /></td>
<td class="pic"><label for="dll"><?php echo '<img src="' . plugins_url( 'img/dll.jpg', __FILE__ ) . '" > '; ?></label></td>
</tr>
<tr>
<td><label for="sdl">Светодиодная Led лампа</label></td>
<td><input type="radio" name="lType" id="sdl" value="sdl" /></td>
<td class="pic"><label for="sdl"><?php echo '<img src="' . plugins_url( 'img/sdl.jpg', __FILE__ ) . '" > '; ?></label></td>
</tr>
</table>
</fieldset>
</td>
</tr>
<tr>
<td colspan="3" >
<table>
<tr>
<td>Тип помещения</td>
<td>
        <select name="roomType"><option value="det">Детская комната</option><option value="gost">Гостиная</option><option value="spal">Спальня</option><option value="kor">Коридор</option><option value="kux">Кухня</option><option value="van">Ванная комната</option><option value="klad">Кладовая, гараж</option></select>
       </td>
</tr>
</table>
</td>
</tr>
<tr>
<th colspan="3">Результаты расчетов</th>
</tr>
<tr>
<td>Мощность ламп</td>
<td><input type="text" readonly="readonly" name="lPower" /></td>
<td class="units">Вт</td>
</tr>
<tr>
<td colspan="3" align=center>
<input type="button" value="Рассчитать" onclick="calculate(document.getElementById('frmSt').elements['len'].value,document.getElementById('frmSt').elements['width'].value,document.getElementById('frmSt').elements['lQuant'].value,document.getElementById('frmSt').elements['roomType'].options[document.getElementById('frmSt').elements['roomType'].selectedIndex].value);" /> <input type="reset" value="Сбросить" />
       </td>
</tr>
</table></form>
</div>