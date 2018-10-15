@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Prisijungimas') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('paysera-redirect') }}">

                        {{ csrf_field() }}

                        <label for="email">El.pašto adresas</label>
                        <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" >

                        <button type="submit" class="btn btn-danger btn-block">Apmokėti</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
