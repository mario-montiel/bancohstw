var form_nom_fecha = document.getElementById("form_nom_fecha")
// var veri_fecha_cli = document.getElementById("veri_fecha_cli")
var form_cliente_curp = document.getElementById("form_cliente_curp")
var form_cliente_rfc = document.getElementById("form_cliente_rfc")
var option = document.getElementById("option").selected = "selected"
var tabla = document.getElementById("table_verif_cli")

form_nom_fecha.style.display = "none"
form_cliente_curp.style.display = "none"
form_cliente_rfc.style.display = "none"

function verificar_buro_cliente(){
    $("#verificar_nom_client").val("");
    $("#verificar_ap_paterno").val("");
    $("#verificar_ap_materno").val("");
    $("#veri_fecha_cli").val("");
    $("#buscador_verif_curp").val("");
    $("#buscador_verif_rfc").val("");
    
    var tipo_verificacion = document.getElementById("selector_cliente").value
    
    if (tipo_verificacion == "f_n_f"){
        form_nom_fecha.style.display = "block"
        form_cliente_curp.style.display = "none"
        form_cliente_rfc.style.display = "none"
        $("#verificar_nom_client").attr('required', '');
        $("#verificar_ap_paterno").attr('required', '');
        $("#verificar_ap_materno").attr('required', '');
        $("#veri_fecha_cli").attr('required', '');
        $('#buscador_verif_rfc').removeAttr('required');
        $('#buscador_verif_curp').removeAttr('required');
        
    }
    else if (tipo_verificacion == "curp"){
        form_nom_fecha.style.display = "none"
        form_cliente_curp.style.display = "block"
        form_cliente_rfc.style.display = "none"
        $('#verificar_nom_client').removeAttr('required');
        $('#verificar_ap_paterno').removeAttr('required');
        $('#verificar_ap_materno').removeAttr('required');
        $('#veri_fecha_cli').removeAttr('required');
        $('#buscador_verif_rfc').removeAttr('required');
        $("#buscador_verif_curp").attr('required', '');
    }
    else if (tipo_verificacion == "rfc"){
        form_nom_fecha.style.display = "none"
        form_cliente_curp.style.display = "none"
        form_cliente_rfc.style.display = "block"
        $('#verificar_nom_client').removeAttr('required');
        $('#verificar_ap_paterno').removeAttr('required');
        $('#verificar_ap_materno').removeAttr('required');
        $('#veri_fecha_cli').removeAttr('required');
        $('#verificar_nom_client').removeAttr('required');
        $('#buscador_verif_curp').removeAttr('required');
        $("#buscador_verif_rfc").attr('required', '');
    }

}
// alert("h")



// >>>>>>>>>>>>>>> JQUERY  <<<<<<<<<<<<<<<<<<<<<<<<<

$('#btn_buro_credito').click(function(e){
    if ($('#verificar_nom_client').val() == null || $('#verificar_nom_client').val() == ""
    || $('#verificar_nom_client').length == 0 ) {
        $('#mensaje_buro').removeAttr('class');
        $("#mensaje_buro").attr('class', '');
        $('#mensaje_buro').addClass("alert-danger")
        $('#mensaje').html("No se encontró ningun cliente con esos datos")
        return false
    }
    if ($('#buscador_verif_rfc').val() == null || $('#buscador_verif_rfc').val() == ""
    || $('#buscador_verif_rfc').length == 0 ) {
        $('#mensaje_buro').removeAttr('class');
        $("#mensaje_buro").attr('class', '');
        $('#mensaje_buro').addClass("alert-danger")
        $('#mensaje').html("No se encontró ningun cliente con esos datos")
        return false
    }
    if ($('#buscador_verif_curp').val() == null || $('#buscador_verif_curp').val() == ""
    || $('#buscador_verif_curp').length == 0 ) {
        $('#mensaje_buro').removeAttr('class');
        $("#mensaje_buro").attr('class', '');
        $('#mensaje_buro').addClass("alert-danger")
        $('#mensaje').html("No se encontró ningun cliente con esos datos")
        return false
    }
})

$('.ir-arriba').click(function(){
    $('body, html').animate({
        scrollTop: '0px'
    }, 300);
});

$('.ir-domicilios').click(function(){
    $('body, html').animate({
        scrollTop: '650px'
    }, 300);
    // $(".table_verif_domicilio").animate({marginTop:"150px"},5000)
});

