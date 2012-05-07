<?php
/**
 * Description of exampleN
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

    //Example n-1 ...
    //Example n+2 ...
?>
<!DOCTYPE hmtl>
<html>
    <head>
        <title>Example N</title>
        <link rel="stylesheet" href="css/examples.css">
    </head>
    <body>
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