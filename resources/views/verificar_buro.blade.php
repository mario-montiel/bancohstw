@extends('scripts/scripts')
@extends('navbar')
@section('navbar')
@endsection

<div class="container mt-5">
    <div class="form pt-5">

        <div class="container-fluid mt-5">
            <center><h1>BURÓ DE CREDITO</h1></center>
            <select id="selector_cliente" class="form-control mt-4" name="" onchange="verificar_buro_cliente();">
                <option id="option" selected="true" disabled>Seleccione la forma de verificación del cliente</option>
                <option value="f_n_f">Nombre y Fecha</option>
                <option value="curp">CURP</option>
                <option value="rfc">RFC</option>
            </select>
        </div>


        <div id="form_nom_fecha" class="container-fluid mt-5">
            <form>
            <div class="row">
                <div class="col">
                
                    <div class="container">
                        <div class="row">
                            <h2>Bootstrap-select example</h2>
                            <p>This uses <a href="https://silviomoreto.github.io/bootstrap-select/">https://silviomoreto.github.io/bootstrap-select/</a></p>
                            <hr />
                            </div>

                            <div class="row-fluid">
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true">
                                <option data-subtext="Rep California">Tom Foolery</option>
                                <option data-subtext="Sen California">Bill Gordon</option>
                                <option data-subtext="Sen Massacusetts">Elizabeth Warren</option>
                                <option data-subtext="Rep Alabama">Mario Flores</option>
                                <option data-subtext="Rep Alaska">Don Young</option>
                                <option data-subtext="Rep California" disabled="disabled">Marvin Martinez</option>
                            </select>
                            <span class="help-inline">With <code>data-show-subtext="true" data-live-search="true"</code>. Try searching for california</span>
                        </div>
                    </div>

                    
                </div>
                <div class="col">
                    <input type="date" class="form-control" placeholder="Seleccione la fecha de nacimiento del cliente">
                </div>
            </div>
            </form>
            <center><button class="btn btn-primary mt-5" type="button">Siguiente</button></center>
            
        </div>


        <div id="form_cliente_curp" class="container-fluid mt-5">
            <form>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Ingrese el CURP del cliente">
                </div>
            </div>
            </form>          
        </div>

        <div id="form_cliente_rfc" class="container-fluid mt-5">
            <form>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Ingrese el RFC del cliente">
                </div>
            </div>
            </form>          
        </div>


        
        <div id="form_cliente" class="container-fluid mt-5 ">
            <form class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom01">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Last name</label>
                    <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationCustomUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                        Please choose a username.
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="validationCustom03">City</label>
                    <input type="text" class="form-control" id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationCustom04">State</label>
                    <select class="custom-select" id="validationCustom04" required>
                        <option selected disabled value="">Choose...</option>
                        <option>...</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationCustom05">Zip</label>
                    <input type="text" class="form-control" id="validationCustom05" required>
                    <div class="invalid-feedback">
                        Please provide a valid zip.
                    </div>
                    </div>
                </div>
                <center><button class="btn btn-primary mt-4" width="50%" type="submit">Submit form</button></center>
                
            </form>            
        </div>
                 
    </div>
</div>

<script src="js/bancohstw/verificar_buro_credito.js"></script>