<?php
class myClass {
    public function __construct() {
    $functionName = 'doSomething';
    $this->$functionName('Hello World');
    }
    private function doSomething($string) {
    echo $string; // Outputs "Hello World"
    }
}
?>