@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Inventory
@endsection

@section('main-content')

<h1>Posts Llista</h1>

<a href="{{ route('posts.create') }}" class="btn btn-success" Create New post</a>

  <table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Title</th>
        <th class="col-md-4">Body</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @if (empty($posts))
        <tr>
          <td colspan="4"> No post has been found </td>

        </tr>

        @else
          @foreach ($posts as $post)
            <tr>
              <td>
                <img src="{{ 'uploads/posts/'.$post->image }}" style="max-width: 200px; max-height: 200px" alt="">
              </td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->body }}</td>
              <td>
                <a href="{{ route('posts.edit', $post->id)}}">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
  </table>

  @endsection
