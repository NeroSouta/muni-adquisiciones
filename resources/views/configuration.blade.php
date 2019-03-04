@extends('layouts.master')
@extends('layouts.formulario')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                <h3>Formulario de Licitación</h3>
                <br>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div id="accordion">
                <div class="card card-default">
                    <div class="card-header">
                        <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <i class="glyphicon glyphicon-search text-gold"></i>
                        <b>SECCION I: DATOS DECRETO</b>
                        </a>
                        </h4>
                    </div>
                   
                    <div id="collapse1" class="collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-5">
                                    <div class="form-group">
                                        <label class="control-label">Numero de Decreto</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-7">
                                    <div class="form-group ">
                                        <label class="control-label">Fecha de Decreto</label>
                                        <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar">
                                                    </i>
                                                </div>
                                                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- Include Date Range Picker -->
                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
                                <script>
                                $(document).ready(function(){
                                    var date_input=$('input[name="date"]'); //our date input has the name "date"
                                    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                    date_input.datepicker({
                                        format: 'mm/dd/yyyy',
                                        container: container,
                                        todayHighlight: true,
                                        autoclose: true,
                                    })
                                })
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-default">
                    <div class="card-header">
                            <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                            <i class="glyphicon glyphicon-search text-gold"></i>
                            <b>SECCION II: NOMBRE Y DATOS BÁSICOS</b>
                            </a>
                            </h4>
                    </div>
                    <div id="collapse2" class="collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Dirección Solicitante</label>

                                            {!! Form::select('direccion', $direccion->pluck('name'), null, [ 'class'=>'form-control', 'type'=>'text' ,'id'=>'direccion' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;' ]) !!}
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2 col-lg-8">
                                        <div class="form-group">
                                            <label class="control-label">Nombre Licitación</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-3 col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Codigo Licitación</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Tipo Licitación</label>
                                            <!--select type="smallInteger" class="form-control" value="" required="" style="height:40px;text-align:left;padding-right:10px;">
                                                <option value="0" selected="">seleccione una opcion</option>
                                                <option value="1"> L1 </option>
                                                <option value="2" selected=""> LE </option>
                                            </select-->
                                            {{ Form::select('tlicitacion', array('0' => 'L1', '1' => 'LE'), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'tlicitacion' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Tipo Convocatoria</label>
                                            {{ Form::select('tconvocatoria', array('abierta' => 'Abierta', 'cerrada' => 'Cerrada'), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'tconvocatoria' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-1 col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Descripción de la Licitación</label>
                                            <textarea rows="6" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <dir class="col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label class="control-label">Modena</label>
                                            {{ Form::select('moneda', array('CLP : Peso Chileno' => 'CLP : Peso Chileno', 'CLF : Unidad de Fomento' => 'CLF : Unidad de Fomento', 'USD : Dolar Americano' => 'USD : Dolar Americano', 'UTM : Unidad Tributaria Mensual' => 'UTM : Unidad Tributaria Mensual', 'EUR : Euro' => 'EUR : Euro'), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'moneda' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                        </div>
                                    </dir>
                                    <div class="col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label class="control-label">Etapa</label>
                                            {{ Form::select('etapa', array('0' => 'Una etapa', '1' => 'Dos etapas'), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'etapa' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label class="control-label">Contrato</label>
                                            {{ Form::select('contrato', array('0' => 'Con Contrato', '1' => 'Sin Contrato'), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'contrato' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label class="control-label">Estado Publicidad Ofertas</label>
                                            {{ Form::select('EstadoPublicidadOfertas', array('0' => 'No', '1' => 'Si'), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'EstadoPublicidadOfertas' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>


                 <div class="card card-default">
                    <div class="card-header">
                        <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                        <i class="glyphicon glyphicon-search text-gold"></i>
                        <b>SECTION III: LISTADO DE BIENES Y SERVICIOS REQUERIDO</b>
                        </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Mailing Address</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label">State</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-3 col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label">Zip Code</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                        <i class="glyphicon glyphicon-search text-gold"></i>
                        <b>SECTION IV: MONTOS, DURACIÓN Y DELGACIÓN DEL CONTRATO</b>
                        </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Estimacion en Base a</label>
                                            {{ Form::select('EstimacionBase', array('Tipo Referencial' => 'Tipo Referencial', 'Presupuesto disponible' => 'Presupuesto disponible', 'Oculto' => 'Oculto'), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'  EstimacionBase ' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                        </div>
                                    </div>
                                <div class="col-md-1 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Fuente de Financiamiento</label>
                                        <input id="FuenteFinanciamiento" type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-1 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Monto Bruto Estimado</label>
                                        <input id="MontoEstimado" class="form-control" type="text" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                            <label class="control-label">Contrato con Renovación</label>
                                            {{ Form::select('EsRenovable', array('No' => 'No', 'Si' => 'Si'), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'EsRenovable  ' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-lg-12">
                                    <div class="form-group">
                                            <label class="control-label">Observaciones</label>
                                            <textarea rows="1" {{--placeholder="Sin observaciones"--}}  ng-model='foo' class="form-control">Sin Observaciones</textarea>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="card card-default">
                    <div class="card-header">
                        <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                        <i class="glyphicon glyphicon-search text-gold"></i>
                        <b>SECTION V: DATOS DEL ORGANISMO DEMANDANTE Y PLAZOS LICITACION</b>
                        </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Duración del Contrato</label>
                                            {{ Form::select('DuracionContrato', array('0' => 'Contrato de Ejecución Inmediata', '1' => 'Contrato de Ejecución en el Tiempo'), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'  DuracionContrato ' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Plazo de Pago</label>
                                            {{ Form::select('PlazoDePago', array('1' => 'Pago a 30 días', '2' => 'Pago a 30, 60 y 90 días', '3' => 'Pago al día', '4' => 'Pago Anual', '5' => 'Pago Bimensual', '6' => 'Pago Contra Entrega Conforme', '7' => 'Pagos Mensuales', '8' => 'Pago Por Estado de Avance', '9' => 'Pago Trimestral', '10' => 'Pago a 60 días'), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'PlazoDePago' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                        </div>
                                </div>
                                <div class="col-md-1 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Nombre del Responsable del Pago </label>
                                        <input id="NombreResponsablePago" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-1 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Email del Responsable del Pago </label>

                                        <input id="EmailResponsablePago" class="form-control" type="text" />
                                    </div>
                                </div>

                            </div>

                            <div class="row align-items-center" >
                                <div class="col-md-1 col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label">Nombre del Responsable del Contrato  </label>
                                        <input id="NombreResponsableContrato" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-1 col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label">Email del Responsable del Contrato </label>
                                        <input id="EmailResponsableContrato" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-1 col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label">Teléfono del Responsable del Contrato </label>
                                        <input id="TelefonoResponsableContrato" class="form-control" type="text" />
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" >Prohibición Subcontratación
                                        </label><br><br>
                                        {{ Form::select('ProhibiciónSubcontratacion', array('0' => 'Se permite Subcontratación', '1' => 'No se permite '), null, ['class'=>'form-control', 'type'=>'text' ,'id'=>'ProhibiciónSubcontratacion  ' ,'placeholder'=>'Selecciona', 'style'=>'height:40px;text-align:left;padding-right:10px;']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                  <i class="glyphicon glyphicon-lock text-gold"></i>
                                  <b>SECTION VI: CRITERIOS DE EVALUACIÓN</b>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse6" class="collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="control-label">Please mark the appropriate box that best describes this candidate:</label>
                                    <table class="table table-primary">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>EXCELLENT</th>
                                                <th>GOOD</th>
                                                <th>AVERAGE</th>
                                                <th>BELOW AVERAGE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Academic Background</td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Artistic Skill</td>
                                                <td>
                                                    <input type="checkbox">
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Character</td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ambition</td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="control-label">
                                                        <input type="checkbox">
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a href="#" class="btn btn-success btn-lg" id="btnSubmit"><i class="fa fa-save"></i> Save</a>
                <a class="btn btn-warning btn-lg" href="#" id="btnToTop"><i class="fa fa-arrow-up"></i> Top</a>
            </div>
        </div>
    </div>
</div>
@endsection