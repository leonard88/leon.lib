<?php

/**
 * Description of Console
 * created on 2012.05.05.
 * @author leon
 */

namespace leon\lib;

/**
 * Description of Console class: 
 * It is helps the debugging. 
 */
class Console {
    
    /**
     * Stores the console msgs.
     * @var string
     */
    protected static $_msgs = "";
    
    /**
     * Console "user"
     * @var string 
     */
    protected static $_user = "~";
    
    /**
     * Returns the console with the given params.
     * @param mixed $output_condition1 The first part of the $output_condition1 
     * == $output_condition2. If the whole condition is true it will show the msgs.
     * @param mixed $output_condition2 The second part of the $output_condition1 
     * == $output_condition2. If the whole condition is true it will show the msgs.
     * @param string $else_msg If the condition is false this msg will show.
     * @param int $tabs Count of tabs. Helps formatting the source code.
     * @param string $html_id Helps to style the output over css.
     * @param bool $visible_no_output_msg If it is true the "No console output" 
     * & $else_msg will be not commented. 
     * @param string $ending Helps to format the source code.
     * @return string 
     */
    static function out($output_condition1 = null, $output_condition2 = null, $else_msg = "Console output is not shown", $tabs = 0, $html_id = "console", $visible_no_output_msg = false, $ending = ""){
      
        $ts = $ts2 = "";
        
        for ($i = 0; $i < (int)$tabs + 1; $i++) $ts .= "\t";
        for ($i = 0; $i < (int)$tabs; $i++) $ts2 .= "\t";
        
        if (self::$_msgs == ""){
            if ($visible_no_output_msg) return "$ts2<div id=\"$html_id\">\n{$ts}No console output\n$ts2</div>$ending"; 
            else return "<!--No console output-->$ending";
        }
        
        if ($output_condition1) return $output_condition1 == $output_condition2 
            ? "$ts2<div id=\"$html_id\">\n$ts" . str_replace("\n", "\n$ts", self::$_msgs) . "\n$ts2</div>$ending"
            : ($visible_no_output_msg 
                ? "$ts2<div id=\"$html_id\">\n$ts$else_msg\n$ts2</div>$ending"
                : "<!--$else_msg-->$ending"
            ); 
         
        return "$ts2<div id=\"$html_id\">\n$ts" . str_replace("\n", "\n$ts", self::$_msgs) . "\n$ts2</div>$ending";
    }
    
    static function add($msg, $title = "warning", $post_sign = "!", $pre_sign = "", $html_class = "title"){
        
        if (strlen(self::$_msgs) > 0) self::$_msgs .= "<br />\n";
        
        self::$_msgs .= "<span class=\"$html_class\">" . self::$_user . "::$title></span> $pre_sign$msg$post_sign";
    }
    
    /**
     * Sets the user of the message who created it.
     * @param string $user 
     */
    static function setUser($user){
        self::$_user = $user;
    }
    
    /**
     * Cleares msgs - if you use the ::out() method more than once it could be useful. 
     */
    static function clearBuffer(){
        self::$_msgs = "";
    }
}

?>
