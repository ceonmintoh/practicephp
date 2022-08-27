<?php echo "No error"; // no closing tag is needed as long as there is no code below

//<?php
echo "This will cause an error if you leave out the closing tag";

//So, your code should basically look like this:
//<?php
echo "Here we use a semicolon!";
echo "Here as well!";
echo "Here as well!";
echo "Here we use a semicolon and a closing tag because more code follows";
?>
<p>Some HTML code goes here</p>
<?php
echo "Here we use a semicolon!";
echo "Here as well!";
echo "Here as well!";
echo "Here we use a semicolon and a closing tag because more code follows";
?>
<p>Some HTML code goes here</p>
<?php
echo "Here we use a semicolon!";
echo "Here as well!";
echo "Here as well!";
echo "Here we use a semicolon but leave out the closing tag";
?>