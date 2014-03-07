@extends('base')

@section('base_content')
@foreach($users as $user)
<p>{{ $user->id }} </p>
<p>{{ $user->email }}</p>
<p>{{ $user->password }}</p>
<p>{{ $user->cell }}</p>
@endforeach
@stop