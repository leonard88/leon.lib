<?php
/**
 * Description of example3
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
    //title/type of the message
    leon\lib\Console::add("test2", "testtitle");
    
    //set the username (application name or application acronym)
    leon\lib\Console::setUser("e3");//example3 acronym

    //the end of the message: '.'
    leon\lib\Console::add("test3", "testtitle", ".");
    //the begin of the message: '#'
    leon\lib\Console::add("test4", "testtitle", ".", "#");
    //the css class of the message: 'testclass'
    leon\lib\Console::add("test5", "testtitle", ".", "#", "testclass");
    

    //Example 2 shows an auto-loader solution.
    //Example 4 shows how to use leon\lib\Base::redirect()
?>
<!DOCTYPE hmtl>
<html>
    <head>
        <title>Example 3 - How to use leon.lib.Console</title>
        <link rel="stylesheet" href="css/examples.css">
        <link rel="stylesheet" href="css/example3.css">
    </head>
    <body>
        <?php 
            //static function out($output_condition1 = null, $output_condition2 = null, $else_msg = "Console output is not shown", $tabs = 0, $html_id = "console", $visible_no_output_msg = false, $ending = "")
        
            echo "Shows added messages";
            //with default parameters
            echo leon\lib\Console::out(); 
        
            echo "<br />\nFalse condition - see the source code, comment appeared (no visible output)\n";
            //could be a bad condition
            $test_cond1 = "testcondition";
            echo leon\lib\Console::out($test_cond1); //output will be not generated just html comments.
            
            echo "<br />\nOutput messages (the condition has completed)\n";
            //if condition result is true
            $test_cond2 = $test_cond1;
            echo leon\lib\Console::out($test_cond1, $test_cond2); //will output the messages.

            echo "<br />\nSee the source code, another else message is shown (than the default) (no visible output)\n";
            //different else msg - see the html sourcecode if you want to see.
            echo leon\lib\Console::out($test_cond1, "", "Another else message"); 


            echo "<br />\nSee the source code, tabs are inserted before of all console lines\n";
            //formatting output by tabs - see the html source code
            echo leon\lib\Console::out($test_cond1, $test_cond2, "Don't need else message", 2); 
            
            echo "<br />\nHTML id (e3console) for the console's div\n";
            //setting another id for console - use in css/example3.css
            echo leon\lib\Console::out($test_cond1, $test_cond2, "Don't need else message", 2, "e3console"); 
            
            echo "<br />\nError message (because of the uncompleted condition) will be shown\n";
            //Lets show the error message - not in comment
            echo leon\lib\Console::out($test_cond1, "", "Another visible error message because of the uncompleted condition", 2, "e3console", true);
            
            echo "<br />\nSee the source code, new line is inserted after the console's div\n";
            //formatting the code - after the console's div will insert a new line character.
            echo leon\lib\Console::out($test_cond1, $test_cond2, "Don't need else message", 2, "e3console", true, "\n"); 
            
            //remove all previous msgs
            leon\lib\Console::clearBuffer();
            
            echo "<br />\nNo output msg\n";
            //will show : no output
            echo leon\lib\Console::out($test_cond1, $test_cond2, "Don't need else message", 2, "e3console", true); 
        ?>
        
        <?php
            //navigation
            $uri = explode("/", $_SERVER["REQUEST_URI"]);
            $index = str_replace(array("example", ".php"), "", $uri[count($uri) - 1]);

            $uri[count($uri) - 1] = "";
            $uri = implode("/", $uri);

            
            $next = $uri . "example" . ($index + 1) . ".php";
            if (!file_exists(__DIR__."\\example" . ($index + 1) . ".php")) $next = $uri;
            
            $previous = $uri . "example" . ($index - 1) . ".php";
            if ($index == 1) $previous = "";
            
            echo "<br /><br /><br />";
            echo "<nav>";
            echo "<a href=\"" . $uri . "\">examples</a>: <a href=\"$previous\">" . htmlspecialchars("<<") . "previous</a> | <a href=\"$next\">next" . htmlspecialchars(">>") . "</a>";
            echo "</nav>";
        ?>
    </body>
</html>