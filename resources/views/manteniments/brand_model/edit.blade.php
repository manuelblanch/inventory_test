@extends('adminlte::layouts.app')

@section('htmlheader_title')
    inventary
@endsection
    <!-- Main content -->
    @section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Actualitza Localitzacions</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" onsubmit = "return confirm('Estas segur?')" action="{{ route('location.update', ['id' => $location->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom de localització</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $location->name }}" required autofocus>

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
                                <input id="shortName" type="text" class="form-control" name="shortName" value="{{ $location->shortName }}" required>

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
                               <input id="description" type="text" class="form-control" name="description" value="{{ $location->description }}" required>

                               @if ($errors->has('description'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('description') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>
                       <div class="form-group{{ $errors->has('date_entrance') ? ' has-error' : '' }}">
                          <label for="date_entrance" class="col-md-4 control-label">Data Entrada</label>

                          <div class="col-md-6">
                              <input id="dateEntrance" type="text" class="form-control" name="date_entrance" value="{{ $location->date_entrance }}" required>

                              @if ($errors->has('date_entrance'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('date_entrance') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group{{ $errors->has('last_update') ? ' has-error' : '' }}">
                         <label for="last_update" class="col-md-4 control-label">Ultima Actualització</label>

                         <div class="col-md-6">
                             <input id="lastUpdate" type="text" class="form-control" name="last_update" value="{{ $location->last_update }}" required>

                             @if ($errors->has('last_update'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('last_update') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                  Actualitza
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
