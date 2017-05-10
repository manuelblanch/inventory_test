<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 9/05/17
 * Time: 17:52
 */

@extends('layouts.default')



@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Inventory CRUD</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('itemCRUD.create') }}"> Afegeix nou element al inventari</a>

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Title</th>

            <th>Description</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($items as $key => $item)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $item->title }}</td>

                <td>{{ $item->description }}</td>

                <td>{{ $item->d}}</td>

                <td>{{ $item->d }}</td>

                <td>{{ $item->d }}</td>

                <td>{{ $item->d }}</td>

                <td>{{ $item->d }}</td>

                <td>{{ $item->d }}</td>

                <td>

                    <a class="btn btn-info" href="{{ route('itemCRUD.show',$item->id) }}">Llistar</a>

                    <a class="btn btn-primary" href="{{ route('itemCRUD.edit',$item->id) }}">Editar</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['itemCRUD.destroy', $item->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                </td>

            </tr>

        @endforeach

    </table>


    {!! $items->render() !!}


@endsection