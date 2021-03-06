@extends('layouts.app')

@section('title', '| Rolės')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i> Rolės

    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Vartotojai</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Leidimai</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Rolė</th>
                    <th>Leidimai</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{  $role->permissions()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>
                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Redaguoti</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                    {!! Form::submit('Panaikinti', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Sukurti Rolę</a>

</div>

@endsection