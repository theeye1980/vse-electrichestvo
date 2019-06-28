SMD = function() {

	//EIA-96
	this.eia = {'_01':100,'_02':102,'_03':105,'_04':107,'_05':110,'_06':113,'_07':115,
				'_08':118,'_09':121,'_10':124,'_11':127,'_12':130,'_13':133,'_14':137,
				'_15':140,'_16':143,'_17':147,'_18':150,'_19':154,'_20':158,'_21':162,
				'_22':165,'_23':169,'_24':174,'_25':178,'_26':182,'_27':187,'_28':191,
				'_29':196,'_30':200,'_31':205,'_32':210,'_33':215,'_34':221,'_35':226,
				'_36':232,'_37':237,'_38':243,'_39':249,'_40':255,'_41':261,'_42':267,
				'_43':274,'_44':280,'_45':287,'_46':294,'_47':301,'_48':309,'_49':316,
				'_50':324,'_51':332,'_52':340,'_53':348,'_54':357,'_55':365,'_56':374,
				'_57':383,'_58':392,'_59':402,'_60':412,'_61':422,'_62':432,'_63':442,
				'_64':453,'_65':464,'_66':475,'_67':487,'_68':499,'_69':511,'_70':523,
				'_71':536,'_72':549,'_73':562,'_74':576,'_75':590,'_76':604,'_77':619,
				'_78':634,'_79':649,'_80':665,'_81':681,'_82':698,'_83':715,'_84':732,
				'_85':750,'_86':768,'_87':787,'_88':806,'_89':825,'_90':845,'_91':866,
				'_92':887,'_93':909,'_94':931,'_95':953,'_96':976
	};

	//EIA-96 multiplicators
	this.multi = {'Z':0.001,'Y':0.01,'R':0.01,'X':0.1,'S':0.1,'A':1,'B':10,'H':10,
					'C':100,'D':1000,'E':10000,'F':100000};

	/*
		получаем цифры
		val - входное число/строка
		return string - цифры
	*/
	this.getDigits = function(val) {
		//преобразуем в строку и забираем только цифры
		//удаляем нули в начале
		return val = parseInt(val.toString().replace(/[^0-9]/g, '')).toString();
	}

	/*
		возвращаем значащие цифры
		val - входно число/строка
		return string - возвращаем 2-3 символа
	*/
	this.getImpNum = function(val) {
		var imp;
		var digits = this.getDigits(val);
		//если ноль, то выходим
		if (digits === '0') return false;
		if (digits.length === 1) {
			digits += '0';
		}
		imp = digits[2] === '0' ? 2 : 3; 
		return digits.slice(0, imp);
	}

	/*
		также возвращаем значащие цифры, но только 3 первых
		val - значение
		return string - три значащие цифры
	*/
	this.getImpNumThree = function(val) {
		if (val <= 0) return false;
		var digits = this.getDigits(val);
		var nums = digits.slice(0, 3);
		//дополняем нулями, если нужно
		while (nums.length < 3) {
			nums += '0';
		}
		return nums;
	}

	/*
		получаем степень, которая будет нужна в маркировку
		val - число или строка
		chars - сколько символов мы будем записывать в значащую часть (2 или 3)
		return number - степень
	*/
	this.getPow = function(val, chars) {
		//работаем только с положительными ненулевыми числами
		if (val <= 0) return 0;
		//если число больше одного, то всё просто
		if (val >= 1) return parseInt(val).toString().length - chars;
		//остается только дробная часть, работаем с ней
		var frac = val.toString().slice(2);
		var pow = -chars;
		var i = 0;
		while ( (frac[i] === '0') && (i<frac.length) ) {
			++i;
			--pow;
		}
		return pow;
	}

	/*
		Получаем SMD-код по стандарту с буквой R
		val - значение сопротивления
		return false если не найден SMD 
		return string если SMD найден	
	*/
	this.getSMDR = function(val) {
		// � аботаем в пределах от 0 до 100 
		if (val<0 || val>=100) {
			return false;
		} 
		//если число меньше 0.001, то даём 0 без R
		if (val < 0.001) return '0';
		//целая часть
		var integ = parseInt(val).toString();
		if (integ === '0') integ = '';
		//дробная часть
		var frac = Math.abs(val - parseInt(val)).toString().slice(0,5 - integ.length);
		//обрезаем нули, если нужно, и получаем мантиссу
		frac = parseFloat(frac).toString().slice(2,5);
		return integ + 'R' + frac;
	}

	/*
		Жесткий поиск кода EIA-96
		val - значение (корректно работает с трехзначными)
		return false - не найден
		return string - код, если найден
	*/
	this.searchEIAHard = function(val) {
		val = parseInt(val);
		var code = false;
		for (key in this.eia) {
			//если уже прошли мимо, то выходим из цикла
			if (val < this.eia[key]) break;
			//если нашли, забираем код и уходим
			if (this.eia[key] === val) {
				code = key.slice(1);
				break;
			}
		}
		return code;
	}

	/*
		поиск символа-мудьтипликатора для EIA-96
		val - значение, для которого ищем мультипликатор
		return false - если не найден
		return string - если найден
	*/
	this.searchMulti = function(val) {
		//находим степень
		var pow = this.getPow(val, 3);
		//возводим 10 в эту степень
		var powered = Math.pow(10, pow);
		var mult = false;
		for (key in this.multi) {
			//мультипликатор найден
			if (powered === this.multi[key]) {
				mult = key;
				break;
			}
		}
		return mult;
	}

	/*
		getSMDS(imply)
		получаем SMD-код, когда последняя цифра указывает на степень
		val - значение
		return false если не найден SMD 
		return string если SMD найден	
	*/
	this.getSMDS = function(val) {
		var imp = this.getImpNum(val),
			pow = this.getPow(val, imp.length);
		if ( (pow < 0) || (pow > 9) ) return false;
		return imp + pow;
	}

	/*
		EIA-96, получаем маркировку SMD
		val - значение
		return false если не найден SMD 
		return string если SMD найден	
	*/
	this.getSMDEIA = function(val) {
		var multi, imp, code;
		if ( imp = this.getImpNumThree(val) ) {
			if ( code = this.searchEIAHard(imp) ) { 
				if ( multi = this.searchMulti(val)) {
					return code + multi;
				}
			}
		}
		return false;
	}

	/*	
		получаем SMD-коды
		value - значение в Омах
		pow - степень множителя, множитель равен 10^pow
		return {R:'SMDR', S: 'SMDS', E: 'SMDEIA'} 
	*/
	this.getSMD = function(value, pow) {
		//получаем значение, для которого будем искать SMD
		var val = value * Math.pow(10, pow);
		var R, S, E,
			codes = {};
		if (R = this.getSMDR(val)) codes.R = R;
		if (S = this.getSMDS(val)) codes.S = S;
		if (E = this.getSMDEIA(val)) codes.E = E;
		return codes;
	}

	/*
		получаем текст для вывлда SMD-кодов
		value - значение в Омах
		pow - степень множителя, множитель равен 10^pow
		lang - лингвистический объект
		return array - массив строк для вывода
	*/
	this.textSMD = function(value, pow, lang) {
		var text = [],
			found = false, 
			codes = this.getSMD(value, pow);
		for (key in codes) {
			found = true;
			text.push(lang['SMD_'+key] + ': <b>' + codes[key] + '</b>');
		}
		if (!found) {
			text.push(lang['SMD_none']);
		}
		return text;
	}

	/*
		функция, связывающая получение и вывод SMD-кодов с интерфейсом
		lang - лингвистический объект
	*/
	this.writeSMD = function(lang) {
		//собираем данные, валидируем их
		var value = parseFloat($('#resist').val().replace(',', '.'));
		if (!$.isNumeric(value)) {
			return false;
		}
		var pow = parseInt($('#ohm').val());
		if (!$.isNumeric(pow)) {
			return false;
		}
		//получаем текст
		var text = this.textSMD(value, pow, lang);
		// очищаем предыдущие результаты
		$('#result').text('');
		// выводим текст
		for (key in text) {
			$('#result').append(text[key] + '<br>');
		}
		$('#result').show();
	}

	/*
		получаем сопротивление из стандартной SMD
		mark - маркировка, строка 3-4 символа (цифры)
		return false - если получить значение не удалось
		return number - значение сопротивления
	*/
	this.getResS = function(mark) {
		//валидируем маркировку
		mark = parseInt(mark.toString()).toString();
		if ( (mark.length !== 3) && (mark.length !== 4) ) {
			return false;
		}
		var pow = parseInt(mark[mark.length-1]),
			imp = parseInt(mark.slice(0, mark.length-1));
		return imp * Math.pow(10, pow);
	}

	/*
		получаем сопротивление по SMD-коду с буквой R
		mark - маркировка
		return false - если не получилось (введена некорректная маркировка)
		return number - значение сопротивления, если всё получилось
	*/
	this.getResR = function(mark) {
		//раскладываем по регулярному выражению
		var matched = mark.match(/^([0-9]{0,3})R([0-9]{0,3})$/);
		//сообщаем о неудаче, если не получилось
		if (matched === null) {
			return false;
		}
		var integ = matched[1].length !== 0 ? parseInt(matched[1]) : 0;
		var frac = matched[2].length !== 0 ? parseInt(matched[2]) : 0;
		return integ + parseFloat('0.' + frac.toString());
	}

	/*
		получаем сопротивление по коду EIA-96
		mark - маркировка
		return false - если не получилось
		return number - значение сопротивления
	*/
	this.getResE = function(mark) {
		//валидируем
		if ( !mark.match(/^[0-9]{2}[A-FHSRXYZ]$/) ) {
			return false;
		}
		// определяем код и мультипликатор
		var code = mark.slice(0, 2);
		var multi = mark[2];
		//проверяем существование кода
		if (this.eia['_' + code] === undefined) return false;
		// if (this.multi['multi'] === undefined) return false;
		return this.eia['_' + code] * this.multi[multi];
	}

	/*
		определяем по маркировке её тип и соотв.образом считаем сопротивлением
		mark - маркировка
		return false - если не получилось
		return number - значение сопротивления
	*/
	this.getRes = function(mark) {
		mark = mark.toString();
		if (mark === '0') return 0;
		var res = {};
		//определяем тип маркировки
		if (mark.match(/^[0-9]{3,4}$/)) {
			res.resist = this.getResS(mark);
			res.type = 'S';
		} else
		if (mark.match(/^[0-9]{0,3}R[0-9]{0,3}$/)) {
			res.resist = this.getResR(mark);
			res.type = 'R';
		} else
		if (mark.match(/^[0-9]{2}[A-FHSRXYZ]$/)) {
			res.resist = this.getResE(mark);
			res.type = 'E';
		} else {
			//если ни под какой стандарт не подходит
			return false;
		}
		return res;
	}

	/*
		получаем текст по рез-там распоознания маркировки
		mark - маркировка
		lang - языковой объект
		return string - получаем текст
	*/
	this.textRes = function(mark, lang) {
		var res = this.getRes(mark),
			text = [];
		if (res === false) {
			text.push(lang['res_none']);
		} else {
			var metric = 0,
				resist = res.resist;
			//определяем единицу измерения
			while ( (resist > 1000) && (metric < lang['ohm'].length) ) {
				resist /= 1000;
				++metric;
			}
			//добавляем текст о результате
			text.push(lang['res_success'] + ': <b>' + resist.toString().slice(0, 7) + ' ' + lang['ohm'][metric].toString() + '</b>');
			//добавляем текст о стандарте
			text.push(lang['standart'] + ': <b>' + lang['SMD_'+res.type] + '</b>');
		}
		return text;
	}

	/*
		функция, связывающая получение и сопротивление с интерфейсом
		lang - лингвистический объект
	*/
	this.writeRes = function(lang) {
		//получаем значение из формы
		var mark = $('#marking').val();
		var text = this.textRes(mark, lang);
		// очищаем предыдущие результаты
		$('#result').text('');
		// выводим текст
		for (key in text) {
			$('#result').append(text[key] + '<br>');
		}
		$('#result').show();
	}

	// Считывает GET переменные из URL страницы и возвращает их в объекте
	this.getUrlVars = function() {
	    var vars = {}, hash;
	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    for(var i = 0; i < hashes.length; i++)
	    {
	        hash = hashes[i].split('=');
	        vars[hash[0]] = hash[1];
	    }
	    return vars;
	}

	/*
		пытаемся запустить задачу из URL-параметров
		lang - лингвистический объект
	*/
	this.execFromURL = function(lang) {
		//парсим запрос
		var vars = this.getUrlVars();
		//тип калька
		if (vars['type-calc'] !== undefined) {
			//ищем маркировку
			if (vars['type-calc'].toString() === '1') {
				//смена типа калькулятора
				$('#type-calc-mark').trigger('change');
				//ввод и заполнение данных
				if (vars['resist'] === undefined) return false;
				$('#resist').val(vars['resist']);
				vars['ohm'] = vars['ohm'] === undefined ? '0' : vars['ohm'];
				var selectOhm = $('#ohm>[value="' + vars['ohm'] + '"]');
				if (selectOhm.length > 0) {
					$('#ohm').children().removeAttr('selected');
					$(selectOhm).attr('selected', 'selected');
				}
				//вызываем калькулятор
				this.writeSMD(lang);
			//ищем сопротивление
			} else {
				//смена типа калькулятора
				$('#type-calc-resist').trigger('change');
				//ввод и заполнение данных
				if (vars['marking'] === undefined) return false;
				$('#marking').val(vars['marking']);
				//вызываем калькулятор
				this.writeRes(lang);
			}
		}
		return false;
	}

}

