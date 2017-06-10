@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Inventory
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Actualitza Inventari</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" onsubmit = "return confirm('Estas segur?')" action="{{ route('inventory.update', ['id' => $inventory->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $inventory->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descripció</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $inventory->description }}" required>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipus de material</label>
                            <div class="col-md-6">
                                <select id="s1" class="form-control" name="material_type_id" style="width:345px">
                                    @foreach ($material_types as $material_type)
                                        <option {{$inventory->material_type_id == $material_type->id ? 'selected' : ''}} value="{{$material_type->id}}">{{$material_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Marca</label>
                            <div class="col-md-6">
                                <select id="s2" class="form-control" name="brand_id" style="width:345px">
                                    @foreach ($brands as $brand)
                                        <option {{$inventory->brand_id == $brand->id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Model</label>
                            <div class="col-md-6">
                                <select id="s3" class="form-control" name="model_id" style="width:345px">
                                    @foreach ($brand_models as $brand_model)
                                        <option {{$inventory->model_id == $brand_model->id ? 'selected' : ''}} value="{{$brand_model->id}}">{{$brand_model->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Localització</label>
                            <div class="col-md-6">
                                <select id="s4" class="form-control" name="location_id" style="width:345px">
                                    @foreach ($locations as $location)
                                        <option {{$inventory->location_id == $location->id ? 'selected' : ''}} value="{{$location->id}}">{{$location->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Quantitat</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control" name="quantity" value="{{ $inventory->quantity }}" required>

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Preu</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ $inventory->price }}" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                              <div class="form-group">
                            <label class="col-md-4 control-label">Procedencia dels diners</label>
                            <div class="col-md-6">
                                <select id="s5" class="form-control" name="moneysourceId" style="width:345px">
                                    @foreach ($moneySources as $moneySource)
                                        <option {{$inventory->moneysourceId == $moneySource->id ? 'selected' : ''}} value="{{$moneySource->id}}">{{$moneySource->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Proveidors</label>
                            <div class="col-md-6">
                                <select id="s6" class="form-control" name="provider_id" style="width:345px">
                                    @foreach ($providers as $provider)
                                        <option {{$inventory->provider_id == $provider->id ? 'selected' : ''}} value="{{$provider->id}}">{{$provider->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Data Entrada</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ $inventory->date_entrance }}" name="date_entrance" class="form-control pull-right" id="dateEntrance" required>
                                </div>
                            </div>
                        </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label">Ultima actualització</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ $inventory->last_update }}" name="last_update" class="form-control pull-right" id="lastUpdate" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label" >Imatge</label>
                            <div class="col-md-6">
                                <img src="../../{{$inventory->picture }}" width="50px" height="50px"/>
                                <input type="file" id="picture" name="picture" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualitzar
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
