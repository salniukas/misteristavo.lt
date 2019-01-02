<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="verify-paysera" content="b74719a7df2f5cedf05ec7bd809afe8a">

        <title>Misteristavo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                overflow-y: hidden;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            /* Dropdown Button */
			.dropbtn {
				background: none;
				color: #636b6f;
				text-decoration: none;
                text-transform: uppercase;
			    font-size: 12px;
			    letter-spacing: .1rem;
			    border: none;
			}

			/* The container <div> - needed to position the dropdown content */
			.dropdown {
			    position: relative;
			    display: inline-block;
			}

			/* Dropdown Content (Hidden by Default) */
			.dropdown-content {
			    display: none;
			    position: absolute;
			    background-color: #f1f1f1;
			    min-width: 300px;
			    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			    z-index: 1;
			}

			/* Links inside the dropdown */
			.dropdown-content a {
			    color: black;
			    padding: 12px 16px;
			    text-decoration: none;
			    display: block;
			}
			.dropdown-content p {
			    color: black;
			    padding: 12px 16px;
			    text-decoration: none;
			    display: block;
			}

			/* Change color of dropdown links on hover */
			.dropdown-content a:hover {color: #b1b5b7;}

			/* Show the dropdown menu on hover */
			.dropdown:hover .dropdown-content {display: block;}

			/* Change the background color of the dropdown button when the dropdown content is shown */
			.dropdown:hover .dropbtn {color: #b1b5b7;}

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
			    width: 40%; /* Could be more or less, depending on screen size */
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
			.progress, .progress-bar{
			    height: 28px;
			}
			.progress-bar{
				padding: 4px;
			}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" style="margin-top: 90px;">

            <div class="content">
                <div class="title m-b-md">
                    <span style="color: #e86b49">Misteris</span><span style="color: #0aa8e9">Tavo</span>
                </div>

                <div class="links">
                    @if (Route::has('login'))
                        @auth
                        <a href="{{ route('home') }}">Pagrindinis</a>
                        @else
                            <a href="{{ route('login') }}">Prisijungti</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registruotis</a>
                           @endif
                        @endauth
                    @endif
                    <div class="dropdown">
					  <button class="dropbtn" style="color: #636b6f; font-weight: bold;">Kontaktai</button>
					  <div class="dropdown-content">
					    <p>Kotryna Kapočiūnaitė</p>
					    <p>misteristavo@gmail.com</p>
					    <p>Tel. +37067782422</p>
					  </div>
					</div>
					<a href="#" onclick="return false;" class="button dropbtn" data-modal="modalFour">Apie</a>
                    <div class="dropdown">
					  <button class="dropbtn" style="color: #636b6f; font-weight: bold;">Fondų Sąrašas</button>
					  <div class="dropdown-content">
					  	@foreach($projects as $project)
					    	<button class="button" data-modal="modal{{ $project->id }}">{{ $project->display_name }}</button>
					    @endforeach
					  </div>
					</div>
                </div>
                <div class="content" style="margin-top: 200px;">
                	<p style="color: #636b6f; font-weight: bold;">Partneriai</p>
                	<a href="https://visata.tryskubai.lt" target="_blank"><img src="https://visata.tryskubai.lt/img/Visatos_Logo.svg" style="width: 180px; margin-right: 10px;"></a>
                </div>
            </div>
        </div>
        @foreach($projects as $project)
			<div id="modal{{ $project->id }}" class="modal">
			  <div class="modal-content">
			    <span class="close">&times;</span>
			    @if($project->logo)
			    	<center><img src="{{ $project->logo }}"></center>
			    @else
			    	<center><h2>{{$project->display_name}}</h2></center>
			    @endif
			    <p style="text-align: center;">
			    	{!! $project->description !!}<br><br>
				</p>
				<center><h3>Surinkta Taškų: {{$project->current}}/
					@if($project->max === -1)
						{!! "&infin;" !!}
					@else
						{{$project->max}}
					@endif
					</h3></center>
				@auth
					<center><button class="button" data-modal="modal{{$project->id}}d">Paremti šį projektą</button></center>
				@else
					<center><button class="button">Norint paremti šį projektą prisijungite</button></center>
				@endauth
				@auth
				<div id="modal{{$project->id}}d" class="modal">
				  <div class="modal-content">
				    <span class="close">&times;</span>
				    <center><h2>Paremti šį Projektą</h2></center>
		            <center><form action="/donate" method="post">
		                @csrf
		                <label for="amount">Kiek taškų norite skirti?</label><br>

		                <input type="number" name="amount" id="amount{{$project->id}}" onkeyup="points{{$project->id}}()" onclick="points{{$project->id}}()" min="1" required  style="width: 50px;"><br><br>
		                <p>Jūsų turimi taškai: {{ Auth::user()->points }}</p>

		                <input type="hidden" name="username" value="{{ Auth::user()->name }}">
		                <input type="hidden" name="project_id" value="{{$project->id}}">

		                <button type="submit" id="batton{{$project->id}}" class="btn btn-primary">Paremti</button>
		            </form></center>
				  </div>
				</div>
				@else
				
				@endauth

			  </div>
			</div>
		@endforeach

{{-- About --}}
		<div id="modalFour" class="modal">
		  <!-- Modal content -->
		  <div class="modal-content">
		    <span class="close">&times;</span>
		    <center><h2>Apie Misteristavo.lt</h2></center>
		    <p style="text-align: center;">
		    	misteristavo.lt tai, internetinė svetainė kurioje užsiregistravę vartotojai gali tiesiogiai įtakoti kūrybos procesus remdami juos piniginėmis įmokomis.<br><br>
				Svetainėje projektu laikoma kūrybinė autoriaus/jo komandos veikla. Detaliai aprašyta ir pateikta ''fondų'' sąraše. 
				Fondo reikšmė svetainėje atitinka kultūros paramos fondo sąvoką . Tai konkretaus tikslo siekiantis projektas/uždavinys, reikalaujantis finansinių išteklių. <br><br>
				Svetainėje vartotojas gali nusipirkti taškų kuriuos gali naudoti sąraše pateiktiems Fondams remti, taip paspartindamas šių įgyvendinimą. 
				Taškų santykis euro atžvilgiu 1 prie 1.
				Vartotojas negali dalyvauti rėmimo procese nesusipažinęs su svetaines paslaugų tiekimo taisyklėmis.<br><br>
				Paslaugų tiekimo sutartyje vartotojas konkrečiai supažindinamas su galimais rizikos faktoriais, bei įvertinęs šiuos, gali pasirinkti nesutikti dalyvauti veikloje.
				Projekto idėja, padėti finansuoti mano kaip kūrėjo darbą ties:
				video produkcija
				edukacinės medžiagos pateikimą įvairiais formatais.
			</p>
		  </div>
		</div>
        <script type="text/javascript" charset="utf-8">
			var wtpQualitySign_projectId  = 124496;
			var wtpQualitySign_language   = "lt";
		</script><script src="https://bank.paysera.com/new/js/project/wtpQualitySigns.js" type="text/javascript" charset="utf-8"></script>



		<script type="text/javascript">
			var modalBtns = [...document.querySelectorAll(".button")];
			modalBtns.forEach(function(btn){
			  btn.onclick = function() {
			    var modal = btn.getAttribute('data-modal');
			    document.getElementById(modal).style.display = "block";
			  }
			});

			var closeBtns = [...document.querySelectorAll(".close")];
			closeBtns.forEach(function(btn){
			  btn.onclick = function() {
			    var modal = btn.closest('.modal');
			    modal.style.display = "none";
			  }
			});

			window.onclick = function(event) {
			  if (event.target.className === "modal") {
			    event.target.style.display = "none";
			  }
			}
		</script>
		@auth
		@foreach($projects as $project)
			<script>
			function points{{$project->id}}(){
			    var points = {{ Auth::user()->points }};
			    var cur = document.getElementById('amount{{$project->id}}').value;
			    console.log(cur);
			    if (points < cur) {
			    	document.getElementById("batton{{$project->id}}").disabled = true;
			    	document.getElementById("batton{{$project->id}}").title = "Neturite pakankamai taškų";
			    }
			    if (points >= cur) {
			    	document.getElementById("batton{{$project->id}}").disabled = false;
			    }

			}
			</script>
		@endforeach
		@endauth
    </body>
</html>
