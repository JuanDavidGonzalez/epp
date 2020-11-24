@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">EPPs <small>Gestión de EPPs</small></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('item.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear</a>
                <br><br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        EPPs del sistema
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Norma</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{asset('storage/'.$item->img)}}" alt="No Image" class="img-circle" style="height: 50px; width: 50px">
                                    </td>
                                    <td class="text-center" style="padding-top: 25px">{{$item->code}}</td>
                                    <td class="text-left" style="padding-top: 25px">{{$item->name}}</td>
                                    <td class="text-center" style="padding-top: 25px">{{$item->rule}}</td>
                                    <td class="text-center" style="padding-top: 25px">
                                        <a href="{{route('item.edit', $item->id)}}" class="btn btn-xs btn-primary" title="Editar EPP">
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
