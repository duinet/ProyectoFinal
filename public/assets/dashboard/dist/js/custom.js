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

    $('#example').DataTable(
        {
            responsive: true,
            autoWidth: true,
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ]
        }
    );
    
    // $tamano = $(window).width();
    $campoL = $('#camposL').text();
    if($campoL.length > 50){
        var text = $campoL.substring(0, 30);
        console.log(text);
        // $('#camposL').html(text);
        document.querySelector('#camposL').innerHTML = text;
        console.log($('#camposL').text());
    }
}); 