<?php 
function CG_getLeaders(){
    $leaders = get_posts(['post_type'=>'leader','post_status'=>'publish','posts_per_page'=>-1]);
    return $leaders;
}
?>