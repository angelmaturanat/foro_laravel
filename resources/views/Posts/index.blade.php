@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-body">
                  <a href="{{ route('post.create') }}" class="btn btn-success">Crear Discución</a>
                    <ul class="list-unstyled">
                      @foreach ($channels as $channel)
                          <li>
                              <a class="btn btn-link" href="{{ route('postChannel', $channel->slug) }}">{{ $channel->name }}</a>
                              <span class="badge">{{ $channel->posts->count() }}</span>
                          </li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <posts :posts="{{ $posts }}"></posts>
    </div>
</div>
@endsection
