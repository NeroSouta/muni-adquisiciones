@extends('layouts.master')

@section('content')

<div class="container">

<div class="panel panel-default">
        <div class="panel-heading">Configuraciones de Informes</div>
			<h2>  Busqueda de Configuraciones
             {{ Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) }}
                <div class="form-group">
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Configuración']) }}
                </div>
                <div class="form-group">
                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Codigo de Licitacíón']) }}
                </div>
                <div class="form-group">
                {{ Form::text('rut', null, ['class' => 'form-control', 'placeholder' => 'Tipo Licitación']) }}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
            {{ Form::close() }}
        </h1>
        <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre Configuración</th>
                    <th>Codigo Licitación</th>
                    <th>Tipo de Licitación</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Producto lapices</td>
                    <td>231421-le19</td>
                    <td>LE</td>
                    <td>Es una muy bacan con contrato, publica, bla bla bla</td>
                    <td>
                        <a href="" class="btn btn-primary">
                        Editar
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="" class="btn btn-danger">
                        Quitar
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>

</div>
@endsection