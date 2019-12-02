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
                                            "<center><h3> CLIENTE </h3></center>" +
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
                                                            '<center><button class="btn btn-success btn_obtener_datos" id="btn_obtener_datos" value='+item+' data-cliente='+item.cli_nom+' data-calle='+item.direccion_calle+' data-numero='+item.direccion_num_ext+' data-colonia='+item.direccion_colonia+' data-ciudad='+item.ciudad_nom+' data-estado='+item.estado_nom+' data-codigo_postal='+item.direccion_codigo_postal+' data-mensaje='+item.mensaje+' data-toggle="modal" data-target="#domicilios" class="btn btn-warning"><img id="update" src="">Domicilios</button></center>' +
                                                        "</tr>"+
                                                    "</tbody>" +
                                                " </table> " +
                                            "</div>";
                                            $('#domicilios').on('show.bs.modal', function (event) {
                                                // DOMICILIOS
                                                var button = $(event.relatedTarget) // Button that triggered the modal
                                                var cliente = button.data('cliente') 
                                                var calle = button.data('calle')
                                                var num_ext = button.data('numero')
                                                var colonia = button.data('colonia')
                                                var ciudad = button.data('ciudad')
                                                var estado = button.data('estado')
                                                var codigo_postal = button.data('codigo_postal')
                                                var mensaje = button.data('mensaje')
                                                var modal = $(this)
                                                modal.find('.modal-body #cliente').val(cliente)
                                                modal.find('.modal-body #calle').val(calle)
                                                modal.find('.modal-body #numero_ext').val(num_ext)
                                                modal.find('.modal-body #colonia').val(colonia)
                                                modal.find('.modal-body #ciudad').val(ciudad)
                                                modal.find('.modal-body #estado').val(estado)
                                                modal.find('.modal-body #codigo_postal').val(codigo_postal)
                                                modal.find('.modal-body #mensaje').val(mensaje)
                                            });
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
$('#buscador_verif_curp').on('keyup',function(e){
    if ($('#buscador_verif_curp').val() == ""){
        $('.table_verif_cli').css("display", "none"); 
    }
    else{
        $('.table_verif_cli').css("display", "block"); 
    }
        e.preventDefault();
            $value = $('#buscador_verif_curp').val();
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
                                                "<center><h3> CLIENTE </h3></center>" +
                                                "<table class='table table-bordered'> "+
                                                    "<thead>"+
                                                        "<tr>"+
                                                            "<th> ID </th>"+
                                                            "<th> Nombre </th>"+
                                                            "<th> Fecha de Nacimiento </th>"+
                                                            "<th> CURP </th>"+
                                                            "<th> RFC </th>"+
                                                            "<th>Domicilio(s)</th>" +
                                                        "</tr>"+
                                                    "<tbody>" +
                                                        "<tr> <td>" +
                                                            item.cliente_id + "</td><td>" +
                                                            item.cli_nom + "</td><td>" +
                                                            item.ali_fecha_nac + "</td><td>" +
                                                            item.cli_curp + "</td><td>" +
                                                            item.cli_rfc + "</td><td>" +
                                                            "<center><button class='btn btn-success btn_obtener_datos' id='btn_obtener_datos' value="+item+" data-cliente="+item.cli_nom+" data-calle='"+item.direccion_calle+"' data-numero="+item.direccion_num_ext+" data-colonia='"+item.direccion_colonia+"' data-ciudad="+item.ciudad_nom+" data-estado="+item.estado_nom+" data-codigo_postal="+item.direccion_codigo_postal+" data-mensaje="+item.mensaje+" data-toggle='modal' data-target='#domicilios' class='btn btn-warning'><img id='update' src=''>Domicilios</button></center>" +
                                                        "</tr>"+
                                                    "</tbody>" +
                                                " </table> " +
                                            "</div>";
                                            $('#domicilios').on('show.bs.modal', function (event) {
                                                // DOMICILIOS
                                                var button = $(event.relatedTarget) // Button that triggered the modal
                                                var cliente = button.data('cliente') 
                                                var calle = button.data('calle')
                                                var num_ext = button.data('numero')
                                                var colonia = button.data('colonia')
                                                var ciudad = button.data('ciudad')
                                                var estado = button.data('estado')
                                                var codigo_postal = button.data('codigo_postal')
                                                var mensaje = button.data('mensaje')
                                                var modal = $(this)
                                                modal.find('.modal-body #cliente').val(cliente)
                                                modal.find('.modal-body #calle').val(calle)
                                                modal.find('.modal-body #numero_ext').val(num_ext)
                                                modal.find('.modal-body #colonia').val(colonia)
                                                modal.find('.modal-body #ciudad').val(ciudad)
                                                modal.find('.modal-body #estado').val(estado)
                                                modal.find('.modal-body #codigo_postal').val(codigo_postal)
                                                modal.find('.modal-body #mensaje').val(mensaje)
                                            });
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
$('#buscador_verif_rfc').on('keyup',function(e){
    if ($('#buscador_verif_rfc').val() == ""){
        $('.table_verif_cli').css("display", "none"); 
    }
    else{
        $('.table_verif_cli').css("display", "block"); 
    }
        e.preventDefault();
            $value = $('#buscador_verif_rfc').val();
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
                                                "<center><h3> CLIENTE </h3></center>" +
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
                                                            "<center><button class='btn btn-success btn_obtener_datos' id='btn_obtener_datos' value="+item+" data-cliente="+item.cli_nom+" data-calle='"+item.direccion_calle+"' data-numero="+item.direccion_num_ext+" data-colonia='"+item.direccion_colonia+"' data-ciudad="+item.ciudad_nom+" data-estado="+item.estado_nom+" data-codigo_postal="+item.direccion_codigo_postal+" data-mensaje="+item.mensaje+" data-toggle='modal' data-target='#domicilios' class='btn btn-warning'><img id='update' src=''>Domicilios</button></center>" +

                                                            
                                                        "</tr>"+
                                                    "</tbody>" +
                                                " </table> " +
                                            "</div>";

                                            $('#domicilios').on('show.bs.modal', function (event) {
                                                // DOMICILIOS
                                                var button = $(event.relatedTarget) // Button that triggered the modal
                                                var cliente = button.data('cliente') 
                                                var calle = button.data('calle')
                                                var num_ext = button.data('numero')
                                                var colonia = button.data('colonia')
                                                var ciudad = button.data('ciudad')
                                                var estado = button.data('estado')
                                                var codigo_postal = button.data('codigo_postal')
                                                var mensaje = button.data('mensaje')
                                                var modal = $(this)
                                                modal.find('.modal-body #cliente').val(cliente)
                                                modal.find('.modal-body #calle').val(calle)
                                                modal.find('.modal-body #numero_ext').val(num_ext)
                                                modal.find('.modal-body #colonia').val(colonia)
                                                modal.find('.modal-body #ciudad').val(ciudad)
                                                modal.find('.modal-body #estado').val(estado)
                                                modal.find('.modal-body #codigo_postal').val(codigo_postal)
                                                modal.find('.modal-body #mensaje').val(mensaje)
                                            });
                                            $('.table_verif_cli').append(changos);
                        });
                    }
				},
			     error: function () {
			         alert("Error del Servidor");
			     },
            });
});

// $('#btn_obtener_datos').click(function(e){
//     // $('#btn_obtener_datos').val()
//     alert("hhhh")
// });
// $(document).on('show.bs.modal','#domicilios', function () {
//     alert('hi');
//   })


// $('#domicilios').modal("show");
// 	var button = $(event.relatedTarget) // Botón que activó el modal
//     var id = button.data('id') 
//     $('#botonPrueba').click(function(e){
//         alert("hhhh")
//         console.log(id)
//     });
// });

$('#domicilios').on('show.bs.modal', function (event) {
    // DOMICILIOS
    console.log("hola")
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('usu_id') 
    var calle = button.data('calle')
    console.log(calle)
    var modal = $(this)
    modal.find('.modal-body #idCliente').val(id)
    modal.find('.modal-body #calleCliente').val(calle)
    // modal.find('.modal-body #tallerActualizar').val(taller)
});
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
