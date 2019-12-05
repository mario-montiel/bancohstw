$(document).ready(function(){
    $('#abc').click(function(){

        $.ajax({
            type : 'POST',
            url : 'abc',
            dataType : 'html',

            data: {
              
            },

            success : function(data){
              $('#contenido').show(100).html(data);
            },

            error : function(XMLHttpRequest, textStatus, errorThrown) {       
              $('#output').show(500).text('Error al realizar la transferencia.');
            }
        }); //$.ajax
    });
    
//    $('#bajas').click(function(){
//        alert("hola");  
//    });
//    
    
    $('#guardar').click(function(){
        var $rpe = $('#rpe').val();
        var $nombre = $('#nombre').val();
        var $nac = $('#nac').val();
        
        $.ajax({
            type : 'POST',
            url : 'alta',
            dataType : 'html',

            data: {
                rpe: $rpe,
                nombre: $nombre,
                nac: $nac
            },

            success : function(data){
              $('#contenido').show(100).html(data);
            },

            error : function(XMLHttpRequest, textStatus, errorThrown) {       
              $('#output').show(500).text('Error al realizar la transferencia.');
            }
        }); //$.ajax
    });
});



