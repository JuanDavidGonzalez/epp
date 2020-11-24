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
                        {!! Form::model($req, ['route'=>['request.update', $req->id], 'method'=>'put', 'class'=>'form']) !!}
                    @else
                        {!! Form::open(['route'=>'request.store', 'method'=>'post', 'class'=>'form']) !!}
                    @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                                    <label>Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="hidden" id="currentUserId" value="{{optional($req)->user_id?:-1}}">
                                        {!! Form::select('user_id', $users,null,['class'=>'form-control', 'v-model'=>'user_id', 'v-on:change'=>'getProcess']) !!}
                                    </div>
                                    @if ($errors->has('user_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('activity_id') ? ' has-error' : '' }}">
                                    <label>Actividad</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                        <input type="hidden" id="currentActivityId" value="{{optional($req)->activity_id?:-1}}">
                                        <select class="form-control selectProcess" name="activity_id" v-on:change="getItems" v-model="activity_id">
                                            <option v-for="activity in activities"  :value="activity.id">
                                                @{{ activity.name }}
                                            </option>
                                        </select>
                                    </div>
                                    @if ($errors->has('activity_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('activity_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('activity_id') ? ' has-error' : '' }}">
                                    <label>Proceso</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                        <input type="hidden" id="currentProcessId" value="{{optional(optional($req)->activity)->process_id?:-1}}">
                                        <select class="form-control selectProcess" name="process_id" v-on:change="getActivities" v-model="process_id">
                                            <option v-for="process in processes"  :value="process.id">
                                                @{{ process.name }}
                                            </option>
                                        </select>
                                    </div>
                                    @if ($errors->has('process_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('process_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="row" v-show="activity_id !== '-1'">
                            <div class="col-md-12">
                                <h4>Factores de Riesgo:</h4>
                            </div>
                            <ol>
                                <li v-for="risk in risks">
                                    @{{risk.description}}
                                </li>
                            </ol>
                        </div>
                        @if($req)
                          <div class="row">
                              <div class="col-md-12">
                                  <h4>EPPs Seleccionados:</h4>
                                  @foreach($req->items as $item)
                                    <span class="badge">{{$item->name}}</span>
                                  @endforeach
                              </div>
                          </div>
                        @endif
                        <div class="row" v-show="activity_id !== '-1'">
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
                                            <div class="row">
                                                <div class="text-center">
                                                    <img :src="`{{asset('storage')}}/`+item.img" class="card-img-top" alt="..." style="height: 80px; width: 80px">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center">
                                                    <b>@{{item.rule}}</b>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h5>Especificaciones:</h5>
                                                <div class="text-left">
                                                   <p> @{{item.specification}}</p>
                                                </div>
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
