<?php
add_action('wp_enqueue_scripts',"cg_load_script");

function cg_load_script(){
    wp_enqueue_script( 'cg_script', CG_PLUGIN_URL.'assets/js/app.js', array('jquery'),  '1.0.0', true );    
    wp_localize_script( 'cg_script', 'CG_App',array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
}


function process_cg_filter_groups(){
    $response = [];
    $data = $_REQUEST;

    // if(!isset($data['filter_by']) || empty($data['id'])){
    //     if($data['filter_by']=='leader' && empty($data['id'])){
    //         $errors["warning"] = "Leader ID is missing.";
    //     }
    //     if($data['filter_by']=='group' && empty($data['id'])){
    //         $errors["warning"] = "Group ID is missing.";
    //     }
    //     if($data['filter_by']=='category' && empty($data['id'])){
    //         $errors["warning"] = "Category ID is missing.";
    //     }
    // }
 
    // if(!isset($errors)){

        if($data['filter_by']=='group'){
            $groups[] = get_post($data['id']);
        }else{

            $args = [
                "post_type" =>  "groups",
                "post_status" =>  "publish",
                "posts_per_page" =>  -1,
            ];

            if ($data['filter_by']=='category') {
                $args["tax_query"]  = [
                    [
                        "taxonomy"  =>  "group-types",
                        "field"  =>  "term_id",
                        "terms"  =>  $data['id'],
                    ]
                ];

            } elseif($data['filter_by']=='leader'){
                $args['meta_query']    =    [
                    [
                        "key"   =>  "_group_leaders",
                        "value" =>   "(^|,)".$data['id']."(,|$)",
                        "compare"   => 'REGEXP',
                    ]
                ];
            }

            $groups = get_posts($args);
        }
        
        // echo json_encode($groups); exit;
        ob_start();
        include_once CG_PLUGIN_DIR.'templates/groups.php';
        $content = ob_get_clean();
      
        $response = [
            "status" => "success",
            "data"    =>  $content
        ];
    // }else{
    //     $response = [
    //         "status" => "failed",
    //         "errors"    =>  $errors
    //     ];
    // }

    echo json_encode($response); die;
}
add_action("wp_ajax_cg_filter_groups","process_cg_filter_groups");
add_action("wp_ajax_nopriv_cg_filter_groups","process_cg_filter_groups");

?>