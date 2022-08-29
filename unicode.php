<?
if (!function_exists('codepoint_encode')) {
    function codepoint_encode($str) {
        return substr(json_encode($str), 1, -1);
    }
}
if (!function_exists('codepoint_decode')) {
    function codepoint_decode($str) {
    return json_decode(sprintf('"%s"', $str));
    }
}
//How to use:
echo "\\nUse JSON encoding / decoding\\n";
var_dump(codepoint_encode("我好"));
var_dump(codepoint_decode('\\u6211\\u597d'));
?>