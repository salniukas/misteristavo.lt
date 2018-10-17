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
        border: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        letter-spacing: .1rem;
    }

    button.button:hover {
       color: #b1b5b7;
    }
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
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
                    <button id="myBtn" class="button">Pildyti Balansą</button>
                    <button type="button" data-toggle="modal" data-target="#myModal">Open Modal</button>
                </div>
            </div>
            <br>
            <br>
            <div class="card">
                <div class="card-header">Paskutiniai 5 taškų panaudojimai:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table style="width: 100%">
                      <tr>
                        <th>Projektas</th>
                        <th>Data</th> 
                        <th>Kiekis</th>
                      </tr>
                      <tr>
                        <td>Jill</td>
                        <td>Smith</td> 
                        <td>50</td>
                      </tr>
                      <tr>
                        <td>Eve</td>
                        <td>Jackson</td> 
                        <td>94</td>
                      </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Taškų Pildymas</h3>
        <p>1t. = 1€</p>
        <form action="../paysera/redirect" method="get">
            @csrf
            <label for="amount">Norimas Taškų kiekis</label>
            <input type="text" name="amount" required min="1">

            <input type="hidden" name="username" value="{{ Auth::user()->name }}">
            <input type="hidden" name="email" value="{{ Auth::user()->email }}">

            <input type="submit">Pildyti</input>
        </form>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
@endsection