<div class="wpcalc">
	<form name=first>
	 <table>
       <tr><td >Введите значение</td><td> <input type=text id=col ></td> </tr>
       <tr><td >Выберите тип л.с.</td><td><select id=type >
       <option value=1>Электрические</option>
       <option value=2>Механические</option>
       <option value=3>Метрические</option></select></td></tr>
       <tr><td>Конвертировать из </td> <td><select id=from >
       <option value=1>Лошадиные Силы</option>
       <option value=2>Ватты</option></select></td></tr>
       <tr><td>Конвертировать в </td> <td><select id=to >
       <option value=2>Ватты</option>
       <option value=1>Лошадиные Силы</option></select></td></tr> 
       <tr><td colspan=2> &nbsp; </td></tr>
       <tr><td align=center colspan=2 > <input type=button value='Рассчитать' onclick=calculate();> <input type=reset value=Сбросить></td></tr>
       <tr><td colspan=2> &nbsp; </td></tr>
       <tr><td >Результат</td><td>= <input type=text readonly id=need></td> </tr></table>	     
	</form>
</div>