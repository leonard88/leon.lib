<?php
/**
 * Description of example4
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
    
    //without setting the url the redirection will send you to the default location (leon88.com)
    //leon\lib\Base::redirect(); //uncomment to see the result
    
    //without setting the url the redirection but setting the uri it will send you to defaultloc/uri
    //leon\lib\Base::redirect("example4.php"); //uncomment to see the result

    //it will redirect to here
    leon\lib\Base::$URL = $_SERVER["HTTP_HOST"];// may occur circulation
    //leon\lib\Base::redirect("example4.php"); //uncomment to see the result
    
    //Example 3 shows how to use leon\lib\Console
    //Example 5 ...
?>
<!DOCTYPE hmtl>
<html>
    <head>
        <title>Example 4</title>
        <link rel="stylesheet" href="css/examples.css">
    </head>
    <body>
        Uncomment the php code to see the results.
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