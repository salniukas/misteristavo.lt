@extends('layouts.app')

@section('title', '| Redaguoti Rolę')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-key'></i> Redaguoti Rolę: {{$role->name}}</h1>
    <hr>
    {{-- @include ('errors.list')
 --}}
    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Rolės Pavadiniams') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Priskirti Leidimus</b></h5>
    @foreach ($permissions as $permission)

        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

    @endforeach
    <br>
    {{ Form::submit('Redaguoti', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}    
</div>

@endsection