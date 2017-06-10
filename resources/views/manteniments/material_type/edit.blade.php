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
                <div class="panel-heading">Actualitza Tipus de materials</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" onsubmit = "return confirm('Estas segur?')" action="{{ route('material_type.update', ['id' => $material_type->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom de tipus de material</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $material_type->name }}" required autofocus>

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
                               <input id="description" type="text" class="form-control" name="description" value="{{ $material_type->description }}" required>

                               @if ($errors->has('description'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('description') }}</strong>
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