$('.ir-bancarias').click(function(){
    $('body, html').animate({
        scrollTop: '950px'
    }, 300);
});

$('.ir-no-bancarias').click(function(){
    $('body, html').animate({
        scrollTop: '1000px'
    }, 300);
});

// new WOW().init();
// var smoothScroll = require('smoothscroll');
//smoothScroll
// smoothScroll.init();
// var scroll = new SmoothScroll('a[href*="#"]');


$('#verificar_nom_client').on('keyup',function(e){
    $('#veri_fecha_cli').change(function(e){
        e.preventDefault();
            $value = $('#verificar_nom_client').val();
            if ($value == null || $value == "" || $value.length == 0) {
                $('#mensaje_buro').removeAttr('class');
                $("#mensaje_buro").attr('class', '');
                $('#mensaje_buro').addClass("alert-danger")
                $('#mensaje').html("No se encontró ningun cliente con esos datos")
                return false
            }
			$.ajax({
				type: 'GET',
				url:  '/verificar_nom_client',
				data: {'verificar_nom_client':$value},
				success:function(data){
                    console.log(data)
					$('#btn_buro_credito').click(function(e){
                        
                        if(data.no != ""){
                            $('.table_verif_cli').html("");

                            $.each(data, function(i, item) {
                                if (item.cli_status == "verde"){ 
                                    semaforo = "<center><img src='/img/verde.png' style='height:30px;'></center>"
                                    $('#mensaje_buro').removeAttr('class');
                                    $("#mensaje_buro").attr('class', '');
                                    $('#mensaje_buro').addClass("alert-success")
                                    $('#mensaje').html("El cliente va al corriente en sus pagos")
                                    
                                    // $('#mensaje_buro').html("E")
                                }
                                
                                else if (item.cli_status == "rojo") {
                                    semaforo = "<center><img src='/img/rojo.png' style='height:30px;'></center>"
                                    $('#mensaje_buro').removeAttr('class');
                                    $("#mensaje_buro").attr('class', '');
                                    $('#mensaje_buro').addClass("alert-danger")
                                    $('#mensaje').html("El cliente está atrasado en unos pagos")
                                }

                                else if (item.cli_status == "amarillo") {
                                    semaforo = "<center><img src='/img/amarillo.png' style='height:30px;'></center>"
                                    $('#mensaje_buro').removeAttr('class');
                                    $("#mensaje_buro").attr('class', '');
                                    $('#mensaje_buro').addClass("alert-warning")
                                    $('#mensaje').html("El cliente no pagó en el límite del tiempo concedido")
                                }
                                    changos = " <div class='container-fluid table-responsive'> " +
                                                    "<table class='table table-bordered'> " +
                                                    "<h5>Datos del Cliente" +
                                                    "<center>" +
                                                        "<thead>" +
                                                            "<tr>" +
                                                                "<th> ID1 </th>" +
                                                                "<th> Nombre </th>" +
                                                                "<th> Fecha de Nacimiento </th>" +
                                                                "<th> CURP </th>" +
                                                                "<th> RFC </th>" +
                                                                "<th> Estado </th>" +
                                                            "</tr>" +
                                                        "<tbody>" +
                                                            "<tr> <td>" +
                                                                item.cliente_id + "</td><td>" +
                                                                item.cli_nom + "</td><td>" +
                                                                item.cli_fecha_nac + "</td><td>" +
                                                                item.cli_curp + "</td><td>" +
                                                                item.cli_rfc + "</td><td>" +
                                                                semaforo + "</td><td>" +
                                                            "</tr>"+
                                                        "</tbody>" +
                                                    "</center></table>" +
                                                "</div>";
                                    $('.table_verif_cli').append(changos);
                                $('.buscar_datos_domicilio').click(function(e){
                                    $('.table_verif_domicilio').html("");
                                    domicilios = " <div class='container table-responsive'> "+
                                                    "<table class='table table-bordered'> " +
                                                    "<h5>Domicilio del Cliente" +
                                                    "<center>" +
                                                        "<thead>" +
                                                            "<tr>" +
                                                                "<th> ID </th>" +
                                                                "<th> Nombre </th>" +
                                                                "<th> Calle </th>" +
                                                                "<th> Número Exterior </th>" +
                                                                "<th> Colonia </th>" +
                                                                "<th> Ciudad </th>" +
                                                                "<th> Estado </th>" +
                                                                "<th> Código Postal </th> " +
                                                            "</tr>" +
                                                        "<tbody>" +
                                                            "<tr> <td>" +
                                                                item.cliente_id + "</td><td>" +
                                                                item.cli_nom + "</td><td>" +
                                                                item.direccion_calle + "</td><td>" +
                                                                item.direccion_num_ext + "</td><td>" +
                                                                item.direccion_colonia + "</td><td>" +
                                                                item.ciudad_nom + "</td><td>" +
                                                                item.estado_nom + "</td><td>" +
                                                                item.direccion_codigo_postal + "</td><td>" +
                                                            "</tr>"+
                                                        "</tbody>" +
                                                    "</center></table>" +
                                                "</div>";
                                    $('.table_verif_domicilio').append(domicilios);
                                });
                                $('.buscar_datos_bancarios').click(function(e){
                                    $('.table_verif_cuentas').html("");
                                    cuentas_bancarias = " <div class='container table-responsive'> " +
                                                "<table class='table table-bordered'> " +
                                                "<h5>Cuentas Bancarias del Cliente" +
                                                "<center>" +
                                                    "<thead>" +
                                                        "<tr>" +
                                                        "<th> ID </th>" +
                                                        "<th> Nombre </th>" +
                                                        "<th> Nombre de la Institución </th>" +
                                                        "<th> Código </th>" +
                                                        "<th> Tipo de Tarjeta </th>" +
                                                        "<th> Vencimiento </th>" +
                                                        "<th> Estatus </th>" +
                                                    "</tr>" +
                                                "<tbody>" +
                                                    "<tr> <td>" +
                                                        item.cliente_id + "</td><td>" +
                                                        item.cli_nom + "</td><td>" +
                                                        item.nombre + "</td><td>" +
                                                        item.tarjeta_numero + "</td><td>" +
                                                        item.tipo_tarjeto_cd_nombre + "</td><td>" +
                                                        item.tarjeta_fecha_venc + "</td><td>" +
                                                        item.tarjeta_estatus + "</td><td>" +
                                                    "</tr>" +
                                                    "</tbody>" +
                                                "</center></table>" +
                                            "</div>";
                                    $('.table_verif_cuentas').append(cuentas_bancarias);
                                });
                                $('.buscar_datos_no_bancarios').click(function(e){
                                    $('.table_verif_no_cuentas').html("");
                                    cuentas_no_bancarias = " <div class='container table-responsive'> " +
                                                "<table class='table table-bordered'> " +
                                                "<h5>Cuentas No Bancarias del Cliente" +
                                                "<center>" +
                                                    "<thead>" +
                                                        "<tr>" +
                                                        "<th> ID </th>" +
                                                        "<th> Nombre </th>" +
                                                        "<th> Nombre de la Institución </th>" +
                                                        "<th> Código </th>" +
                                                        "<th> Tipo de Tarjeta </th>" +
                                                        "<th> Vencimiento </th>" +
                                                        "<th> Estatus </th>" +
                                                    "</tr>" +
                                                "<tbody>" +
                                                    "<tr> <td>" +
                                                        item.cliente_id + "</td><td>" +
                                                        item.cli_nom + "</td><td>" +
                                                        item.nombre + "</td><td>" +
                                                        item.tarjeta_numero + "</td><td>" +
                                                        item.tipo_tarjeto_cd_nombre + "</td><td>" +
                                                        item.tarjeta_fecha_venc + "</td><td>" +
                                                        item.tarjeta_estatus + "</td><td>" +
                                                    "</tr>" +
                                                    "</tbody>" +
                                                "</center></table>" +
                                            "</div>";
                                    $('.table_verif_no_cuentas').append(cuentas_no_bancarias);
                                });             
                            });
                            
                        }
                    });
				},
			     error: function () {
			         alert("Error del Servidor");
			     },
            });
    });
});

