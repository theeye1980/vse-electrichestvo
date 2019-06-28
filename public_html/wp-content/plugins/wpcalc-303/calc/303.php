<div class="wpcalc">
 <form name="form">
<table>
<tr><td>
Площадь помещения </td><td><input type="text" maxlength="8" name="ploshad" value="24" onfocus='if (this.value=="24") this.value="";' onblur='if (this.value=="") this.value="24";'> м²
</td></tr><tr><td colspan=2 align=center>
<select name="tip" size="3">
            <option value="11" >
             Тусклый
            </option>
            <option value="17" selected>
               Средний</option>
            <option value="20">Яркий</option>
          </select><select name="lampa"  size="3">

            <option value="1"  selected>
            Лампа накаливания
            </option>
            <option value="5">
             Энергосберегающая лампа</option>
            <option value="1.5">Галогенная лампа</option>
          </select>
</td></tr>
<tr><td colspan=2 align=center>	
				<input type="button" value="Рассчитать" onClick="light(form);">
           
</td></tr><tr align=left><td>
Рекомендуемая мощность </td><td><input type="text" maxlength="8" id="res"> Вт
</td></tr></table>
            </form>        
</div>