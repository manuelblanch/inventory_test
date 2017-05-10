<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 9/05/17
 * Time: 17:54
 */

@extends('layouts.default')



@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edita un nou element</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('itemCRUD.index') }}"> Enrere</a>

            </div>

        </div>

    </div>


    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <strong>Error!</strong> Atencio hi han hagut problemes.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {!! Form::model($item, ['method' => 'PATCH','route' => ['itemCRUD.update', $item->id]]) !!}

    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Titul:</strong>

                {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}

            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Description:</strong>

                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}

            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>


    </div>

    {!! Form::close() !!}


@endsection