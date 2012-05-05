<?php
/**
 * Description of Base
 * created on 2012.05.04.
 * @author leon
 */

namespace leon\lib;

/**
 * Contains general functions.
 */
class Base {
    
    /**
     * Inserts a $value into the $array at the $position. The old values will be
     * shifted by one index.
     * @param array $array the input array (old array)
     * @param int $position the position of the value
     * @param mixed $value The inserted value
     * @return array value-inserted old array
     */
    static function array_insert(array $array, $position, $value){
       
        $c = count($array);
        
        $next = $array[$position];
        $array[$position] = $value;
        
        for ($i = $position + 1; $i <= $c; $i++){
            if ($i < $c) $value = $array[$i];
            $array[$i] = $next;
            $next = $value;
        }

        return $array;
    }
    
    /**
     * This will call a method of one or a bunch of $obj(s).
     * If $obj is array it will call all of the members of the array with the given 
     * method.
     * $param is optional. Call the $method with a $param.
     * @param mixed $obj Could be an array (wich is containg objs) or one object.
     * @param string $method
     * @param mixed $param 
     */
    static function call($obj, $method, $param = null){
        
        if (is_array($obj)) foreach($obj as $value){
            if ($param) $value->$method($param);
            else $value->$method();
        }
        else if ($param) $obj->$method($param);
        else $obj->$method();
    }
}

?>
