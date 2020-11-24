@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Usuarios <small>Gestión de Usuarios</small></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('user.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear</a>
                <br><br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Usuarios del sistema
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Cargo</th>
                                    <th class="text-center">Perfil</th>
                                    <th class="text-center">Fecha Creación</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="odd gradeX" data-name="{{$user->name}}" data-id="{{$user->id}}">
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{optional($user->position)->name}}</td>
                                    <td>{{$user->role->display_name}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td class="text-center">
                                        <a href="{{route('user.edit', $user->id)}}" class="btn btn-xs btn-primary" title="Editar Usuario">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')

@endsection
