@extends('layouts.master')

@section('content')
<div class="container">

	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Usuario</div>
                @if (session('notification'))
                <div class="alert alert-success">
                    {{session('notification')}}
                </div>

                @endif
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('/usuarios') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                            <label for="cargo" class="col-md-4 control-label">Cargo</label>

                            <div class="col-md-6">
                            <select id="cargo" type="smallInteger" class="custom-select" name="cargo" value="{{ old('cargo') }}" required>
                                <option selected> Administrador </option>
                                <option> Comprador </option>
                                <option> Comprador </option>
                                @if ($errors->has('cargo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                @endif
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Rol</label>

                            <div class="col-md-6">
                            <select id="role" type="smallInteger" class="custom-select" name="role" value="{{ old('role') }}" required>
                                <option selected> 0 </option>
                                <option> 1 </option>
                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="string" class="form-control" name="password"  value="{{ old('password', str_random(8), '12345678') }}" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar usuario
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Usuarios del Sistema</div>
        <h1>  Busqueda de usuarios
             {{ Form::open(['route' => 'buscar', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                <div class="form-group">
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
                </div>
                <div class="form-group">
                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                </div>
                <div class="form-group">
                {{ Form::text('rut', null, ['class' => 'form-control', 'placeholder' => 'Rut']) }}
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
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                @if(Auth::user()->rut != $user->rut)
                <tr>
                    <td>{{$user->rut}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="/usuario/{{$user->id}}" class="btn btn-primary">
                        Editar
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="/usuario/{{$user->id}}/eliminar" class="btn btn-danger">
                        Borrar
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection