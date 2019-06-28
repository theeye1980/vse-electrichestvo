<div class="wpcalc">

<form id="smd-form">
                <!-- Type of calc --></p>
<div id="line">
<div id="linesmall"></div>
<table>
<tr>
<td>
<div class="linetext"><input type="radio" name="type-calc" id="type-calc-mark" value="1" checked><label for="type-calc-mark">Расчет маркировки</label></div>
</td>
<td>
<div class="edit"><input type="radio" name="type-calc" id="type-calc-resist" value="0"><label for="type-calc-resist">Расчет сопротивления</label></div>
</td>
</tr>
</table></div>
<div id="line" class="wrap-resist">
<table>
<tr>
<td>
<div id="linesmall"></div>
<p>                    <span class="linetext">Сопротивление:</span>
</td>
<td>
                    <span class="edit"><br />
                        <input type="text" class="number" name="resist" id="resist" maxlength="5"><br />
                    </span>
</td>
</tr>
</table></div>
<div id="line" class="wrap-ohm">
<table>
<tr>
<td>
<div id="linesmall"></div>
<p>                    <span class="linetext">Единица измерения:</span>
</td>
<td>
                    <span class="edit"><br />
                        <select class="number" name="ohm" id="ohm"><option value="0" selected>Ом</option><option value="3">кОм</option><option value="6">МОм</option><option value="9">ГОм</option></select><br />
                    </span>
</td>
</tr>
</table></div>
<div id="line" class="wrap-marking" style="display: none">
<table>
<tr>
<td>
<div id="linesmall"></div>
<p>                    <span class="linetext">Маркировка:</span>
</td>
<td>
                    <span class="edit"><br />
                        <input type="text" class="number" name="marking" id="marking" maxlength='4'><br />
                    </span>
</td>
</tr>
</table></div>
<div align="center">
                    <input type="submit" class="btn" id="calc" value="Расчет">
                </div>
<div class="clear"></div>
</p></form>
<div id="result" style="display: none"></div>
<div style="color: red" id="err"></div>
</div>