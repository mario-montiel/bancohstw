// alert("hola baby")

var form_nom_fecha = document.getElementById("form_nom_fecha")
var veri_fecha_cli = document.getElementById("veri_fecha_cli")
var form_cliente_curp = document.getElementById("form_cliente_curp")
var form_cliente_rfc = document.getElementById("form_cliente_rfc")
var option = document.getElementById("option").selected = "selected"
var tabla = document.getElementById("table_verif_cli")

form_nom_fecha.style.display = "none"
// form_cliente_fecha.style.display = "none"
form_cliente_curp.style.display = "none"
form_cliente_rfc.style.display = "none"


// veri_fecha_cli.

function verificar_buro_cliente(){
    $("#verificar_nom_client").val("");
    $("#veri_fecha_cli").val("");
    $(".buscador_verif_curp").val("");
    
    var tipo_verificacion = document.getElementById("selector_cliente").value
    
    if (tipo_verificacion == "f_n_f"){
        form_nom_fecha.style.display = "block"
        form_cliente_curp.style.display = "none"
        form_cliente_rfc.style.display = "none"
        // form_cliente_fecha.style.display = "none"
        
    }
    else if (tipo_verificacion == "curp"){
        form_nom_fecha.style.display = "none"
        form_cliente_curp.style.display = "block"
        form_cliente_rfc.style.display = "none"
        // form_cliente_fecha.style.display = "none"
    }
    else if (tipo_verificacion == "rfc"){
        form_nom_fecha.style.display = "none"
        form_cliente_curp.style.display = "none"
        form_cliente_rfc.style.display = "block"
        // form_cliente_fecha.style.display = "none"
    }

}

// >>>>>>>>>>>>>>> JQUERY  <<<<<<<<<<<<<<<<<<<<<<<<<
$('#verificar_nom_client').on('keyup',function(e){
    $('#veri_fecha_cli').change(function(e){
        e.preventDefault();
            $value = $('#verificar_nom_client').val();
			$.ajax({
				type: 'GET',
				url:  '/verificar_nom_client',
				data: {'verificar_nom_client':$value},
				success:function(data){
					if(data.no != ""){
                        $('.table_verif_cli').html("");
                        $.each(data, function(i, item) {
                            console.log(item)
                                changos = " <div class='container'> "+
                                            "<center><h3> PERSONAS </h3></center>" +
                                                "<table class='table table-bordered'> "+
                                                    "<thead>"+
                                                        "<tr>"+
                                                            "<th> ID </th>"+
                                                            "<th> Nombre </th>"+
                                                            "<th> Fecha de Nacimiento </th>"+
                                                            "<th> CURP </th>"+
                                                            "<th> RFC </th>"+
                                                            "<th> Domicilio(s) </th>" +
                                                        "</tr>"+
                                                    "<tbody>" +
                                                        "<tr> <td>" +
                                                            item.cliente_id + "</td><td>" +
                                                            item.cli_nom + "</td><td>" +
                                                            item.ali_fecha_nac + "</td><td>" +
                                                            item.cli_curp + "</td><td>" +
                                                            item.cli_rfc + "</td><td>" +
                                                            "<center><button data-id="+item.usu_id+" data-calle="+item.direccion_calle+" data-numero="+item.direccion_num_ext+" data-colonia="+item.direccion_colonia+" data-toggle='modal' data-target='#domicilios' class='btn btn-warning'><img id='update' src=''>Domicilios</button></center>" +
                                                        "</tr>"+
                                                    "</tbody>" +
                                                " </table> " +
                                            "</div>";
                                $('.table_verif_cli').append(changos);
                        });
                    }
				},
			     error: function () {
			         alert("Error del Servidor");
			     },
            });
    });
});

// CURP
$('.buscador_verif_curp').on('keyup',function(e){
    if ($('.buscador_verif_curp').val() == ""){
        $('.table_verif_cli').css("display", "none"); 
    }
    else{
        $('.table_verif_cli').css("display", "block"); 
    }
        e.preventDefault();
            $value = $('.buscador_verif_curp').val();
			$.ajax({
				type: 'GET',
				url:  '/buscar_clientes_curp',
				data: {'buscar_clientes_curp':$value},
				success:function(data){
					if(data.no != ""){
                        $('.table_verif_cli').html("");
                        $.each(data, function(i, item) {
                            console.log(item)
                                changos = " <div class='container'> "+
                                                "<table class='table table-bordered'> "+
                                                    "<thead>"+
                                                        "<tr>"+
                                                            "<th> ID </th>"+
                                                            "<th> Nombre </th>"+
                                                            "<th> Fecha de Nacimiento </th>"+
                                                            "<th> CURP </th>"+
                                                            "<th> RFC </th>"+
                                                            "<th>Domicilio(s)</th>"
                                                        "</tr>"+
                                                    "<tbody>" +
                                                        "<tr> <td>" +
                                                            item.cliente_id + "</td><td>" +
                                                            item.cli_nom + "</td><td>" +
                                                            item.ali_fecha_nac + "</td><td>" +
                                                            item.cli_curp + "</td><td>" +
                                                            item.cli_rfc + "</td><td>" +
                                                            "<center><button data-id="+item.usu_id+" data-calle="+item.direccion_calle+" data-numero="+item.direccion_num_ext+" data-colonia="+item.direccion_colonia+" data-toggle='modal' data-target='#domicilios' class='btn btn-warning'><img id='update' src=''>Domicilios</button></center>" +
                                                        "</tr>"+
                                                    "</tbody>" +
                                                " </table> " +
                                            "</div>";
                                $('.table_verif_cli').append(changos);
                        });
                    }
				},
			     error: function () {
			         alert("Error del Servidor");
			     },
            });
});

