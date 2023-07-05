<?php 

if(empty($groups)){
    ?><div class="">No Group Found!</div><?php 
}else{ ?>
<div class="group">
    <?php foreach($groups as $group){ ?>
        <table class="table">
            <tr>
                <td><?=$group->post_title;?></td>
            </tr>
            <tr>
                <td><?=$group->post_content;?></td>
                <td><img src="<?=get_the_post_thumbnail_url($group->ID, 'medium')?>"></td>
            </tr>
        </table>
    <?php } ?>
</div>
<?php } ?>