@extends('layouts.app')
@section('content')
	<center><h1>Ačiū, jūsų mokėjimas gautas!</h1></center>
	<center><h2>Jūs būsite nukreiptas į misteristavo.lt už <span id="countdown">10</span> sekundžių</h2></center>

@endsection
@section('script')
<script type="text/javascript">
    
    // Total seconds to wait
    var seconds = 10;
    
    function countdown() {
        seconds = seconds - 1;
        if (seconds < 0) {
            // Chnage your redirection link here
            window.location = "https://misteristavo.lt/home";
        } else {
            // Update remaining seconds
            document.getElementById("countdown").innerHTML = seconds;
            // Count down using javascript
            window.setTimeout("countdown()", 1000);
        }
    }
    
    // Run countdown function
    countdown();
    
</script>
@endsection