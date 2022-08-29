<?
// a double colon indicates the value may be omitted
$shortopts = "hf:v::d";
// GNU-style long options are not required
$longopts = ["help", "version"];
$opts = getopt($shortopts, $longopts);
// options without values are assigned a value of boolean false
// you must check their existence, not their truthiness
if (isset($opts["h"]) || isset($opts["help"])) {
fprintf(STDERR, "Here is some help!\n");
exit;
}
// long options are called with two hyphens: "--version"
if (isset($opts["version"])) {
fprintf(STDERR, "%s Version 223.45" . PHP_EOL, $argv[0]);
exit;
}
// options with values can be called like "-f foo", "-ffoo", or "-f=foo"
$file = "";
if (isset($opts["f"])) {
$file = $opts["f"];
}
if (empty($file)) {
fprintf(STDERR, "We wanted a file!" . PHP_EOL);
exit(1);
}
fprintf(STDOUT, "File is %s" . PHP_EOL, $file);
// options with optional values must be called like "-v5" or "-v=5"
$verbosity = 0;
if (isset($opts["v"])) {
$verbosity = ($opts["v"] === false) ? 1 : (int)$opts["v"];
}
fprintf(STDOUT, "Verbosity is %d" . PHP_EOL, $verbosity);
// options called multiple times are passed as an array
$debug = 0;
if (isset($opts["d"])) {
$debug = is_array($opts["d"]) ? count($opts["d"]) : 1;
}
fprintf(STDOUT, "Debug is %d" . PHP_EOL, $debug);
// there is no automated way for getopt to handle unexpected options
?>