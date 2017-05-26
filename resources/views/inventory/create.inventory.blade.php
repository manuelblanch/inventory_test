@extends('adminlte::layouts.app')

@section('htmlheader_title')
    <h2>Inventory Creació Item</h2>
@endsection

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Control Inventari</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('') }}" enctype="multipart/form-data">
                        @{{ csrf_field() }}
                        <div class="form-group{{ $errors->has('Id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label">Id</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('public-id') ? ' has-error' : '' }}">
                            <label for="middlename" class="col-md-4 control-label">Public Id</label>

                            <div class="col-md-6">
                                <input id="public id" type="text" class="form-control" name="public id" value="{{ old('public id') }}" required>

                                @if ($errors->has('public id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('public id') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                          <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                              <label for="nom" class="col-md-4 control-label">Nom</label>

                              <div class="col-md-6">
                                  <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required>

                                  @if ($errors->has('nom'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('nom') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>
                            <div class="form-group{{ $errors->has('descripcio') ? ' has-error' : '' }}">
                                <label for="descripcio" class="col-md-4 control-label">Descripcio</label>

                                <div class="col-md-6">
                                    <input id="descripcio" type="text" class="form-control" name="descripcio" value="{{ old('descripcio') }}" required>

                                    @if ($errors->has('descipcio'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('descripcio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                              </div>
                              <div class="form-group{{ $errors->has('material_type_id') ? ' has-error' : '' }}">
                                  <label for="material_type_id" class="col-md-4 control-label">Tipus de material</label>

                                  <div class="col-md-6">
                                      <input id="material_type_id" type="text" class="form-control" name="material_type_id" value="{{ old('material_type_id') }}" required>

                                      @if ($errors->has('material_type_id'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('material_type_id') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                </div>
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label" >Imatge</label>
                            <div class="col-md-6">
                                <input type="file" id="picture" name="picture" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Introdueix imatge de l'objecte a l'inventari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
