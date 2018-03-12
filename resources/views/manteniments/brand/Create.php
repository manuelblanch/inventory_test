@extends('adminlte::layouts.app')

@section('htmlheader_title')
    <h2>Model Brand</h2>

@endsection
    <!-- Main content -->
    @section('main-content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Afegeix nova marca</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('brand.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('shortName') ? ' has-error' : '' }}">
                            <label for="shortName" class="col-md-4 control-label">Nom Curt</label>

                            <div class="col-md-6">
                                <input id="shortName" type="text" class="form-control" name="shortName" value="{{ old('shortName') }}" required>
                                @if ($errors->has('shortName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shortName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descripció</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Data Entrada</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" placeholder="yyyy-mm-dd" name="date_entrance" class="form-control datepicker" id="dateEntrance" required>
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-4 control-label">Ultima Actualització</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" placeholder="yyyy-mm-dd" value="{{ old('last_update') }}" name="last_update" class="form-control datepicker" id="lastUpdate" required>
                                </div>
                            </div>
                          </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Inserta
                                </button>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              <a href="{{ URL::previous() }}">Cancel·lar</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Afegeix Nova Marca</div>

                    <div class="panel-body table-responsive">

                        {!! Form::open(['method' => 'POST', 'route' => ['admin.companies.store']]) !!}
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('nom', 'Nom', ['class' => 'control-label']) !!}
                                {!! Form::text('endcomponent', old('nom'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('nom'))
                                    <p class="help-block">
                                        {{ $errors->first('nom') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('shortname', 'ShortName', ['class' => 'control-label']) !!}
                                {!! Form::text('shortname', old('shortname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('shortname'))
                                    <p class="help-block">
                                        {{ $errors->first('shortname') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                                {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('description'))
                                    <p class="help-block">
                                        {{ $errors->first('description') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('date-entrance', 'Date-entrance', ['class' => 'control-label']) !!}
                                {!! Form::text('date-entrance', old('date-entrance'), ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('date-entrance'))
                                    <p class="help-block">
                                        {{ $errors->first('date-entrance') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
