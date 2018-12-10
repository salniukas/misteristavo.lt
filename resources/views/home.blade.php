@extends('layouts.app')
@section('head')
<style type="text/css">
/*    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    table tr:nth-child(even) {
    background-color: #eee;
    }
    table tr:nth-child(odd) {
        background-color: #fff;
    }*/

    .button {
        background:none;
        border: 1px solid;
        color: black;
        padding: 10px 10px;
        text-decoration: none;
        display: block;
        letter-spacing: .1rem;
    }

    .button:hover {
       color: #b1b5b7;
    }
</style>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Taškai</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center>Jūsų turimi taškai: {{ Auth::user()->points }}</center>
                    <br>
                    <center><button type="button" id="myBtn" class="button" data-toggle="modal" data-target="#myModal">Pildyti Balansą</button></center>
                </div>
            </div>
            <br>
            <br>
    </div>
    <div class="col-md-8">
    <div class="card">
                <div class="card-header">Remiami Projektai:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped table-sm">
                      <tr>
                        <th>Projektas</th> 
                        <th>Kiekis taškais</th>
                      </tr>
                      @foreach($grouped as $group)
                      <tr>
                        <td>{!! $group->first()->project !!}</td>
                        <td>{{ $group->sum('amount')}}</td>
                      </tr>
                      @endforeach
                    </table>
                </div>
                
            </div>
        </div>
</div>
<br><br>
<div class="row">
 <div class="col-md-12">
    <div class="card">
                <div class="card-header">Dovanos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <tr>
                        <th>Dovana</th> 
                        <th>Projektas</th>
                        <th>Gavimo Data</th>
                        <th>Veiksmai</th>
                      </tr>
                      @foreach($gifts as $gift)
                      <tr>
                        <td title="{{ $gift->description }}">{{ $gift->name }}</td>
                        <td>{{ $gift->project_display}}</td>
                        <td>{{ $gift->pivot->created_at }}</td>
                        <td>@if($gift->type == 'server')
                              @if($gift->pivot->isUsed === 0)
                        		      <button type="button" id="myBtn{{$gift->pivot->id}}" class="btn-sm btn-success" data-toggle="modal" data-target="#myModal{{$gift->pivot->id}}">Aktyvuoti</button>
                              @elseif($gift->pivot->isUsed === 1)
                                  <button type="button" class="btn-sm btn-success disabled" title="Dovana jau aktyvuota">Aktyvuota</button>
                              @else
                                x
                              @endif
                        	@endif
                        </td>
                      </tr>
                      @endforeach
                    </table>
</div>
                </div>
                
            </div>
        </div>
</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Taškų Pildymas</h5><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="../paslaugos/store" method="post" id="forma">
                @csrf
                <label for="amount">Norimas Taškų kiekis</label><br>
                <input type="number" name="amount" id="amount" onkeyup="sumIt()" onclick="sumIt()" min="1" required  style="width: 50px;"><br><br>

                <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                <h5 id="myText" style="margin-right: 130px;">Viso mokėti: </h5>
            </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="forma" class="btn btn-primary">Apmokėti</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Uždaryti</button>
        
        
      </div>
    </div>
  </div>
</div>
@foreach($gifts as $gift)
<div class="modal fade" id="myModal{{$gift->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dovanos Aktyvavimas</h5><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="../gift/redeem" method="post" id="form{{$gift->pivot->id}}">
                @csrf
                <label for="name">Minecraft vartotojo vardas</label><br>
                <input type="text" name="name" required><br><br>
                <input type="hidden" name="id" value="{{ $gift->pivot->id }}">

            </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="form{{$gift->pivot->id}}" class="btn btn-primary">Aktyvuoti</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Uždaryti</button>
        
        
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection
@section('script')
<script>
function sumIt(){
    var input = document.getElementById('amount').value;
    document.getElementById("myText").innerText = "Viso mokėti: " + input + '€';
    console.log(input);
}
</script>
@endsection