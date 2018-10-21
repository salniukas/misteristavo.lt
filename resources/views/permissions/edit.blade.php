@extends('layouts.app')

@section('title', '| Redaguoti Leidimą')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    {{-- @include ('errors.list') --}}

    <h1><i class='fa fa-key'></i> Redaguoti Leidimą:  {{$permission->name}}</h1>
    <br>
    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Leidimo Pavadinimas') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <br>
    {{ Form::submit('Redaguoti', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection