<?php
/**
 * 
 * 
 */
Class Shortcodes{
    public function __construct(){
        add_shortcode("community_groups", array($this , "process_community_groups"));
    }

    public function process_community_groups(){
        ob_start();
        $groups = get_posts(['post_type'=>'groups','post_status'=>'publish','posts_per_page'=>-1]);

        $categories = get_terms( array('taxonomy' => 'group-types', "hide_empty" => false) );

        $leaders = get_posts(['post_type'=>'leader','post_status'=>'publish','posts_per_page'=>-1]);
        include_once CG_PLUGIN_DIR.'/templates/group-form.php';
        $content = ob_get_clean();
        return $content;
    }

}

new Shortcodes;