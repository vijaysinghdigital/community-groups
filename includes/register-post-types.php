<?php
function cg_register_post_type(){
    $custom_posts =  array(
        array(
            "name"=>"Groups",
            "post_type"=>"groups",
            "supports"=> array('title', 'editor', 'thumbnail'),
        ),
        array(
            "name"=>"Leader",
            "post_type"=>"leader",
            "supports"=> array('title'),
        )
    );
    foreach($custom_posts as $custom_post){
        register_post_type(
            $custom_post['post_type'],
            array(
                'labels'    =>  array (
                    'name' => $custom_post['name']
                ),
                'public'  =>  true,
                'supports'            => $custom_post['supports'],
            ),
        );
        
    }
    // if( 'groups' == get_current_screen()->post_type ) {
    //     add_action( 'admin_enqueue_scripts', 'cg_load_styles' );
    //   }
   
}
add_action("init","cg_register_post_type");


add_action('current_screen','cg_load_styles');
function cg_load_styles($screen){
    // echo "<pre>";
    // print_r($screen);die;
    if($screen->post_type=='groups'){
        wp_enqueue_style('cg-styles', CG_PLUGIN_URL.'assets/css/style.css');
    }
}
?>