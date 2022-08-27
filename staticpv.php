<?php
//Static class properties that are defined with the public visibility are functionally the same as global variables. They can be accessed from anywhere the class is defined.

class SomeClass {
    public static int $counter = 0;
    }
    // The static $counter variable can be read/written from anywhere
    // and doesn't require an instantiation of the class
    SomeClass::$counter += 1;

    class Singleton {
        public static function getInstance() {
        // Static variable $instance is not deleted when the function ends
        static $instance;
        // Second call to this function will not get into the if-statement,
        // Because an instance of Singleton is now stored in the $instance
        // variable and is persisted through multiple calls
        if (!$instance) {
        // First call to this function will reach this line,
        // because the $instance has only been declared, not initialized
        $instance = new Singleton();
        }
        return $instance;
}
}
$instance1 = Singleton::getInstance();
$instance2 = Singleton::getInstance();
// Comparing objects with the '===' operator checks whether they are
// the same instance. Will print 'true', because the static $instance
// variable in the getInstance() method is persisted through multiple calls
var_dump($instance1 === $instance2);

?>