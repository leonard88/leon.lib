<?php
/**
 * Description of example2
 * created on 2012.05.03.
 * @author leon
 * 
 * File to show examples about using leon.lib.
 */

    //How to use leon.lib

    //Initializing
    
    define("DEFAULT_DIR", "../");

    function __autoload($class_name){//you can use require/include(_once) too
        require_once DEFAULT_DIR . array_pop(explode("\\", $class_name)) . ".php";
    }
    
    echo "<pre>";
    
    //Prepares the leon.lib.
    leon\lib\Init::prepare();
    //Example to show no need for other require or autoload to the leon.lib classes.
    $old = array("one", "two", "four", "five");
    echo "The old ";
    print_r($old);
    $new = leon\lib\Base::array_insert($old, 2, "three");
    echo "The new (insert value: \"three\" at position \"2\") ";
    print_r($new);
    echo "</pre>";
    
    //Example 1 shows require_once - init.
    //Example 3: How to use leon.lib.Console
?>