$(document).ready(function() {
	smd = new SMD();

	//обработка нажатия на кнопку
	$('#smd-form').on('submit', function() {
		//определяем, какой кальк запускать и запускаем
		var typeCalc = $('[name=type-calc]:checked').val();
		if (typeCalc === '1') {
			try {
				smd.writeSMD(lang);
			} finally {
				return false;
			}
		} else {
			try {
				smd.writeRes(lang);
			} finally {
				return false;
			}
		}		
	});

	//смена режима калькулятора
	$('#type-calc-mark').on('change', function() {
		$('[name=type-calc]').removeAttr('checked');
		$(this).attr('checked', 'checked');
		$('.wrap-resist').show();
		$('.wrap-ohm').show();
		$('.wrap-marking').hide();
	});
	$('#type-calc-resist').on('change', function() {
		$('[name=type-calc]').removeAttr('checked');
		$(this).attr('checked', 'checked');
		$('.wrap-resist').hide();
		$('.wrap-ohm').hide();
		$('.wrap-marking').show();
	});


	//пытаемся вызвать обработчик URL, ошибки не обрабатываем
	try {
		smd.execFromURL(lang);
	} finally {
		//do nothing
	}

});

lang = {
        'standart' : 'Стандарт',
        'SMD_R' : 'SMD-код с буквой R',
        'SMD_S' : 'Стандартный SMD-код',
        'SMD_E' : 'SMD-код по стандарту EIA-96',
        'SMD_none' : 'SMD-кодов не найдено',
        'res_success' : 'Сопротивление равно',
        'res_none' : 'Сопротивление не найдено. Проверьте правильность ввода маркировки.',
        'ohm' : [
            'Ом',
            'кОм',
            'МОм',
            'ГОм',
        ]
    };