function rnd(ob)
   {
return Math.round(100*ob) / 100;
}


function calculate()
{
    var hp;
   var va=$("#col").val();
   var type=$("#type").val();
   var from=$("#from").val();
   var to=$("#to").val();
      //alert("welcome"+va+",,,"+type+",,,"+from+",,,"+to);
       // var act=$("#act").val();
       if(va=="")
        {
            alert("Введите значение" );
            $("#col").focus();
        }
        else if(from==to)
        {
            alert("Единицы конвертации совпадают, измените их");
        }
        else
        {
           if(type==1)
           {
           hp=746;
           if(from==1 && to==2)
           {
           
           var v=rnd(va*hp);
           v=v+" Ватт";
           $("#need").val(v);
           }
           else if(from==2 && to==1)
           {
           v=rnd(va/hp);
           v=v+" л.с. (лошадиные силы)";
           $("#need").val(v);
           }
           else
           {
            alert("Введите обязательные данные");
           }
           }
           if(type==2)
           {
           hp=745.699872;
           if(from==1 && to==2)
           {
            var v=rnd(va*hp);
           v=v+" Ватт";
           $("#need").val(v);
           }
           else if(from==2 && to==1)
           {
            v=rnd(va/hp);
           v=v+" л.с. (лошадиные силы)";
           $("#need").val(v);
           }
           else
           {
            alert("Введите обязательные данные");
           }
            
           }
           if(type==3)
           {
           hp=735.49875;
            if(from==1 && to==2)
           {
           var v=rnd(va*hp);
           v=v+" Ватт";
           $("#need").val(v);
           }
           else if(from==2 && to==1)
           {
            v=rnd(va/hp);
           v=v+" л.с. (лошадиные силы)";
           $("#need").val(v);
           }
           else
           {
            alert("Введите обязательные данные");
           }
            
           }
        }
}