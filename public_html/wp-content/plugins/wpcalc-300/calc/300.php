<div class="wpcalc">
<form name="form">
<table>
 <tr align=left>
                <td colspan="2" >
                Единицы измерения при Вычислите ёмкости:</p>
                </td>
                <td align="left">
                <p><input type="radio" onClick="setunits(this.form, 'ckГц')" name="FREQ" value="true" /> kГц, нФ, Ом<br />
                <input type="radio" onClick="setunits(this.form, 'cMГц')" name="FREQ" value="cMГц" /> MГц, пФ, Ом</p>
                </td>
            </tr>
            <tr align=left>
                <td colspan="2">
                Единицы измерения при Вычислите индуктивности:</p>
                </td>
                <td align="left">
                <p><input type="radio" onClick="setunits(this.form, 'lkГц')" name="FREQ" value="lkГц" /> kГц, мГн, Ом<br />
                <input type="radio" onClick="setunits(this.form, 'lMГц')" name="FREQ" value="lMГц" /> MГц, мкГн, Ом</p>
                </td>
            </tr>
         
            
 <tr align=left>
                <td>
                Частота сигнала</p>
                </td>
                <td>
                <p><input type="button" onClick="calcF(this.form)" value="Вычислить" /></p>
                </td>
                <td>
                <p><input size="6" name="freq" type="text" /><input size="4" name="funit" type="text" /></p>
                </td>
            </tr>
            <tr align=left>
                <td>
                Величина (ёмкость или индуктивность)</p>
                </td>
                <td>
                <p><input type="button" onClick="calcC(this.form)" value="Вычислить" /></p>
                </td>
                <td>
                <p><input size="6" name="comp" type="text" /><input size="4" name="cunit" type="text" /></p>
                </td>
            </tr>
            <tr align=left>
                <td>
                Реактивное сопротивление</p>
                </td>
                <td>
                <p><input type="button" onClick="calcZ(this.form)" value="Вычислить" /></p>
                </td>
                <td>
                <p><input size="6" name="imp" type="text" /><input size="4" name="zunit" type="text" /></p>
                </td>
            </tr>
  
    </table>
</form>
</div>