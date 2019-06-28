
<div class="wpcalc">

<div class="wpcalc-col">
<div class="wpcalc-col-6">Окна</div><div class="wpcalc-col-6">
<select name="x1">
<option value="0.85">Тройной стеклопакет </option>
<option value="1">Двойной стеклопакет</option>
<option value="1.27">Обычное (двойное) остекление</option>
</select>
</div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Стены</div><div class="wpcalc-col-6"><select name="x2"> 
<option value="0.85">Хорошая теплоизоляция</option>
                <option value="1">Два кирпича или 150 мм утеплителя</option>
                <option value="1.27">Плохая теплоизоляция</option>
              </select></div>
</div>


<div class="wpcalc-col">
<div class="wpcalc-col-6">Соотношение площадей окон и пола</div><div class="wpcalc-col-6"><select name="x3">
                <option value="0.8">10%</option>
                <option value="0.9">20%</option>
                <option value="1">30%</option>
                <option value="1.1">40%</option>
                <option value="1.2">50%</option>
              </select></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Температура снаружи помещения</div><div class="wpcalc-col-6"><select name="x4">
                <option value="0.7">-10C</option>
                <option value="0.9">-15C</option>
                <option value="1.1">-20C</option>
                <option value="1.3">-25C</option>
                <option value="1.5">-30C</option>
                <option value="1.7">-35C</option>
              </select></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Число стен выходящих наружу</div><div class="wpcalc-col-6"><select name="x5">
                <option value="1">Одна</option>
                <option value="1.2">Две</option>
                <option value="1.3">Три</option>
                <option value="1.4">Четыри</option>
              </select></div>
</div>


<div class="wpcalc-col">
<div class="wpcalc-col-6">Тип помещения над рассчитываемым</div><div class="wpcalc-col-6"><select name="x6">
                <option value="0.8">Обогреваемое помещение</option>
                <option value="0.9">Теплый чердак</option>
                <option value="1">Холодный чердак</option>
              </select></div>
</div>


<div class="wpcalc-col">
<div class="wpcalc-col-6">Высота помещения</div><div class="wpcalc-col-6"> <select name="x7">
                <option value="1">2,5 метра</option>
                <option value="1.05">3 метра</option>
                <option value="1.1">3,5 метра</option>
                <option value="1.15">4 метра</option>
                <option value="1.2">4,5 метра</option>
              </select></div>
</div>


<div class="wpcalc-col">
<div class="wpcalc-col-6">Площадь помещения </div><div class="wpcalc-col-6"><input type="text" name="x8" value="20"></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-12"><center> <input type="button" name="Button" value="Рассчитать" onclick="wpcalc();"></center></div>
</div>


<div class="wpcalc-col wpcalcresult">
<div class="wpcalc-col-6">Теплопотери</div><div class="wpcalc-col-6"><div id="y1"></div></div>
</div>

<div class="wpcalc-col wpcalcresult">
<div class="wpcalc-col-6">Теплопроизводительность котла</div><div class="wpcalc-col-6"><div id="y2"></div></div>
</div>
</div>
