
jQuery(document).ready(function($){
    $(".cg_groups").on("change",function(){
        var filter_by = $(this).attr('id');
        var id = $(this).val();
        $('.cg_groups').each(function(){
            if($(this).attr('id')!=filter_by){
                $(this).val("");
            }
        });
        if(id!='' && typeof id!='undefined'){
            $.ajax({
                url:CG_App.ajax_url,
                type:"POST",
                data:{"action":"cg_filter_groups",'filter_by':filter_by,'id':id},
                dataType: 'JSON',
                success:function(response){
                    if(response.status == "success"){
                        $(".ajax-response").html(response.data);
                    } 
                }
            });
        } 
    });
});