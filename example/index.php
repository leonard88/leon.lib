<?php
/**
 * Description of index
 * created on 2012.05.03.
 * @author leon
 * Lists the available examples.
 * This file will use leon.lib NEVER. 
 */
    define('DEFAULT_MSG', 'There are no available examples!');
    
    $examples = DEFAULT_MSG;

    if (($handle = opendir('.'))) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != ".." && substr($entry, 0, 7) == 'example') {
                if ($examples == DEFAULT_MSG) $examples = "<ul>\n";
                $NO = (int) substr($entry, 7, strlen($entry) - 3);
                $examples .= "<li><a href=\"$entry\">Example $NO</a></li>\n";
            }
        }
        closedir($handle);
    }
    if ($examples != DEFAULT_MSG) $examples .= "</ul>";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>List of available examples</title>
    </head>
    <body>
        <h1>Examples</h1>
        <?= $examples ?>
    </body>
</html>