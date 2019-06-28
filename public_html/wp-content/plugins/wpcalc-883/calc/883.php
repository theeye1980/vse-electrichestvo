<form>
<div class="wpcalc">

<div class="wpcalc-col">
<div class="wpcalc-col-6">Общая отапливаемая площадь</div>
<div class="wpcalc-col-6"><input id="area" maxlength="5" name="b" onkeyup="var n=this.value.replace(/([^0-9 .])/g,''); if(n!=this.value) this.value=n;" type="text" /></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Материал стен:</div>
<div class="wpcalc-col-6">
<select name="a">
<option value="30">Брус 150 &times; 150 мм.</option>
<option value="18">Брус 150 &times; 150 + 50 мм. утепл.</option>
<option value="14">Брус 150 &times; 150 + 100 мм. утепл.</option>
<option value="13">Бризолит 380 мм.</option>
<option value="14">Каркасно-щитовой с мин. ватой 150 мм.</option>
<option value="12">Каркасно-щитовой с мин. ватой 200 мм.</option>
<option value="10">Каркасно-щитовой с эковатой 150 мм.</option>
<option value="8">Каркасно-щитовой с эковатой 200 мм.</option>
<option value="36">Керамзитобетон 500 мм.</option>
<option value="40">Кирпичная кладка 640 мм.</option>
<option value="22">Кирпичная кладка 640 мм. + 50 мм. утепл.</option>
<option value="14">Кирпичная кладка 640 мм. + 100 мм. утепл.</option>
<option value="30">Оцилиндрованное бревно 180 мм.</option>
<option value="25">Оцилиндрованное бревно 220 мм.</option>
<option value="19">Оцилиндрованное бревно 260 мм.</option>
<option value="18">Пеноблок 250 мм.</option>
<option value="14">Пеноблок 250 мм. + 50 мм. утепл.</option>
<option value="12">Пеноблок 250 мм. + 100 мм. утепл.</option>
<option value="14">Полистиролбетон 150 мм.</option>
<option value="18">Твинблок 300 мм.</option>
</select>
</div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Стоимость 1 кВтч</div>
<div class="wpcalc-col-6"><input id="area" maxlength="4" name="w" onkeyup="this.value=this.value.replace(/([^0-9 .])/g,'');" size="4" type="text" /></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-12"><center><input onclick="calculator(this.form)" type="button" value="Рассчитать" /></center></div>
</div>

<div class="wpcalc-col ">
<div class="wpcalc-col-6"><strong>Расчеты</strong></div>
<div class="wpcalc-col-3"><strong>Электрокотел</strong></div>
<div class="wpcalc-col-3"><strong>ПЛЭН</strong></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Установленная мощность, <strong>кВт</strong></div>
<div class="wpcalc-col-3 wpcalcresult"><span id="res5">0</span></div>
<div class="wpcalc-col-3 wpcalcresult"><span id="res1">0</span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Расчетная мощность,&nbsp;<strong>кВт</strong></div>
<div class="wpcalc-col-3 wpcalcresult"><span id="res6">0</span></div>
<div class="wpcalc-col-3 wpcalcresult"><span id="res2">0</span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Среднемесячный расход электроэнергии,&nbsp;<strong>кВтч/мес</strong></div>
<div class="wpcalc-col-3 wpcalcresult"><span id="res7">0</span></div>
<div class="wpcalc-col-3 wpcalcresult"><span id="res3">0</span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Среднемесячные затраты на обогрев, <strong>руб</strong>.</div>
<div class="wpcalc-col-3 wpcalcresult"><span id="res8">0</span></div>
<div class="wpcalc-col-3 wpcalcresult"><span id="res4">0</span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Среднемесячная экономия электроэнергии,&nbsp;<span><strong>кВтч/мес</strong>.</div>
<div class="wpcalc-col-3 wpcalcresult"><strong>-</strong></div>
<div class="wpcalc-col-3 wpcalcresult"><span id="res10">0</span></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Среднемесячная экономия денежных средств.</div>
<div class="wpcalc-col-3 wpcalcresult"><strong>-</strong></div>
<div class="wpcalc-col-3 wpcalcresult"><strong><span id="res9">0</span></strong></div>
</div>

</div>
</form>