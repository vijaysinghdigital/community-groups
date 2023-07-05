
<form method="post">
    <div class="row">   
        <select name="group_id" id="group" class="cg_groups">
            <option value="">Select Group</option>
            <?php if(isset($groups) && !empty($groups)){ ?>
                <?php foreach ($groups as  $group) {?>
                    <option value="<?=$group->ID;?>"><?=$group->post_title;?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <select name="category_id" id="category" class="cg_groups">
            <option value="">Select Category</option>
            <?php if(isset($categories) && !empty($categories)){ ?>
                <?php foreach ($categories as  $category) {?>
                    <option value="<?=$category->term_id;?>"><?=$category->name;?></option>
                <?php } ?>
            <?php } ?>
        </select>

        <select name="leader_id" id="leader" class="cg_groups">
            <option value="">Select Leader</option>
            <?php if(isset($leaders) && !empty($leaders)){ ?>
                <?php foreach ($leaders as  $leader) {?>
                    <option value="<?=$leader->ID;?>"><?=$leader->post_title;?></option>
                <?php } ?>
            <?php }?>
        </select>
    </div>
</form>

<div class="ajax-response">

</div>

