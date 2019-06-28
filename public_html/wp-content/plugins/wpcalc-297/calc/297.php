<div class="wpcalc">

<form name="form">
<table>

 <tr align=left>
                <td>
                Длина линии (м) / Материал кабеля:</p>
                </td>
                <td height="25">
                <p><input type="text" value="100" name="length" maxlength="10" size="10" /></p>
                </td>
                <td height="25" colspan="2">
                <p><select name="resistunits">
                <option value="1">Медь</option>
                <option value="1.58">Алюминий</option>
                </select></p>
                </td>
            </tr>
            <tr align=left>
                <td height="25">
                Сечение кабеля (мм&sup2;):</p>
                </td>
                <td height="25">
                <p><select name="area">
                <option value="0.034400">0,5 мм&sup2;</option>
                <option value="0.025800">0,75 мм&sup2;</option>
                <option value="0.017200">1,0 мм&sup2;</option>
                <option value="0.011467">1,5 мм&sup2;</option>
                <option selected="" value="0.006880">2,5 мм&sup2;</option>
                <option value="0.004300">4,0 мм&sup2;</option>
                <option value="0.002867">6,0 мм&sup2;</option>
                <option value="0.001720">10,0 мм&sup2;</option>
                <option value="0.001075">16,0 мм&sup2;</option>
                <option value="0.000688">25,0 мм&sup2;</option>
                <option value="0.000491">35,0 мм&sup2;</option>
                <option value="0.000344">50,0 мм&sup2;</option>
                <option value="0.000246">70,0 мм&sup2;</option>
                <option value="0.000181">95,0 мм&sup2;</option>
                <option value="0.000143">120 мм&sup2;</option>
                </select></p>
                </td>
                <td height="25" colspan="2">
                <p>&nbsp;</p>
                </td>
            </tr>
            <tr align=left>
                <td height="25">
                Мощность нагрузки (Вт) или ток (А):</p>
                </td>
                <td height="25">
                <p><input type="text" oninput="usPower()" value="1000" name="power" maxlength="10" size="10" /></p>
                </td>
                <td height="25" colspan="2">
                <p><input type="text" oninput="usPower()" name="tok" maxlength="10" size="10" /></p>
                </td>
            </tr>
            <tr align=left>
                <td height="25">
                Напряжение сети (В):</p>
                </td>
                <td height="25">
                <p><input type="text" oninput="usPower()" value="220" name="voltag" maxlength="10" size="10" /></p>
                </td>
                <td height="25" style="border-style:none;">
                <p><input type="radio" checked="" onchange="usPower()" name="parRas" />Мощность</p>
                </td>
                <td height="25" style="border-style:none;">
                <p><input type="radio" checked="" onchange="insvoltag()" name="faz" />1 фаза</p>
                </td>
            </tr>
            <tr align=left>
                <td height="25">
                Коэффициент мощности (cos&phi;):</p>
                </td>
                <td height="25">
                <p><input type="text" oninput="usPower()" value="0.92" name="cosinus" maxlength="10" size="10" /></p>
                </td>
                <td height="25" style="border-style:none;">
                <p><input type="radio" onchange="usPower()" name="parRas" />Ток</p>
                </td>
                <td height="25" style="border-style:none;">
                <p><input type="radio" onchange="insvoltag()" name="faz" />3 фазы</p>
                </td>
            </tr>
            <tr align=left>
                <td height="25">
                Температура кабеля&nbsp;(&deg;C):</p>
                </td>
                <td height="25">
                <p><input type="text" value="35.00" name="t" maxlength="10" size="10" /></p>
                </td>
                <td height="25" colspan="2">&nbsp;</td>
            </tr>

            <tr align=left>
                <td height="35" colspan="4">
                <p align="center"><input type="button" onclick="calcelectro(this.form)" value="Вычислить" /></p>
                </td>
            </tr>
 
            <tr align=left id=my_color>
                <td height="25">
                Потери напряжения (В / %)</p>
                </td>
                <td height="25">
                <p><input type="text" name="result" value="" maxlength="10" size="10" /></p>
                </td>
                <td height="25" colspan="2">
                <p><input type="text" name="result_1" value="" maxlength="10" size="10" /></p>
                </td>
            </tr>
            <tr align=left id=my_color>
                <td height="25">
                Сопротивление провода&nbsp;(ом)</p>
                </td>
                <td height="25">
                <p><input type="text" name="rl" value="" maxlength="10" size="10" /></p>
                </td>
                <td height="25" colspan="2">&nbsp;</td>
            </tr>
            <tr align=left id=my_color>
                <td height="25">
                Реактивная мощность&nbsp;(ВАр)</p>
                </td>
                <td height="25">
                <p><input type="text" name="kvar" value="" maxlength="10" size="10" /></p>
                </td>
                <td height="25" colspan="2">&nbsp;</td>
            </tr>
            <tr align=left id=my_color>
                <td height="25">
                Напряжение на нагрузке (В)</p>
                </td>
                <td><input type="text" name="ukl" value="" maxlength="10" size="10" /></td>
                <td colspan="2">&nbsp;</td>
            </tr>


        </tbody>
    </table>
</form>
</div>