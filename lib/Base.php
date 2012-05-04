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
    
}

?>
