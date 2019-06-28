<div class="wpcalc">
<form name="form">

<div class="wpcalc-col">
<div class="wpcalc-col-4"></div>
<div class="wpcalc-col-4"></div>
<div class="wpcalc-col-4"></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-4">Требуемая индуктивность <strong><em>L</em></strong></div>
<div class="wpcalc-col-4"><input id="L" type="text" size="5px" onKeyUp="checnum(this)"></div>
<div class="wpcalc-col-4"><select onclick="prevC()" onChange="unitL()" id="LM">
                <option value=1000>мГн</option>
                <option value=1 selected>&mu;Гн</option>
                <option value=0.001>нГн</option>
                </select></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-4">Диаметр каркаса <em>D</em></div>
<div class="wpcalc-col-4"><input id="D" type="text" size="5px" onKeyUp="checnum(this)"></div>
<div class="wpcalc-col-4"><select onclick="prevC()" onChange="unitD()" id="DM">
                <option value=1 selected>мм</option>
                <option value=10>см</option>
                </select></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-4">Длина намотки <em>l</em></div>
<div class="wpcalc-col-4"><input id="l" type="text" size="5px" onKeyUp="checnum(this)"></div>
<div class="wpcalc-col-4"><select onclick="prevC()" onChange="unitl()" id="lM" >
                <option value=1 selected>мм</option>
                <option value=10>см</option>
                </select></div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Диаметр провода по меди <em>d</em></div>
<div class="wpcalc-col-6"><input id="d" type="text" size="5px" onKeyUp="checnum(this)"> мм </div>
</div>

<div class="wpcalc-col">
<div class="wpcalc-col-6">Диаметр провода по изоляции <em>k</em></div>
<div class="wpcalc-col-6"><input id="k" type="text" size="5px" onKeyUp="checnum(this)">&nbsp;мм </div>
</div>
<div class="wpcalc-col">
<div class="wpcalc-col-12"><center><input type=button value=Вычислить onClick="FindInductance()"> <input type=reset value="Сбросить"></center></div>
</div>
<div class="wpcalc-col">
<div class="wpcalc-col-6 wpcb">Число витков <em>&omega;</em></div>
<div class="wpcalc-col-6 "><input id="w" type="text" size="5px" readonly></div>
</div>
<div class="wpcalc-col">
<div class="wpcalc-col-6 wpcb">Число слоев <em>N</em></div>
<div class="wpcalc-col-6"><input id="Lcc" type="text" size="5px" readonly></div>
</div>
<div class="wpcalc-col">
<div class="wpcalc-col-6 wpcb">Толщина катушки <em>с</em></div>
<div class="wpcalc-col-6"><input id="c" type="text" size="5px" readonly>&nbsp;мм </div>
</div>
<div class="wpcalc-col">
<div class="wpcalc-col-6 wpcb">*Длина провода <em>Lw</em></div>
<div class="wpcalc-col-6"><input id="Lww" type="text" size="5px" readonly>&nbsp;м</div>
</div>
<div class="wpcalc-col">
<div class="wpcalc-col-6 wpcb">**Сопротивление катушки <em>&Omega;</em></div>
<div class="wpcalc-col-6"><input id="R" type="text" size="5px" readonly>&nbsp;Ом</div>
</div>

</form>
</div>