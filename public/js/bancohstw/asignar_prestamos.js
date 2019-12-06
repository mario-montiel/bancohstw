var form_nom_fecha = document.getElementById("form_nom_fecha")
var veri_fecha_cli = document.getElementById("veri_fecha_cli")
var form_cliente_curp = document.getElementById("form_cliente_curp")
var form_cliente_rfc = document.getElementById("form_cliente_rfc")
var option = document.getElementById("option").selected = "selected"
var tabla = document.getElementById("table_verif_cli")

form_nom_fecha.style.display = "none"
form_cliente_curp.style.display = "none"
form_cliente_rfc.style.display = "none"

function verificar_buro_cliente() {
    $("#numero_cliente").val("");
    $("#nom_client").val("");
    $("#verif_curp").val("");
    $("#verif_rfc").val("");
    $("#fecha_nacimiento").val("");

    var tipo_verificacion = document.getElementById("selector_cliente").value

    if (tipo_verificacion == "f_n_f") {
        form_nom_fecha.style.display = "block"
        form_cliente_curp.style.display = "none"
        form_cliente_rfc.style.display = "none"

    }
    else if (tipo_verificacion == "curp") {
        form_nom_fecha.style.display = "none"
        form_cliente_curp.style.display = "block"
        form_cliente_rfc.style.display = "none"
    }
    else if (tipo_verificacion == "rfc") {
        form_nom_fecha.style.display = "none"
        form_cliente_curp.style.display = "none"
        form_cliente_rfc.style.display = "block"
    }
}

// JQUERY //
// alert("hola")
// $('#verif_nom_client').on('keyup', function (e) {
// console.log("hola")
$('#btn_asignar_prestamos').click(function (e) {
    $id = $('#numero_cliente').val();
    $nombre = $('#nom_client').val();
    $curp = $('#verif_curp').val();
    $rfc = $('#verif_rfc').val();
    $fecha = $('#fecha_nacimiento').val();
    // else if ($id != "" || $rfc != "" || $fecha != ""){
    //     Swal.fire({
    //         title: 'LLENE TODOS LOS CAMPOS',
    //         text: 'Seleccione la forma de verificación del cliente y llene todos los campos',
    //         icon: 'error',
    //         confirmButtonText: 'Cool'
    //     });
    // }
    e.preventDefault();
    $value = { "id" : $id, "nombre": $nombre, "curp": $curp, "rfc": $rfc, "fecha": $fecha }
    $.ajax({
        type: 'GET',
        url: '/verif_asignar_prestamos',
        data: { 'datos': $value },
        success: function (data) {
            console.log(data);
            $.each(data, function(i, item) {
                if (item.cli_status == "verde"){
                    Swal.fire({
                        title: 'BURÓ DE CRÉDITO',
                        text: 'Va al corriente con sus pagos',
                        icon: 'success',
                        confirmButtonText: 'Genial!'
                    });
                }
                else if (item.cli_status == "amarillo"){
                    Swal.fire({
                        title: 'BURÓ DE CRÉDITO',
                        text: 'Usted tiene pagos atrazados',
                        icon: 'warning',
                        confirmButtonText: 'Echele Ganas'
                    });
                }
                else{
                    Swal.fire({
                        title: 'BURÓ DE CRÉDITO',
                        text: 'Usted ha alcanzado el limite máximo permitido',
                        icon: 'error',
                        confirmButtonText: 'Te pasaste my friend'
                    });
                }
                
            });
            // if (data)
            
            // if(data.no != ""){
            //     $('.table_verif_cli').html("");
            //     $.each(data, function(i, item) {
            //         console.log(item)
            //             changos = " <div class='container'> "+
            //                         "<center><h3> CLIENTE </h3>" +
            //                             "<table class='table table-bordered'> "+
            //                                 "<thead>"+
            //                                     "<tr>"+
            //                                         "<th> ID </th>"+
            //                                         "<th> Nombre </th>"+
            //                                         "<th> Fecha de Nacimiento </th>"+
            //                                         "<th> CURP </th>"+
            //                                         "<th> RFC </th>"+
            //                                         "<th> Domicilio(s) </th>" +
            //                                         "<th> Creditos Bancarios </th> " +
            //                                         "<th> Creditos No Bancarios </th> " +
            //                                     "</tr>"+
            //                                 "<tbody>" +
            //                                     "<tr> <td>" +
            //                                         item.cliente_id + "</td><td>" +
            //                                         item.cli_nom + "</td><td>" +
            //                                         item.ali_fecha_nac + "</td><td>" +
            //                                         item.cli_curp + "</td><td>" +
            //                                         item.cli_rfc + "</td><td>" +
            //                                         '<center><button class="btn btn-success btn_obtener_datos" value='+item+' data-cliente='+item.cli_nom+' data-calle='+item.direccion_calle+' data-numero='+item.direccion_num_ext+' data-colonia='+item.direccion_colonia+' data-ciudad='+item.ciudad_nom+' data-estado='+item.estado_nom+' data-codigo_postal='+item.direccion_codigo_postal+' data-mensaje='+item.mensaje+' data-toggle="modal" data-target="#domicilios" class="btn btn-warning"><img id="update" src="">Domicilios</button></center> </td><td>' + 
            //                                         "<center><button class='btn btn-success btn_obtener_datos' data-nombre_institucion="+item.tipo_tarjeta_nombre+" data-codigo='"+item.tarjeta_numero+"' data-tipo_tarjeta="+item.tipo_tarjeto_cd_nombre+" data-vencimiento='"+item.tarjeta_estatus+"' data-estatus="+item.cli_status+" data-toggle='modal' data-target='#creditos_bancarios' class='btn btn-warning'><img id='update' src=''>Creditos Bancarios</button></center></td><td>" +
            //                                         "<center><button class='btn btn-success btn_obtener_datos' data-nombre_institucion="+item.tipo_tarjeta_nombre+" data-codigo='"+item.tarjeta_numero+"' data-tipo_tarjeta="+item.tipo_tarjeto_cd_nombre+" data-vencimiento='"+item.tarjeta_estatus+"' data-estatus="+item.cli_status+" data-toggle='modal' data-target='#creditos_bancarios' class='btn btn-warning'><img id='update' src=''>Creditos No Bancarios</button></center></td><td>" +
            //                                     "</tr>"+
            //                                 "</tbody>" +
            //                             " </table></center> " +
            //                         "</div>";
            //                         // $('#creditos_bancarios').on('show.bs.modal', function (event) {
            //                         //     // DOMICILIOS
            //                         //     var button = $(event.relatedTarget) // Button that triggered the modal
            //                         //     var nombre_institucion = button.data('nombre_institucion') 
            //                         //     var codigo = button.data('codigo')
            //                         //     var tipo_tarjeta = button.data('tipo_tarjeta')
            //                         //     var vencimiento = button.data('vencimiento')
            //                         //     var estatus = button.data('estatus')
            //                         //     var modal = $(this)
            //                         //     modal.find('.modal-body #nombre_institucion').val(nombre_institucion)
            //                         //     modal.find('.modal-body #codigo').val(codigo)
            //                         //     modal.find('.modal-body #descripcion').val(tipo_tarjeta)
            //                         //     modal.find('.modal-body #estado').val(vencimiento)
            //                         //     modal.find('.modal-body #comportamiento').val(estatus)
            //                         // });
            //                         $('.table_verif_cli').append(changos);

        },
        error: function () {
            alert("Error del Servidor");
        },
    });
});
// });

