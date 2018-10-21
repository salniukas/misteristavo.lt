@extends('layouts.app')

@section('title', '| Redaguoti Vartotoją')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Redaguoti {{$user->name}}</h1>
    <hr>
    {{-- @include ('errors.list') --}}

    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', 'Vartotojo Vardas') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'El.Paštas') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Suteikti Roles</b></h5>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>

{{--     <div class="form-group">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div> --}}

    {{ Form::submit('Redaguoti', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div><br><br>
<div class='col-lg-4'>
    <h1><i class='fa fa-user-plus'></i> Vartotojo {{$user->name}} Taškų Istorija</h1>


     <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <table style="width: 100%">
            <tr>
               <th>Projektas</th> 
               <th>Kiekis taškais</th>
               <th>Data</th>
               <th>Veiksmas</th>
            </tr>
            @foreach($grouped as $group)
                <tr>
                    <td>{!! $group->first()->project !!}</td>
                    <td>-{{ $group->sum('amount')}}</td>
                    <td>{{ $group->first()->created_at->format('F d, Y h:ia') }}</td>
                    <td>Remimas</td>
                </tr>
            @endforeach
            @foreach($order as $orde)
                <tr>
                    <td>Paysera</td>
                    <td>+{{ $orde->amount }}</td>
                    <td>{{ $orde->created_at->format('F d, Y h:ia') }}</td>
                    <td>Papildymas</td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>

@endsection