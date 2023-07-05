<?php
/**
 * Plugin Name: Community Groups
 * Author: Avant Garde Digital Pvt Ltd
 * Description: Custom plugin created to many community groups.
 * 
 * 
 */


class CommunityGroups{

    public function __construct(){

        $this->setConstants();
        $this->includes();
    }

    public function setConstants(){

        if(!defined('CG_PLUGIN_DIR')){
            define("CG_PLUGIN_DIR", plugin_dir_path(__FILE__) );
        }

        if(!defined('CG_PLUGIN_URL')){
            define("CG_PLUGIN_URL", plugin_dir_url(__FILE__ ) );
        }
    }

    public function includes(){
        require_once CG_PLUGIN_DIR.'/includes/register-post-types.php';
        require_once CG_PLUGIN_DIR.'/includes/register-taxonomies.php';
        require_once CG_PLUGIN_DIR.'/includes/class-shortcodes.php';
        require_once CG_PLUGIN_DIR.'/includes/post-meta-types.php';
        require_once CG_PLUGIN_DIR.'/includes/misc-functions.php';
        require_once CG_PLUGIN_DIR.'/includes/action-hooks.php';        
        // require_once CG_PLUGIN_DIR.'/includes/classes/class-findInSet.php';   
        require_once CG_PLUGIN_DIR.'/includes/deactivate.php';     
    }
}

new CommunityGroups;
?>