// RFC
$('.buscador_verif_rfc').on('keyup',function(e){
    if ($('.buscador_verif_rfc').val() == ""){
        $('.table_verif_cli').css("display", "none"); 
    }
    else{
        $('.table_verif_cli').css("display", "block"); 
    }
        e.preventDefault();
            $value = $('.buscador_verif_rfc').val();
			$.ajax({
				type: 'GET',
				url:  '/buscar_clientes_rfc',
				data: {'buscar_clientes_rfc':$value},
				success:function(data){
					if(data.no != ""){
                        $('.table_verif_cli').html("");
                        $.each(data, function(i, item) {
                            console.log(item)
                                changos = " <div class='container'> "+
                                                "<table class='table table-bordered'> "+
                                                    "<thead>"+
                                                        "<tr>"+
                                                            "<th> ID </th>"+
                                                            "<th> Nombre </th>"+
                                                            "<th> Fecha de Nacimiento </th>"+
                                                            "<th> CURP </th>"+
                                                            "<th> RFC </th>"+
                                                            "<th> Ver Domicilio(s) </th> " +
                                                        "</tr>"+
                                                    "<tbody>" +
                                                        "<tr> <td>" +
                                                            item.cliente_id + "</td><td>" +
                                                            item.cli_nom + "</td><td>" +
                                                            item.ali_fecha_nac + "</td><td>" +
                                                            item.cli_curp + "</td><td>" +
                                                            item.cli_rfc + "</td><td>" +
                                                            "<center><button data-id="+item.usu_id+" data-calle="+item.direccion_calle+" data-numero="+item.direccion_num_ext+" data-colonia="+item.direccion_colonia+" data-toggle='modal' data-target='#domicilios' class='btn btn-warning'><img id='update' src=''>Domicilios</button></center>" + 
                                                            
                                                        "</tr>"+
                                                    "</tbody>" +
                                                " </table> " +
                                            "</div>";
                                $('.table_verif_cli').append(changos);
                        });
                    }
				},
			     error: function () {
			         alert("Error del Servidor");
			     },
            });
});

// DOMICILIOS
var button = $(event.relatedTarget) // Button that triggered the modal
var profesor = button.data('profesor') 
var taller = button.data('taller')
var modal = $(this)
modal.find('.modal-body #idActualizar').val(id)
modal.find('.modal-body #profesorActualizar').val(profesor)
modal.find('.modal-body #tallerActualizar').val(taller)
// $('.ver_domicilios').change(function(e){
//     e.preventDefault();
//         $value = $('.buscador_verif_curp').val();
// 		$.ajax({
// 			type: 'GET',
// 				url:  '/buscar_clientes_curp',
// 				data: {'buscar_clientes_curp':$value},
// 				success:function(data){
// 					if(data.no != ""){
//                         $('.table_verif_cli').html("");
//                         $.each(data, function(i, item) {
//                             console.log(item)
//                                 changos = " <div class='container'> "+
//                                                 "<table class='table table-bordered'> "+
//                                                     "<thead>"+
//                                                         "<tr>"+
//                                                             "<th> ID </th>"+
//                                                             "<th> Nombre </th>"+
//                                                             "<th> Fecha de Nacimiento </th>"+
//                                                             "<th> CURP </th>"+
//                                                             "<th> RFC </th>"+
//                                                         "</tr>"+
//                                                     "<tbody>" +
//                                                         "<tr> <td>" +
//                                                             item.cliente_id + "</td><td>" +
//                                                             item.cli_nom + "</td><td>" +
//                                                             item.ali_fecha_nac + "</td><td>" +
//                                                             item.cli_curp + "</td><td>" +
//                                                             item.cli_rfc + "</td><td>" +
//                                                         "</tr>"+
//                                                     "</tbody>" +
//                                                 " </table> " +
//                                             "</div>";
//                                 $('.table_verif_cli').append(changos);
//                         });
//                     }
// 				},
// 			     error: function () {
// 			         alert("Error del Servidor");
// 			     },
//             });
// });
