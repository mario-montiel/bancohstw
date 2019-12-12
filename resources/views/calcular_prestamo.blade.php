@extends('scripts/scripts')
@extends('layouts/app')
@section('content')

  
  <br>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  @csrf

    <div class="card container">
      <div style="padding: 20px;">
        
        <legend>Calcular Prestamo</legend>
        <br>
        <label>Tipo de pago</label>
        <select class="form-control" id="combobox_tipo_pago">
          <option value="1" selected="selected">Mensual</option>
          <option value="2">Quincenal</option>
        </select>
        <br>
        <label>Tasa de interes:</label>
        <input class="form-control" type="text" name="" disabled="true" id="textbox_tasa" required>
        <br>
        <label>Meses a pagar:</label>
        <select class="form-control" id="combobox_meses">
          <option value="12" selected="selected">12 MESES</option>
          <option value="24">24 MESES</option>
        </select>
        <br>
        <label>Monto a solicitar:</label>
        <input class="form-control" type="text" name="" id="textbox_monto" required>
        <br><br>
        <center>
          <button class="btn-primary btn" id="btn_calcular">Calcular</button>
        </center>
        <br>
        
      </div>
      
    </div>

    <br><br>

    <div id="res" style="height: 250px;" class="container card">
        <br><br>
        <center>
          <legend style="padding-top: 20px">Resultados</legend>
        </center>
        <br>
        <label>Monto total a pagar:</label>
        <input type="text" class="form-control" name="" disabled="true" id="textbox_monto_final">
        <br>
        <label id="pagos"></label>
        <input type="text" class="form-control" name="" disabled="true" style="display: none;" id="textbox_pago">
      

      </div>
    
  
  
  <br><br><br><br><br><br><br><br><br><br>

  <div id="capa"></div>

  <script type="text/javascript">
  $('#textbox_monto').val("");
  $('#textbox_monto_final').val("");
  $('#res').hide();
  $( "#combobox_tipo_pago" ).change(function() {  
      $('#textbox_monto_final').val('');
      $('#textbox_pago').hide();
      $('#pagos').hide();
      $('#res').hide();
      tipo_id = $(this).val();
      if (tipo_id == 1){
        tipo = 5;
      }
      if (tipo_id == 2){
        tipo = 3;
      }
      $('#textbox_tasa').val(tipo);
  });

  $( "#combobox_meses" ).change(function() {  
      $('#textbox_monto_final').val('');
      $('#textbox_pago').hide();
      $('#pagos').hide();
      $('#res').hide();
  });

  $( "#btn_calcular" ).click(function() {
      monto = $('#textbox_monto').val();
      if(monto == ""){
        alert('favor de llenar todos los capos antes de dar click en el boton de calcular');
      }else{
        $('#res').show();
        tasa = $('#textbox_tasa').val();
        monto_total = monto * (1+(tasa/100));
        $('#textbox_monto_final').val(monto_total + " $");
        meses = $('#combobox_meses').val();
        meses_str = meses + " Pagos de" ; 
        $('#textbox_pago').show();
        $('#pagos').show();
        $('#pagos').text(meses_str);
        pago = monto_total / meses;
        $('#textbox_pago').val(pago + " $");

      }
      
  });



  </script>


@endsection