@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Actividades <small>Gestión de Actividades</small></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('activity.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear</a>
                <br><br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Actividades del sistema
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Proceso</th>
                                    <th class="text-center">Fecha Creación</th>
                                    <th class="text-center">No. EPPs</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($activities as $activity)
                                <tr>
                                    <td class="text-center">{{$activity->code}}</td>
                                    <td class="text-left">{{$activity->name}}</td>
                                    <td class="text-left">{{$activity->process->name}}</td>
                                    <td class="text-center">{{$activity->created_at}}</td>
                                    <td class="text-center">{{$activity->items->count()}}</td>
                                    <td class="text-center">
                                        <a href="{{route('activity.edit', $activity->id)}}" class="btn btn-xs btn-primary" title="Editar Actividad">
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
