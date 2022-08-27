<?
//Null can be assigned to any variable. It represents a variable with no value.
$foo = null;

//Boolean This is the simplest type with only two possible values.
$foo = true;
$bar = false;

//Booleans can be used to control the flow of code.
$foo = true;
if ($foo) {
echo "true";
} else {
echo "false";
}

//Integer
//An integer is a whole number positive or negative.

$foo = -3; // negative
$foo = 0;
// zero (can also be null or false (as boolean)
$foo = 123; // positive decimal
$bar = 0123; // octal = 83 decimal
$bar = 0xAB; // hexadecimal = 171 decimal
$bar = 0b1010; // binary = 10 decimal
var_dump(0123, 0xAB, 0b1010); // output: int(83) int(171) int(10)


//Floating point numbers, "doubles" or simply called "floats" are decimal numbers.
$foo = 1.23;
$foo = 10.0;
$bar = -INF;
$bar = NAN;

//An array is like a list of values. The simplest form of an array is indexed by integer, and ordered by the index, with the first element lying at index 0.
$foo = array(1, 2, 3); // An array of integers
$bar = ["A", true, 123 => 5]; // Short array syntax, PHP 5.4+
echo $bar[0];
// Returns "A"
echo $bar[1];
// Returns true
echo $bar[123]; // Returns 5
echo $bar[1234]; // Returns null

//Arrays can also associate a key other than an integer index to a value.
$array = array();
$array["foo"] = "bar";
$array["baz"] = "quux";
$array[42] = "hello";
echo $array["foo"]; // Outputs "bar"
echo $array["bar"]; // Outputs "quux"
echo $array[42]; // Outputs "hello"

//String
//A string is like an array of characters.
$foo = "bar";
//Like an array, a string can be indexed to return its individual characters:
$foo = "bar";
echo $foo[0]; // Prints 'b', the first character of the string in $foo.

//An object is an instance of a class. Its variables and methods can be accessed with the -> operator.
$foo = new stdClass(); // create new object of class stdClass, which a predefined, empty class
$foo->bar = "baz";
echo $foo->bar; // Outputs "baz"
// Or we can cast an array to an object:
$quux = (object) ["foo" => "bar"];
echo $quux->foo; // This outputs "bar".

//Resource variables hold special handles to opened files, database connections, streams, image canvas areas and the like

$fp = fopen('file.txt', 'r'); // fopen() is the function to open a file on disk as a resource.
var_dump($fp); // output: resource(2) of type (stream)

//To get the type of a variable as a string, use the gettype() function:
echo gettype(1); // outputs "integer"
echo gettype(true); // "boolean"

?>