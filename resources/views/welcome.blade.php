<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="verify-paysera" content="b74719a7df2f5cedf05ec7bd809afe8a">

        <title>Misteristavo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <span style="color: #e86b49">Misteris</span><span style="color: #0aa8e9">Tavo</span>
                </div>

                <div class="links">
                    @if (Route::has('login'))
                        @auth
                        <a href="#">Pagrindinis</a>
                        @else
                            <a href="{{ route('login') }}">Prisijungti</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registruotis</a>
                           @endif
                        @endauth
                    @endif
                    <div class="dropdown">
					  <button class="dropbtn">Kontaktai</button>
					  <div class="dropdown-content">
					    <p>Kotryna Kapočiūnaitė</p>
					    <p>misteristavo@gmail.com</p>
					    <p>Tel. +37067782422</p>
					  </div>
					</div>
                    <div class="dropdown">
					  <button class="dropbtn">Fondų Sąrašas</button>
					  <div class="dropdown-content">
					    <button class="button" data-modal="modalOne">„Dangaus Legendos”</button>
					    <button class="button" data-modal="modalTwo">„Dienoraštis” Serija</button>
					    <button class="button" data-modal="modalThree">„Pasidaryk Pats” Serija</button>
					  </div>
					</div>
                </div>
            </div>
        </div>
		<!-- The Modal -->
		<div id="modalOne" class="modal">
		  <!-- Modal content -->
		  <div class="modal-content">
		    <span class="close">&times;</span>
		    <center><img src="/img/logo.png"></center>
		    <p style="text-align: center;">
		    	Tai „Minecraft” žaidimo serveris, skirtas žaidėjams išmėginti savo įgūdžius dangaus saloje.<br>
				Prisijungęs žaidėjas galės ne tik išmėginti savo turimas žinias apie „Minecraft” žaidimą, bet ir išmokti naujų, mėgindamas naujai įdiegtas serverio mechanikas.<br>
				Žaidimo eiga yra suskirstyta į kelias kategorijas:<br>
				Alchemija - elementai išgaunami juos maišant su kitais.<br>
				Mechanika - įvairių procesų automatizavimas, manipuliavimas skysčiais.<br>
				Agronomija - nauji būdai kaip išgauti įvairią augaliją.<br>
				Fondo tikslas yra toliau tęsti darbus ties šiuo projektu apmokant už suteikiamas paslaugas prie projekto dirbantiems.
			</p>
		  </div>
		</div>

		<div id="modalTwo" class="modal">
		  <!-- Modal content -->
		  <div class="modal-content">
		    <span class="close">&times;</span>
		    <center><h2>Dienoraštis</h2></center>
		    <p style="text-align: center;">
		    	Tai  vaidybinis serialas pasakojantis apie veikėjų išgyvenimus pasaulyje kurį jie mėgina pažinti.
				Šis fondas skirtas sukurti specialią seriją kuri papildys YouTube grojaraščio sąraše esančias serijas.
			</p>
		  </div>
		</div>
		<div id="modalThree" class="modal">
		  <!-- Modal content -->
		  <div class="modal-content">
		    <span class="close">&times;</span>
		    <center><h2>Pasigamink Pats</h2></center>
		    <p style="text-align: center;">
		    	Tai serijos kuriuose iš įvairių dalykų yra mėginama sukurti kažką praktiško. Nauja serija, naujas kūrinys.
				Šis fondas skirtas sukurti naują „Pasidaryk Pats” seriją.
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
    </body>
</html>
