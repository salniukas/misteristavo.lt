@extends('layouts.app')
@section('head')
<style type="text/css">
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    table tr:nth-child(even) {
    background-color: #eee;
    }
    table tr:nth-child(odd) {
        background-color: #fff;
    }

    button.button {
        background:none;
        border: 1px solid;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        letter-spacing: .1rem;
    }

    button.button:hover {
       color: #b1b5b7;
    }
</style>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div id="" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3></h3>
            <p>1t. = 1€</p>
            <form action="../paysera/redirect" method="get">
                @csrf
                <label for="amount">Norimas Taškų kiekis</label>
                <input type="text" name="amount" required min="1">

                <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                <button type="submit">Pildyti</input>
            </form>
        </div>
    </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profilis</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Jūsų turimi taškai: {{ Auth::user()->points }}
                    <br>
                    <br>
                    <br>
                    <button type="button" id="myBtn" class="button" data-toggle="modal" data-target="#myModal">Pildyti Balansą</button>
                    {{-- <button type="button" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}
                </div>
            </div>
            <br>
            <br>
            <div class="card">
                <div class="card-header">Remiami Projektai:</div>

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
                      </tr>
                      @foreach($grouped as $group)
                      <tr>
                        <td>{!! $group->first()->project !!}</td>
                        <td>{{ $group->sum('amount')}}</td>
                      </tr>
                      @endforeach
{{--                       <tr>
                        <td>Eve</td>
                        <td>94</td>
                      </tr>
                      <tr>
                        <td>John</td>
                        <td>69</td>
                      </tr>
                      <tr>
                        <td>Danguolius</td>
                        <td>150</td>
                      </tr>
                      <tr>
                        <td>PupyteXD</td>
                        <td>1</td>
                      </tr> --}}
                    </table>
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
            <form action="../paysera/redirect" method="post" id="form1">
                @csrf
                <label for="amount">Norimas Taškų kiekis</label><br>
                <input type="number" name="amount" id="amount" onkeyup="sumIt()" onclick="sumIt()" min="1" required  style="width: 50px;"><br><br>

                <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                <input type="hidden" name="email" value="{{ Auth::user()->email }}">

                <h5 id="myText" style="margin-right: 130px;">Viso mokėti: </h5>
            </form>
      </div>
      <div class="modal-footer">
            
        <button type="submit" form="form1" class="btn btn-primary">Apmokėti</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Uždaryti</button>
        
        
      </div>
    </div>
  </div>
</div>
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