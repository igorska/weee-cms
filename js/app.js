$(function() {
    $(".comment_form_submit").click(function() {
        var model_name = $(this).attr('data-model_name');
        var model_id = $(this).attr('data-model_id');
        var text = $("#comment_form_" + model_name + "_" + model_id + " textarea[name='Comment[text]']").val();
        
        if (text != '') {
            $.ajax({
                url : '/comments/main/create',
                type : 'POST',
                dataType : 'json',
                data : $("#comment_form_" + model_name + "_" + model_id).serialize(),
                success : function (response) {
                    if (response.status == 'success') {
                        $("#comments_list_" + model_name + "_" + model_id).append(response.html);
                    }
                }
            })
        }
        return false;
    })
});