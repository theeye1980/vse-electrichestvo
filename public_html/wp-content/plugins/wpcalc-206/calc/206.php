<div class="wpcalc">
<form name="form">
<div class="wpcalc-col">
<div class="wpcalc-col-6">Емкость батареи мАч</div>
<div class="wpcalc-col-6"><input type="text" name="txt1" id="parm1" onkeyup="this.value=this.value.replace(/[^\d\.\,]+/g,'')" value="30"></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Ток зарядного мАч</div>
<div class="wpcalc-col-6"><input type="text" name="txt2" id="parm2" onkeyup="this.value=this.value.replace(/[^\d\.\,]+/g,'')" value="1"></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-12"><center><input type="button" value="Рассчитать" name="but1" onclick="calc()"></center></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6 wpcb">Время зарядки </div>
<div class="wpcalc-col-6 wpcalcresult"><input type="text" name="sumOut"> (час)</div>
</div>
</form>
</div>