// // CURP
$('#buscador_verif_curp').on('keyup',function(e){
        e.preventDefault();
        
            $value = $('#buscador_verif_curp').val();
            if ($value == null || $value == "" || $value.length == 0) {
                $('#mensaje_buro').removeAttr('class');
                $("#mensaje_buro").attr('class', '');
                $('#mensaje_buro').addClass("alert-danger")
                $('#mensaje').html("No se encontró ningun cliente con esos datos")
                return false
            }
			$.ajax({
				type: 'GET',
				url:  '/buscar_clientes_curp',
				data: {'buscar_clientes_curp':$value},
				success:function(data){
                    // console.log(data);
                        $('#btn_buro_credito').click(function(e){
                            
                        if(data.no != ""){
                            $('.table_verif_cli').html("");
                            $('.table_verif_domicilio').html("");
                            $('.table_verif_cuentas').html("");
                            $('.table_verif_no_cuentas').html("");
                            
                            $.each(data, function(i, item) {
                                console.log(data)
                                $('.table_verif_cli').html("");
                                $('#titulo_cliente').html(item.cli_nom + " " + item.cli_ap_paterno + " " + item.cli_ap_materno)
                                // $('#buscar_datos_domicilio').css("display", "block");
                                // $('#buscar_datos_bancarios').css("display", "block");
                                // $('#buscar_datos_no_bancarios').css("display", "block");

                                if (item.cli_status == "verde"){ 
                                    semaforo = "<center><img src='/img/verde.png' style='height:30px;'></center>"
                                    $('#mensaje_buro').removeAttr('class');
                                    $("#mensaje_buro").attr('class', '');
                                    $('#mensaje_buro').addClass("alert-success")
                                    $('#mensaje').html("El cliente va al corriente en sus pagos")
                                    
                                    // $('#mensaje_buro').html("E")
                                }
                                
                                else if (item.cli_status == "rojo") {
                                    semaforo = "<center><img src='/img/rojo.png' style='height:30px;'></center>"
                                    $('#mensaje_buro').removeAttr('class');
                                    $("#mensaje_buro").attr('class', '');
                                    $('#mensaje_buro').addClass("alert-danger")
                                    $('#mensaje').html("El cliente está atrasado en unos pagos")
                                }

                                else if (item.cli_status == "amarillo") {
                                    semaforo = "<center><img src='/img/amarillo.png' style='height:30px;'></center>"
                                    $('#mensaje_buro').removeAttr('class');
                                    $("#mensaje_buro").attr('class', '');
                                    $('#mensaje_buro').addClass("alert-warning")
                                    $('#mensaje').html("El cliente no pagó en el límite del tiempo concedido")
                                }

                                
                                    changos = " <div class='container-fluid table-responsive'> "+
                                                "<h5>Datos del Cliente" +
                                                    "<table class='table table-bordered'> " +
                                                    "<center>" +
                                                        "<thead>" +
                                                            "<tr>" +
                                                                "<th> ID </th>" +
                                                                "<th> Nombre </th>" +
                                                                "<th> Fecha de Nacimiento </th>" +
                                                                "<th> CURP </th>" +
                                                                "<th> RFC </th>" +
                                                                "<th> Estado </th>" +
                                                            "</tr>" +
                                                        "<tbody>" +
                                                            "<tr> <td>" +
                                                                item.cliente_id + "</td><td>" +
                                                                item.cli_nom + "</td><td>" +
                                                                item.cli_fecha_nac + "</td><td>" +
                                                                item.cli_curp + "</td><td>" +
                                                                item.cli_rfc + "</td><td>" +
                                                                semaforo + "</td><td>" +
                                                            "</tr>"+
                                                        "</tbody>" +
                                                    "</center></table>" +
                                                "</div>";
                                    $('.table_verif_cli').append(changos);
                                $('.buscar_datos_domicilio').click(function(e){
                                    $('.table_verif_domicilio').html("");
                                    domicilios = " <div class='container table-responsive'> " +
                                                    "<h5>Domicilio del Cliente" +
                                                    "<table class='table table-bordered'> " +
                                                    "<center>" +
                                                        "<thead>" +
                                                            "<tr>" +
                                                                "<th> ID </th>" +
                                                                "<th> Nombre </th>" +
                                                                "<th> Calle </th>" +
                                                                "<th> Número Exterior </th>" +
                                                                "<th> Colonia </th>" +
                                                                "<th> Ciudad </th>" +
                                                                "<th> Estado </th>" +
                                                                "<th> Código Postal </th> " +
                                                            "</tr>" +
                                                        "<tbody>" +
                                                            "<tr> <td>" +
                                                                item.cliente_id + "</td><td>" +
                                                                item.cli_nom + "</td><td>" +
                                                                item.direccion_calle + "</td><td>" +
                                                                item.direccion_num_ext + "</td><td>" +
                                                                item.direccion_colonia + "</td><td>" +
                                                                item.ciudad_nom + "</td><td>" +
                                                                item.estado_nom + "</td><td>" +
                                                                item.direccion_codigo_postal + "</td><td>" +
                                                            "</tr>"+
                                                        "</tbody>" +
                                                    "</center></table>" +
                                                "</div>";
                                    $('.table_verif_domicilio').append(domicilios);
                                });
                                $('.buscar_datos_bancarios').click(function(e){
                                    $('.table_verif_cuentas').html("");
                                    cuentas_bancarias = " <div class='container table-responsive'> " +
                                                "<table class='table table-bordered'> " +
                                                "<h5>Cuentas Bancarias del Cliente" +
                                                "<center>" +
                                                    "<thead>" +
                                                        "<tr>" +
                                                            "<th> ID </th>" +
                                                            "<th> Nombre </th>" +
                                                            "<th> Nombre de la Institución </th>" +
                                                            "<th> Código </th>" +
                                                            "<th> Tipo de Tarjeta </th>" +
                                                            "<th> Vencimiento </th>" +
                                                            "<th> Estatus </th>" +
                                                        "</tr>" +
                                                    "<tbody>" +
                                                        "<tr> <td>" +
                                                            item.cliente_id + "</td><td>" +
                                                            item.cli_nom + "</td><td>" +
                                                            item.nombre + "</td><td>" +
                                                            item.tarjeta_numero + "</td><td>" +
                                                            item.tipo_tarjeto_cd_nombre + "</td><td>" +
                                                            item.tarjeta_fecha_venc + "</td><td>" +
                                                            item.tarjeta_estatus + "</td><td>" +
                                                        "</tr>" +
                                                    "</tbody>" +
                                                "</center></table>" +
                                            "</div>";
                                    $('.table_verif_cuentas').append(cuentas_bancarias);
                                });
                                $('.buscar_datos_no_bancarios').click(function(e){
                                    $('.table_verif_no_cuentas').html("");
                                    cuentas_no_bancarias = " <div class='container table-responsive'> " +
                                                "<table class='table table-bordered'> " +
                                                "<h5>Cuentas No Bancarias del Cliente" +
                                                "<center>" +
                                                    "<thead>" +
                                                        "<tr>" +
                                                            "<th> ID </th>" +
                                                            "<th> Nombre </th>" +
                                                            "<th> Nombre de la Institución </th>" +
                                                            "<th> Código </th>" +
                                                            "<th> Tipo de Tarjeta </th>" +
                                                            "<th> Vencimiento </th>" +
                                                            "<th> Estatus </th>" +
                                                        "</tr>" +
                                                    "<tbody>" +
                                                        "<tr> <td>" +
                                                            item.cliente_id + "</td><td>" +
                                                            item.cli_nom + "</td><td>" +
                                                            item.nombre + "</td><td>" +
                                                            item.tarjeta_numero + "</td><td>" +
                                                            item.tipo_tarjeto_cd_nombre + "</td><td>" +
                                                            item.tarjeta_fecha_venc + "</td><td>" +
                                                            item.tarjeta_estatus + "</td><td>" +
                                                        "</tr>" +
                                                    "</tbody>" +
                                                "</center></table>" +
                                            "</div>";
                                    $('.table_verif_no_cuentas').append(cuentas_no_bancarias);
                                });             
                            });
                            
                        }
                        // if ($('#verificar_nom_client'.val() == "")){
                        //     alert("wow")
                        // }
                    });
				},
			     error: function () {
			         alert("Error del Servidor");
                 },
                 
            });
            
});

