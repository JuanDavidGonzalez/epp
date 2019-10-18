@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if($req)
                <h1 class="page-header">Solicitudes <small>Editar Solicitud</small></h1>
            @else
                <h1 class="page-header">Solicitudes <small>Crear Nueva Solicitud</small></h1>
            @endif
        </div>
    </div>

    <div class="row" id="request">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    @if($req)
                        Formulario Edición  Solicitud
                    @else
                        Formulario Registro Nueva Solicitud
                    @endif
                </div>
                <div class="panel-body">
                    @if($req)
                        {!! Form::model($req,['route'=>['request.update', $req->id], 'method'=>'put', 'class'=>'form']) !!}
                    @else
                        {!! Form::open(['route'=>'request.store', 'method'=>'post', 'class'=>'form']) !!}
                    @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                                    <label>Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        {!! Form::select('user_id', $users,null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('activity_id') ? ' has-error' : '' }}">
                                    <label>Actividad</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                        {!! Form::select('activity_id', $activities,null,
                                        ['class'=>'form-control', 'v-model'=>'activity_id', 'v-on:change'=>'getItems' ]) !!}
                                    </div>
                                    @if ($errors->has('activity_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('activity_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>EPPs Requeridos:</h4>
                            </div>
                            <template v-for="item in items">
                                <div class="col-md-4">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input name="items[]" type="checkbox" :value="item.id">  @{{ item.code }} @{{ item.name }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="text-center">
                                                <img :src="`{{asset('storage')}}/`+item.img" class="card-img-top" alt="..." style="height: 80px; width: 80px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <div class="row" align="center">
                            <button  type="submit" class="btn btn-primary">Guardar</button>
                            <a  href="{{route('request.index')}}" class="btn btn-default">Cancelar</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/request.js') }}"></script>
@endsection
