@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Solicitudes de EPPs</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="{{route('request.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear</a>
            <br><br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Solicitudes Realizadas
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Actividad</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td class="text-center">{{$request->user->name}}</td>
                                <td class="text-center">{{$request->activity->name}}</td>
                                <td class="text-center">{{$request->created_at}}</td>
                                <td class="text-center">
                                    <a href="{{route('activity.edit', $request->id)}}" class="btn btn-xs btn-primary" title="Editar Actividad">
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
