<?php
/**
 * Description of LeonLibInit
 * created on 2012.05.04.
 * @author leon
 * 
 * This class need to be called if you wish to use leon.lib.
 * Here is possible to set additional/plugin library locations too.
 * Default plugin library (/plugin) is set.
 */

namespace leon\lib;

/**
 * Initialize the leon.lib.
 * This class need to be called before leon.lib usage. 
 */
class Init {

    /**
     * Verbose messages.
     * @var bool 
     */
    private static $_verbose = true;
    
    /**
     * Is leon.lib ready for usage?
     * @var type 
     */
    private static $_prepared = false;
    
    /**
     * Prepares the library
     * @param bool $use_default_plugin_dir If false this will not include the /plugin directory. 
     */
    public static function prepare($verbose = false, $use_default_plugin_dir = true) {
        self::$_verbose = $verbose;
        
        spl_autoload_register(array(new Init(), 'loader'));
        
        self::$_prepared = true;
        
        if (self::$_verbose) echo "Init::prepare() was called.\n";
    }
    
    private function loader($class_name){
        require_once __DIR__ . "/lib/" . array_pop(explode("\\", $class_name)) . ".php";
    }
    
    /**
     * Test Is the leon.lib initialized correctly? 
     * @return boolean true if leon.lib prepared, false if not. 
     */
    public static function test(){
        if (self::$_prepared){
            if (self::$_verbose) echo "Leon.lib is initialized.\n";
            return true;
        }
        else{
            if (self::$_verbose) echo "Leon.lib is not prepared for usage!\nCall: Init::prepare()\n";
            return false;
        }
    }
    
    /**
     * Destroys leon.lib.
     * After this function-call the library can't be used.
     * To reuse call Init::prepare(...). 
     */
    public static function destroy(){
        self::$_prepared = false;
        if (self::$_verbose) echo "Init::destroy() was called.\n";
    }
}
?>
