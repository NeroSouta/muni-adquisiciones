@extends('layouts.master')

@section('content')
<div class="container">

	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario</div>
                @if (session('notification'))
                <div class="alert alert-success">
                    {{session('notification')}}
                </div>
                @endif
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                            <label for="rut" class="col-md-4 control-label">Rut</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ $user->rut }}" required autofocus>

                                @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Rol</label>

                            <div class="col-md-6">
                            <select id="role" type="smallInteger" class="custom-select" name="role" value="{{ $user->role }}" required>
                                @if($user->role == 1)
                                <option value ="0" > Administrador </option>
                                <option value ="1" selected> Funcionario </option>
                                <option value ="2" > Supervisor </option>
                                @elseif($user->role == 0)
                                 <option value ="0" selected > Administrador </option>
                                <option value ="1" > Funcionario </option>
                                <option value ="2" > Supervisor </option>
                                @else
                                <option value ="0"  > Administrador </option>
                                <option value ="1" > Funcionario </option>
                                <option value ="2" selected > Supervisor </option>
                                @endif
                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </select>
                            </div>
                            <!--<div class="col-md-6">
                                <input id="role" type="smallInteger" class="form-control" name="role" value="{{ old('role') }}" required>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>-->
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar usuario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Configuraciones del Usuario</div>
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