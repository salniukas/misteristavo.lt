@extends('layouts.app')

@section('title', '| Sukurti Rolę')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Sukurti Rolę</h1>
    <hr>
    {{-- @include ('errors.list') --}}

    {{ Form::open(array('url' => 'roles')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Priskirti Leidimus</b></h5>

    <div class='form-group'>
        @foreach ($permissions as $permission)
            {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

        @endforeach
    </div>

    {{ Form::submit('Sukurti', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection