$(document).ready(function(){
    $("input:checkbox").change(function() { 
        url = window.location.pathname;
        if($(this).is(":checked")) {
            console.log(url);
            // console.log("Hola");
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