function calculator(form) {
a = eval (form.a.value);
b = eval (form.b.value);
w = eval (form.w.value);
q = eval (0.7);
e = eval (0.11);
r = eval (0.6);
rr = eval (0.8);
t = eval (24);
i = eval (30);
p = eval (1000);
j = eval (2.5);
v = eval (1500);
vv = eval (1250);

x = round(b*q);
z = round(b*e);
y = round(z*r);
c = round(b*a*t*i/p);
m = round(c*w);
//***Электрокотел***//
u = round(b*e);
h = round(z*rr);
f = round(c*j);
l = round(m*j);
g = round ((l)-(m));
s = round (b*v);
pd = round ((f)-(c));


document.getElementById('res1').innerHTML = z;
document.getElementById('res2').innerHTML = y;
document.getElementById('res3').innerHTML = c;
document.getElementById('res4').innerHTML = m;
document.getElementById('res5').innerHTML = u;
document.getElementById('res6').innerHTML = h;
document.getElementById('res7').innerHTML = f;
document.getElementById('res8').innerHTML = l;
document.getElementById('res9').innerHTML = g;
document.getElementById('res10').innerHTML = pd;
}
function round(A)
{
return Math.round(A*100)/100;
}