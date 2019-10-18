@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if($item)
                <h1 class="page-header">EPPs <small>Editar EPP</small></h1>
            @else
                <h1 class="page-header">EPPs <small>Crear Nuevo EPP</small></h1>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    @if($item)
                        Formulario Edición  EPP
                    @else
                        Formulario Registro Nuevo EPP
                    @endif
                </div>
                <div class="panel-body">
                    @if($item)
                        {!! Form::model($item,['route'=>['item.update', $item->id], 'method'=>'put', 'class'=>'form', 'files' => true]) !!}
                    @else
                        {!! Form::open(['route'=>'item.store', 'method'=>'post', 'class'=>'form',  'files' => true]) !!}
                    @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                    <label>Código <span class="">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        {!! Form::text('code', null,['class'=>'form-control', 'placeholder'=>'Código de EPP']) !!}
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
                                        {!! Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Nombre de EPP']) !!}
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label>Imagen </label>
                                    <div class="input-group">
                                        {!! Form::file('image', null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('img') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row" align="center">
                            <button  type="submit" class="btn btn-primary">Guardar</button>
                            <a  href="{{route('item.index')}}" class="btn btn-default">Cancelar</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
