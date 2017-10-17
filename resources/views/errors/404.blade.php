@extends('layouts.app')

@section('content')
  Ha ocurrido un error
    <a href="{{ URL::previous() }}">Go Back</a>
@endsection
