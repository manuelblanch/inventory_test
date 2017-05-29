@extends(manteniments.location.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Afegeix una nova localització</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('location.store') }}">
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
                            <label for="short_name" class="col-md-4 control-label">Nom Curt</label>

                            <div class="col-md-6">
                                <input id="shortName" type="text" class="form-control" name="ahortName" value="{{ old('shortName') }}" required>
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
                        <div class="form-group{{ $errors->has('date_entrance') ? ' has-error' : '' }}">
                            <label for="date_entrance" class="col-md-4 control-label">Data Entrada</label>

                            <div class="col-md-6">
                                <input id="date_entrance" type="text" class="form-control" name="date_entrance" value="{{ old('date_entrance') }}" required>
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
                                <input id="last_update" type="text" class="form-control" name="last_update" value="{{ old('last_update') }}" required>
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
                                    Creació
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
