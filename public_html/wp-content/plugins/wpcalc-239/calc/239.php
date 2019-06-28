<div class="wpcalc">
<form name=first>
<table>
<tr>
<td>Количество резисторов:</td>
<td> <input type=text id=i1 size=19 class=easypositive onkeyup=disp(this);></td>
</tr>
</table>
<table border=0 cellpadding=0 cellspacing=0 align=center>
<tr>
<td colspan=2 align=center> &nbsp;
<div id=dis> </div>
</td>
</tr>
<tr>
<td colspan=2 align=center><input type=button value=Рассчитать onclick=calc()>  <input type=reset onclick=clearall() value=Сбросить onclick='clr()'></td>
</tr>
<tr>
<td>Параллельное Сопротивление в цепи: </td>
<td><input type=text readonly id=i11> Ом</td>
</tr>
</table></form>
</div>