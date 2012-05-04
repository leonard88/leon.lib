<?php
/**
 * Description of example1
 * created on 2012.05.03.
 * @author leon
 * 
 * File to show examples about using leon.lib.
 */

    //How to use leon.lib

    //Initializing

    require_once("../Init.php"); //you can use an auto-loader too.
    
    echo "<pre>";
    
    //Prepares the leon.lib.
    //The true parameter indicates the we want to verbose msgs.
    leon\lib\Init::prepare(true);
    //Test: Is leon.lib initialized?
    leon\lib\Init::test();
    
    //Cant be used after destroy. 
    leon\lib\Init::destroy();
    leon\lib\Init::test();

    echo "</pre>";
    
    //Example 2 shows an auto-loader solution.
?>
