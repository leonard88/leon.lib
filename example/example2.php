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