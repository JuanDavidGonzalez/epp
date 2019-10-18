@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if($activity)
                <h1 class="page-header">Actividades <small>Editar Actividad</small></h1>
            @else
                <h1 class="page-header">Actividades <small>Crear Nuevo Actividad</small></h1>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    @if($activity)
                        Formulario Edición  Actividad
                    @else
                        Formulario Registro Nueva Actividad
                    @endif
                </div>
                <div class="panel-body">
                    @if($activity)
                        {!! Form::model($activity,['route'=>['activity.update', $activity->id], 'method'=>'put', 'class'=>'form']) !!}
                    @else
                        {!! Form::open(['route'=>'activity.store', 'method'=>'post', 'class'=>'form']) !!}
                    @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                    <label>Código <span class="">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        {!! Form::text('code', null,['class'=>'form-control', 'placeholder'=>'Código de Actividad']) !!}
                                    </div>
                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Nombre <span class="">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-cube"></i></span>
                                        {!! Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre de Actividad']) !!}
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group{{ $errors->has('items*') ? ' has-error' : '' }}">
                                    <label>EPPs *</label>
                                    {!! Form::select('items[]',$items, null, ['multiple'=>'multiple','class'=>'form-control']) !!}
                                    @if ($errors->has('items*'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('items*') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row" align="center">
                            <button  type="submit" class="btn btn-primary">Guardar</button>
                            <a  href="{{route('activity.index')}}" class="btn btn-default">Cancelar</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
