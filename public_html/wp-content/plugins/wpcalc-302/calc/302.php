<div class="wpcalc">
<form name="form">
    <table>        
            <tr>
                <td>
                Длина помещения, м
                </td>
                <td  colspan="2"><input type="text" name="" value="10" id="A" /></td>
            </tr>
            <tr>
                <td>
                Ширина помещения, м
                </td>
                <td  colspan="2"><input type="text" name="" value="7" id="B" /></td>
            </tr>
            <tr>
                <td >
                Расчетная высота подвеса светильников (от рабочей поверхности), м
                </td>
                <td colspan="2"><input type="text" value="2" id="h" /></td>
            </tr>
            <tr>
                <td>
                Коэффициенты отражения помещения (*)
                </td>
                <td colspan="2">
                <p><select name="r" style="width:200px">
                <option value="7">Пол - 0%, стены - 0%, потолок - 0%</option>
                <option value="6">Пол - 10%, стены - 30%, потолок - 30%</option>
                <option value="5">Пол - 10%, стены - 30%, потолок - 50%</option>
                <option value="4">Пол - 10%, стены - 50%, потолок - 50%</option>
                <option value="3">Пол - 20%, стены - 50%, потолок - 70%</option>
                <option value="2">Пол - 10%, стены - 30%, потолок - 80%</option>
                <option value="1">Пол - 30%, стены - 50%, потолок - 80%</option>
                <option selected="" value="0">Пол - 30%, стены - 80%, потолок - 80%</option>
                </select></p>
                </td>
            </tr>
            <tr>
                <td>
                Тип светильника
                </td>
                <td colspan="2">
                <p><select onchange="loadSubdata(this)" id="tipeKSS" style="width:200px"> </select></p>
                </td>
            </tr>
            <tr>
                <td>
                Тип подходящих ламп
                </td>
                <td colspan="2">
                <p><select id="F" style="width:200px"> </select></p>
                </td>
            </tr>
            <tr>
                <td>
                Коэффициент запаса
                </td>
                <td colspan="2">
                <p><select name="Kz" style="width:200px">
                <option value="1.25">Очень чистые помещения, а так же осветительные установки с малым временем использования (k=1.25)</option>
                <option value="1.5">Чистые помещения с трехгодичным циклом обслуживания (k=1.50)</option>
                <option value="1.75">Наружное освещение, трехгодичный цикл обслуживания (k=1.75)</option>
                <option value="2">Внутреннее и наружное освещение при сильном загрязнении (k=2.00)</option>
                </select></p>
                </td>
            </tr>
            <tr>
                <td>
                Требуемая освещенность (по СНиП 23-05-95)
                </td>
                <td colspan="2">
                <p><select name="E" style="width:200px">
                <option value="5">(5 лк) Чердаки, шахты лифтов и т.д.</option>
                <option value="20">(20 лк) Лестницы, проходы технических этажей, лифты и т.д.</option>
                <option value="30">(30 лк) Поэтажные внеквартирные коридоры</option>
                <option value="50">(50 лк) Хозяйственные кладовые, душевые и т.д.</option>
                <option value="75">(75 лк) Зрительные залы кинотеатров, архивы и т.д.</option>
                <option value="100">(100 лк) Палаты, спальни, главные лестничные клетки и т.д.</option>
                <option value="150">(150 лк) Гостиные, фойе, комнаты кружков и т.д.</option>
                <option value="200">(200 лк) Конференц-залы, актовые залы, приемные и т.д.</option>
                <option selected="" value="300">(300 лк) Кабинеты, офисы, мастерские и т.д.</option>
                <option value="400">(400 лк) Читальные залы, лаборатории, аудитории и т.д.</option>
                <option value="500">(500 лк) Проектные комнаты, конструкторские, торговые залы и т.д.</option>
                <option value="750">(750 лк) Пошивочные и закройные цехи, отделения ремонта одежды и т.д.</option>
                </select></p>
                </td>
            </tr>
                  
            <tr>
                <td  colspan="3" align="center">
                <input type="button" id="btn" value="Вычислить" /> 
                </td>
            </tr>
            <tr>
                <td colspan="2">
                Необходимое количество светильников
                </td>
                <td>
                <p><input type="text" id="Kol" /></p>
                </td>
            </tr>
            <t>
                <td colspan="2">
                Световой поток одного светильника
                </td>
                <td><input type="text" id="svet" /></td>
            </tr>
  
        </tbody>
    </table>
</div>