$(document).ready(function(){
    $("input:checkbox").change(function() { 
        url = window.location.pathname;
        if($(this).is(":checked")) {
            $("input:checkbox").attr(checked="yes");
            $.ajax({
                url: url+'/activate/' + $(this).attr("name"),
                type: 'GET',
            });
        } else {
            $.ajax({
                url: url+'/desactivate/' + $(this).attr("name"),
                type: 'GET',
            });
        }
    });
}); 