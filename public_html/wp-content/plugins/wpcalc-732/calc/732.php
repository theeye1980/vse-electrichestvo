<div class="wpcalc">
<form name=form>
<div class="wpcalc-col">
<div class="wpcalc-col-6">Ширина пола (см.)</div>
<div class="wpcalc-col-6"><input type=text id=x1 name=x1 value=120></div>
</div>
<div class="wpcalc-col">
<div class="wpcalc-col-6">Длина пола (см.)</div>
<div class="wpcalc-col-6"><input type=text id=x2 name=x2 value=250></div>
</div>
<div class="wpcalc-col">
<div class="wpcalc-col-6">Помещение тёплое?</div>
<div class="wpcalc-col-6">
<select id="x3" name=x3>
<option value="1">Обычноe</option>
<option value="2">Тёплое (тёплые стены)</option>
<option value="3">Холодное (1 этаж, тонкие стены)</option>
</select>
</div>
</div>
<div class="wpcalc-col">
<div class="wpcalc-col-6">Тип обогрева</div>
<div class="wpcalc-col-6">
<select id="x4" name=x4>
<option value="1">Как основное отопление</option>
<option value="2">Подогрев для комфорта</option>
</select>
</div>
</div>
<div class="wpcalc-col">
<div class="wpcalc-col-12"><center><input type="button" onclick="loan();" value="Рассчитать"></center></div>
</div>
<div class="wpcalc-col wpcalcresult">
<div class="wpcalc-col-12"><span id=result></span></div>
</div>
</form>
</div>