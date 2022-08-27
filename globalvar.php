<?
//Global variable best practices
//We can illustrate this problem with the following pseudo-code
function foo() {
global $bob;
$bob->doSomething();
}
//Your first question here is an obvious one
//Where did $bob come from?
//Are you confused? Good. You've just learned why globals are confusing and considered a bad practice.


//Since virtually all PHP programs make use of code like include('file.php');
//your job maintaining code like this becomes exponentially harder the more files you add.

//$dbConnector = new DBConnector(...);
function doSomething() {
global $dbConnector;
$dbConnector->execute("...");
}

/**
* @test
*/
function testSomething() {
    global $dbConnector;
    $bkp = $dbConnector; // Make backup
    $dbConnector = Mock::create('DBConnector'); // Override
    assertTrue(foo());
    $dbConnector = $bkp; // Restore
    }


//How do we avoid Globals?
//The best way to avoid globals is a philosophy called Dependency Injection.

    function foo(\Bar $bob) {
    $bob->doSomething();
    }


?>