// // RFC
$('#buscador_verif_rfc').on('keyup',function(e){
        e.preventDefault();
            $value = $('#buscador_verif_rfc').val();
            console.log($value)
            if ($value == null || $value == "" || $value.length == 0) {
                $('#mensaje_buro').removeAttr('class');
                $("#mensaje_buro").attr('class', '');
                $('#mensaje_buro').addClass("alert-danger")
                $('#mensaje').html("No se encontró ningun cliente con esos datos")
                return false
            }
			$.ajax({
				type: 'GET',
				url:  '/buscar_clientes_rfc',
				data: {'buscar_clientes_rfc':$value},
				success:function(data){
					$('#btn_buro_credito').click(function(e){
                            
                        if(data.no != ""){
                            $('.table_verif_cli').html("");
                            $('.table_verif_domicilio').html("");
                            $('.table_verif_cuentas').html("");
                            $('.table_verif_no_cuentas').html("");
                            
                            $.each(data, function(i, item) {
                                console.log(data)
                                $('.table_verif_cli').html("");
                                $('#titulo_cliente').html(item.cli_nom + " " + item.cli_ap_paterno + " " + item.cli_ap_materno)
                                // $('#buscar_datos_domicilio').css("display", "block");
                                // $('#buscar_datos_bancarios').css("display", "block");
                                // $('#buscar_datos_no_bancarios').css("display", "block");

                                if (item.cli_status == "verde"){ 
                                    semaforo = "<center><img src='/img/verde.png' style='height:30px;'></center>"
                                    $('#mensaje_buro').removeAttr('class');
                                    $("#mensaje_buro").attr('class', '');
                                    $('#mensaje_buro').addClass("alert-success")
                                    $('#mensaje').html("El cliente va al corriente en sus pagos")
                                    
                                    // $('#mensaje_buro').html("E")
                                }
                                
                                else if (item.cli_status == "rojo") {
                                    semaforo = "<center><img src='/img/rojo.png' style='height:30px;'></center>"
                                    $('#mensaje_buro').removeAttr('class');
                                    $("#mensaje_buro").attr('class', '');
                                    $('#mensaje_buro').addClass("alert-danger")
                                    $('#mensaje').html("El cliente está atrasado en unos pagos")
                                }

                                else if (item.cli_status == "amarillo") {
                                    semaforo = "<center><img src='/img/amarillo.png' style='height:30px;'></center>"
                                    $('#mensaje_buro').removeAttr('class');
                                    $("#mensaje_buro").attr('class', '');
                                    $('#mensaje_buro').addClass("alert-warning")
                                    $('#mensaje').html("El cliente no pagó en el límite del tiempo concedido")
                                }

                                
                                    changos = " <div class='container-fluid'> "+
                                                "<h5>Datos del Cliente" +
                                                    "<table class='table table-bordered'> " +
                                                    "<center>" +
                                                        "<thead>" +
                                                            "<tr>" +
                                                                "<th> ID </th>" +
                                                                "<th> Nombre </th>" +
                                                                "<th> Fecha de Nacimiento </th>" +
                                                                "<th> CURP </th>" +
                                                                "<th> RFC </th>" +
                                                                "<th> Estado </th>" +
                                                            "</tr>" +
                                                        "<tbody>" +
                                                            "<tr> <td>" +
                                                                item.cliente_id + "</td><td>" +
                                                                item.cli_nom + "</td><td>" +
                                                                item.cli_fecha_nac + "</td><td>" +
                                                                item.cli_curp + "</td><td>" +
                                                                item.cli_rfc + "</td><td>" +
                                                                semaforo + "</td><td>" +
                                                            "</tr>"+
                                                        "</tbody>" +
                                                    "</center></table>" +
                                                "</div>";
                                    $('.table_verif_cli').append(changos);
                                $('.buscar_datos_domicilio').click(function(e){
                                    $('.table_verif_domicilio').html("");
                                    domicilios = " <div class='container'> " +
                                                    "<h5>Domicilio del Cliente" +
                                                    "<table class='table table-bordered'> " +
                                                    "<center>" +
                                                        "<thead>" +
                                                            "<tr>" +
                                                                "<th> ID </th>" +
                                                                "<th> Nombre </th>" +
                                                                "<th> Calle </th>" +
                                                                "<th> Número Exterior </th>" +
                                                                "<th> Colonia </th>" +
                                                                "<th> Ciudad </th>" +
                                                                "<th> Estado </th>" +
                                                                "<th> Código Postal </th> " +
                                                            "</tr>" +
                                                        "<tbody>" +
                                                            "<tr> <td>" +
                                                                item.cliente_id + "</td><td>" +
                                                                item.cli_nom + "</td><td>" +
                                                                item.direccion_calle + "</td><td>" +
                                                                item.direccion_num_ext + "</td><td>" +
                                                                item.direccion_colonia + "</td><td>" +
                                                                item.ciudad_nom + "</td><td>" +
                                                                item.estado_nom + "</td><td>" +
                                                                item.direccion_codigo_postal + "</td><td>" +
                                                            "</tr>"+
                                                        "</tbody>" +
                                                    "</center></table>" +
                                                "</div>";
                                    $('.table_verif_domicilio').append(domicilios);
                                });
                                $('.buscar_datos_bancarios').click(function(e){
                                    $('.table_verif_cuentas').html("");
                                    cuentas_bancarias = " <div class='container'> " +
                                                "<table class='table table-bordered'> " +
                                                "<h5>Cuentas Bancarias del Cliente" +
                                                "<center>" +
                                                    "<thead>" +
                                                        "<tr>" +
                                                            "<th> ID </th>" +
                                                            "<th> Nombre </th>" +
                                                            "<th> Nombre de la Institución </th>" +
                                                            "<th> Código </th>" +
                                                            "<th> Tipo de Tarjeta </th>" +
                                                            "<th> Vencimiento </th>" +
                                                            "<th> Estatus </th>" +
                                                        "</tr>" +
                                                    "<tbody>" +
                                                        "<tr> <td>" +
                                                            item.cliente_id + "</td><td>" +
                                                            item.cli_nom + "</td><td>" +
                                                            item.nombre + "</td><td>" +
                                                            item.tarjeta_numero + "</td><td>" +
                                                            item.tipo_tarjeto_cd_nombre + "</td><td>" +
                                                            item.tarjeta_fecha_venc + "</td><td>" +
                                                            item.tarjeta_estatus + "</td><td>" +
                                                        "</tr>" +
                                                    "</tbody>" +
                                                "</center></table>" +
                                            "</div>";
                                    $('.table_verif_cuentas').append(cuentas_bancarias);
                                });
                                $('.buscar_datos_no_bancarios').click(function(e){
                                    $('.table_verif_no_cuentas').html("");
                                    cuentas_no_bancarias = " <div class='container'> " +
                                                "<table class='table table-bordered'> " +
                                                "<h5>Cuentas No Bancarias del Cliente" +
                                                "<center>" +
                                                    "<thead>" +
                                                        "<tr>" +
                                                            "<th> ID </th>" +
                                                            "<th> Nombre </th>" +
                                                            "<th> Nombre de la Institución </th>" +
                                                            "<th> Código </th>" +
                                                            "<th> Tipo de Tarjeta </th>" +
                                                            "<th> Vencimiento </th>" +
                                                            "<th> Estatus </th>" +
                                                        "</tr>" +
                                                    "<tbody>" +
                                                        "<tr> <td>" +
                                                            item.cliente_id + "</td><td>" +
                                                            item.cli_nom + "</td><td>" +
                                                            item.nombre + "</td><td>" +
                                                            item.tarjeta_numero + "</td><td>" +
                                                            item.tipo_tarjeto_cd_nombre + "</td><td>" +
                                                            item.tarjeta_fecha_venc + "</td><td>" +
                                                            item.tarjeta_estatus + "</td><td>" +
                                                        "</tr>" +
                                                    "</tbody>" +
                                                "</center></table>" +
                                            "</div>";
                                    $('.table_verif_no_cuentas').append(cuentas_no_bancarias);
                                });             
                            });
                            
                        }
                        // if ($('#verificar_nom_client'.val() == "")){
                        //     alert("wow")
                        // }
                    });
				},
			     error: function () {
			         alert("Error del Servidor");
                 },
                 
            });
            
});

// // $('#btn_obtener_datos').click(function(e){
// //     // $('#btn_obtener_datos').val()
// //     alert("hhhh")
// // });
// // $(document).on('show.bs.modal','#domicilios', function () {
// //     alert('hi');
// //   })


// // $('#domicilios').modal("show");
// // 	var button = $(event.relatedTarget) // Botón que activó el modal
// //     var id = button.data('id') 
// //     $('#botonPrueba').click(function(e){
// //         alert("hhhh")
// //         console.log(id)
// //     });
// // });

// $('#domicilios').on('show.bs.modal', function (event) {
//     // DOMICILIOS
//     console.log("hola")
//     var button = $(event.relatedTarget) // Button that triggered the modal
//     var id = button.data('usu_id') 
//     var calle = button.data('calle')
//     console.log(calle)
//     var modal = $(this)
//     modal.find('.modal-body #idCliente').val(id)
//     modal.find('.modal-body #calleCliente').val(calle)
//     // modal.find('.modal-body #tallerActualizar').val(taller)
// });
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
