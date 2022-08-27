<?
function hello($name, $style = 'Formal')
{
switch ($style) {
case 'Formal':
print "Good Day $name";
break;
case 'Informal':
print "Hi $name";
break;
case 'Australian':
print "G'day $name";
break;
default:
print "Hello $name";
break;
}
}
hello('Alice');
// Good Day Alice
hello('Alice', 'Australian');
// G'day Alice
?>