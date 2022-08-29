<?
//Using the send()-function to pass values to a generator

//Imagining accessing a large amount of data from a server, here is the generator for this:
function generateDataFromServerDemo(){
    $indexCurrentRun = 0; //In this example in place of data from the server, I just send feedback every time a loop ran through.
    $timeout = false;
    while (!$timeout){
        $timeout = yield $indexCurrentRun; 
        // Values are passed to caller. The next time the generator is called, it will start at this statement. If send() is used, $timeout will take this value.
        $indexCurrentRun++;
    }
    yield 'X of bytes are missing. </br>';
    }
    // Start using the generator
    $generatorDataFromServer = generateDataFromServerDemo ();
    foreach($generatorDataFromServer as $numberOfRuns){
    if ($numberOfRuns < 10)
        {
            echo $numberOfRuns . "</br>";
        }
    else
        {
        $generatorDataFromServer->send(true); //sending data to the generator
        echo $generatorDataFromServer->current(); //accessing the latest element (hinting how many bytes are still missing.
        }
    }
?>