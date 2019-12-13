function gestionar(){
    $("#estados").change(function(event){
        $.get("ciudades/"+event.target.value+"",function(response){
            for(i=0; i<response.length; i++){
                console.log(response[i].ciudad_nom);
                $("#ciudades").append("<option value='"+response[i].ciudad_id+"'>"+response[i].ciudad_nom+"</option")
            }
           
        });
    });
}
function gestionable(){
    $("#estados2").change(function(event){
        $.get("ciudades/"+event.target.value+"",function(response){
            for(i=0; i<response.length; i++){
                console.log(response[i].ciudad_nom);
                $("#ciudades2").append("<option value='"+response[i].ciudad_id+"'>"+response[i].ciudad_nom+"</option")
            }
           
        });
    });
}
    // function gestionar(){
    // var estados = document.getElementById("estados").value
    // $("#estados").change(function(e){
    //     e.preventDefault();
    //     $value = $('#estados').val();
    //     $.ajax({
    //         type: 'GET',
    //         url:  '/ciudades',
    //         data: {'ciudades':$value},
    //         success:function(data){
    //             console.log(data);
    //                 for(i=0; i<data; i++){
    //             $("ciudades").append("<option value='"+data[i].ciudad_id+"'>"+data[i].ciudad_nom+"</option")
    //         }
    //         }
    //     });
    // });
    // }