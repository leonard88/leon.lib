<?php
/**
 * Description of example2
 * created on 2012.05.03.
 * @author leon
 * 
 * File to show examples about using leon.lib.
 */

    //How to use leon.lib.Console

    //Initializing

    require_once("../Init.php"); //you can use an auto-loader too.
    
    //Prepares the leon.lib.
    leon\lib\Init::prepare();
    
    //static function add($msg, $title = "warning", $post_sign = "!", $pre_sign = "",
    //$html_class = "title")
    leon\lib\Console::add("test1");
    leon\lib\Console::add("test2", "testtitle");
    
    //set the username (application name or application acronym)
    leon\lib\Console::setUser("e3");//example3 acronym

    leon\lib\Console::add("test3", "testtitle", ".");
    leon\lib\Console::add("test4", "testtitle", ".", "#");
    leon\lib\Console::add("test5", "testtitle", ".", "#", "testclass");
    

    //Example 2 shows an auto-loader solution.
    //Example 4 ...
?>
<!DOCTYPE hmtl>
<html>
    <head>
        <title>Example 3 - How to use leon.lib.Console</title>
        <link rel="stylesheet" href="css/example3.css">
    </head>
    <body>
        <?php 
            //static function out($output_condition1 = null, $output_condition2 = null, $else_msg = "Console output is not shown", $tabs = 0, $html_id = "console", $visible_no_output_msg = false)
        
            //with default parameters
            echo leon\lib\Console::out(); 
        
            echo "<br />\n";
            //could be a bad condition
            $test_cond1 = "testcondition";
            echo leon\lib\Console::out($test_cond1); //output will be not generated just html comments.
            
            echo "<br />\n";
            //if condition result is true
            $test_cond2 = $test_cond1;
            echo leon\lib\Console::out($test_cond1, $test_cond2); //will output the messages.

            echo "<br />\n";
            //different else msg - see the html sourcecode if you want to see.
            echo leon\lib\Console::out($test_cond1, "", "Another else message"); 


            echo "<br />\n";
            //formatting output by tabs - see the html source code
            echo leon\lib\Console::out($test_cond1, $test_cond2, "Don't need else message", 2); 
            
            echo "<br />\n";
            //setting another id for console - use in css/example3.css
            echo leon\lib\Console::out($test_cond1, $test_cond2, "Don't need else message", 2, "e3console"); 
            
            echo "<br />\n";
            //Lets show the error message - not in comment
            echo leon\lib\Console::out($test_cond1, "", "Another visible error message because of the uncompleted condition", 2, "e3console", true);
            
            //remove all previous msgs
            leon\lib\Console::clearBuffer();
            
            echo "<br />\n";
            //will show : no output
            echo leon\lib\Console::out($test_cond1, $test_cond2, "Don't need else message", 2, "e3console", true); 
        ?>
    </body>
</html>