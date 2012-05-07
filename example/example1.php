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