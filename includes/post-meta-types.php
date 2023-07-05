<?php

add_action('add_meta_boxes','cg_add_post_meta_types');

function cg_add_post_meta_types(){
  add_meta_box( 'group_leaders', 'Group Leaders', 'cg_form_meta_box_handler', 'groups' );

}

function cg_form_meta_box_handler($post){
    $leaders = get_posts(['post_type'=>'leader','post_status'=>'publish','posts_per_page'=>-1]);
    $selctedLeaders = get_post_meta($post->ID,'_group_leaders',true);
    if(!empty($selctedLeaders))
        $selctedLeaders  = explode(',',$selctedLeaders);
    ?>    
    <form method="post">
        <div class="row">
            <div class="col-25"><label>Leaders</label></div>
            <div class="col-75">
                <select name="_group_leaders[]" class="select cg-muliselect" multiple >
                    <option>Select Leaders</option>
                    <?php if(isset($leaders)){ foreach ($leaders as  $leader) {?>
                    <option value="<?=$leader->ID;?>" <?=(!empty($selctedLeaders) && in_array($leader->ID,$selctedLeaders)) ? 'selected' : ''?>><?=$leader->post_title;?></option>
                    <?php } }?>
                </select>
            </div>
        </div>
    </form>
    <?php
}

add_action( 'save_post', 'cg_save_postdata'); 
function cg_save_postdata ($post_id){
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $leaders = implode(",",$_POST['_group_leaders']);
        if(isset($leaders)){
            update_post_meta( $post_id, '_group_leaders', $leaders );
        }
    }
}
?>