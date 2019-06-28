var fx=0;
var zx=0;
var cx=0;
var compset=0;
var corr=0;
function setunits(form, sunit)
  {
  if (sunit == 'ckГц')
    {
     form.funit.value='kГц';
     form.cunit.value='нФ';
     form.zunit.value='Ом';
     compset = 1;
     corr = 1e6;
    }
  if (sunit == 'cMГц')
    {
     form.funit.value='MГц';
     form.cunit.value='пФ';
     form.zunit.value='Ом';
     compset = 2;
     corr = 1e6;
    }
  if (sunit == 'lkГц')
    {
     form.funit.value='kГц';
     form.cunit.value='мГн';
     form.zunit.value='Ом';
     compset = 3;
     corr = 1;
    }
  if (sunit == 'lMГц')
    {
     form.funit.value='MГц';
     form.cunit.value='мкГн';
     form.zunit.value='Ом';
     compset = 4;
     corr = 1;
    }
  }
function calcF(form)
  {
   if (compset == 0)
     {
      alert('Выберите единицы измерения');
      return;
     }
   zx = parseFloat(form.imp.value);
   cx = parseFloat(form.comp.value);
   if (compset == 1 || compset == 2)
     {
      fx = 2 * Math.PI * zx * cx;
      fx = 1/fx;
     }
   if (compset == 3 || compset == 4)
     {
      fx = zx / (2 * Math.PI * cx);
     }
   fx = fx * corr; 
   fx = Math.round(fx * 100000) / 100000
   if (fx >= 100)
     {
      fx = Math.round(fx * 10000) / 10000; 
     }
   if (fx >= 1000)
     {
      fx = Math.round(fx * 1000) / 1000; 
     }
   form.freq.value=parseFloat(fx); 
  }
function calcC(form)
  {
   if (compset == 0)
     {
      alert('Выберите единицы измерения');
      return;
     }
   fx = parseFloat(form.freq.value);
   zx = parseFloat(form.imp.value);
   if (compset == 1 || compset == 2)
     {
      cx = 2 * Math.PI * fx * zx;
      cx = 1/cx;
     }
   if (compset == 3 || compset == 4)
     {
      cx = zx / (2 * Math.PI * fx);
     }
   cx = cx * corr;
   cx = Math.round(cx * 100000) / 100000
   if (cx >= 100)
     {
      cx = Math.round(cx * 10000) / 10000; 
     }
   if (cx >= 1000)
     {
      cx = Math.round(cx * 1000) / 1000; 
     }
   form.comp.value=parseFloat(cx); 
  }
function calcZ(form)
  {
   if (compset == 0)
     {
      alert('Выберите единицы измерения');
      return;
     }
   fx = parseFloat(form.freq.value);
   cx = parseFloat(form.comp.value);
   if (compset == 1 || compset == 2)
     {
      zx = 2 * Math.PI * fx * cx;
      zx = 1/zx;
     }
   if (compset == 3 || compset == 4)
     {
      zx = 2 * Math.PI * fx * cx;
     }
   zx = zx * corr;
   zx = Math.round(zx * 100000) / 100000
   if (zx >= 100)
     {
      zx = Math.round(zx * 10000) / 10000; 
     }
   if (zx >= 1000)
     {
      zx = Math.round(zx * 1000) / 1000; 
     }
   form.imp.value=parseFloat(zx); 
  }