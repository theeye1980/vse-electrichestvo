function proverka(input) { 
    var value = input.value; 
    var rep = /[-\,;":'a-zA-Zа-яА-Я]/; 
    if (rep.test(value)) { 
        value = value.replace(rep, ''); 
        input.value = value; 
    } 
} 



function inputCheck()
 {
  if(document.getElementById('frmSt').elements['len'].value == false) {alert("Заполните недостающие поля"); return false;}
  if(document.getElementById('frmSt').elements['width'].value == false) {alert("Заполните недостающие поля"); return false;}
  if(document.getElementById('frmSt').elements['lQuant'].value == false) {alert("Заполните недостающие поля"); return false;}
  return true;
 }
 function typeDefine(roomType)
 {
  var uPowFil = 0; var uPowHal = 0; var uPowDll = 0; var uPowsdl = 0;
  if (roomType == "det") {uPowFil = 70; uPowHal = 50; uPowDll = 18; uPowsdl = 6;}
  if (roomType == "gost") {uPowFil = 35; uPowHal = 30; uPowDll = 9; uPowsdl = 3;}
  if (roomType == "spal") {uPowFil = 20; uPowHal = 17; uPowDll = 5; uPowsdl = 2;}
  if (roomType == "kor") {uPowFil = 15; uPowHal = 13; uPowDll = 4; uPowsdl = 2;}
  if (roomType == "kux") {uPowFil = 40; uPowHal = 35; uPowDll = 10; uPowsdl = 3;}
  if (roomType == "van") {uPowFil = 30; uPowHal = 27; uPowDll = 8; uPowsdl = 3;}
  if (roomType == "klad"){uPowFil = 15; uPowHal = 13; uPowDll = 4; uPowsdl = 2;}
  if (document.getElementById('frmSt').lType[0].checked) uPow = uPowFil;
  if (document.getElementById('frmSt').lType[1].checked) uPow = uPowHal;
  if (document.getElementById('frmSt').lType[2].checked) uPow = uPowDll;
  if (document.getElementById('frmSt').lType[3].checked) uPow = uPowsdl;
  return uPow;
 }
 function calculate(len, width, lQuant, roomType)
 {
  if(inputCheck())
  {
   len = parseFloat(len.replace(",", "."));
   width = parseFloat(width.replace(",", "."));
   lQuant = Math.floor(parseFloat(lQuant.replace(",", ".")));
   var rArea = len * width;
   var lPower = typeDefine(roomType) * rArea/lQuant;
   document.getElementById('frmSt').elements['lPower'].value = lPower.toFixed(2);
  }
 }