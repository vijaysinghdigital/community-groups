<?php
/**
 * 
 */
function cg_register_taxonomies(){
    $args = array(
		'label'        => __( 'Group Types', 'community-groups' ),
		'rewrite'      => false,
		'hierarchical' => true
	);
	
	register_taxonomy( 'group-types', 'groups', $args );
}
add_action('init','cg_register_taxonomies');
?>