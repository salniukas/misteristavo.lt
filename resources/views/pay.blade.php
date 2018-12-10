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
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js"></script>
  <script src="https://www.paypalobjects.com/api/checkout.js"></script>

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
      .progress, .progress-bar{
          height: 28px;
      }
      .progress-bar{
        padding: 4px;
      }
      .vis{
        margin-top: 250px;
      }
        </style>
    </head>
<body>
<center><div class="wrapper nav">
    <section name="visata" class="container gray vis">
      <div class="inner">
      <div class="block">
          <div class="left">
            Pasirinkite Apmokejimo Būdą
            <div id="paypal-button"></div>
             <a href="https://misteristavo.lt/paslaugos/apmoketi/{{ $order->id }}"><div><img src="https://bank.paysera.com/assets/image/payment_types/wallet.png"></div></a>
          </div>
        </div>
            <h3>Kaina: {{ $order->amount }}€</h3>
      </div>
        <div class="clearfix"></div>
    <script type="text/javascript" charset="utf-8">
      var wtpQualitySign_projectId  = 124496;
      var wtpQualitySign_language   = "lt";
    </script><script src="https://bank.paysera.com/new/js/project/wtpQualitySigns.js" type="text/javascript" charset="utf-8"></script>

    <script>
    paypal.Button.render({
      env: 'production', // Or 'sandbox',production

      commit: true, // Show a 'Pay Now' button

      style: {
        tagline: 'false',
        color: 'gold',
        size: 'medium'
      },
      client: {
                production:    'ATEcVgV0GMOANQZLptO6JyLcI9p2UNakXxlQM3idPmZDPIw3wEo2WM-lF3-oxd1Qglx4_uAE6LrC3rvW',
                sandbox: 'AQ1uQ0Dd8KU5Fex-ezY6MdLsFkZvvYKbJ9biGOSGctTBH1cSzoMfuRfEWGkACn3Pm_4gDyySOBgpgqFY'
      },

      payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: '{{ $order->amount }}', currency: 'EUR' }
                            }
                        ]
                    }
                });
            },

      onAuthorize: function(data, actions) {
        /* 
         * Execute the payment here 
         */
         $(document).ready(function(){
            var CSRF_TOKEN = '{{ csrf_token() }} ';
            var ORDER_ID = '{{ $order->id }}';
            $.ajax({
              /* the route pointing to the post function */
              url: 'https://misteristavo.lt/paypal/complete',
              type: 'POST',
              /* send the csrf-token and the input to the controller */
              data: {_token: CSRF_TOKEN, message: ORDER_ID},
              dataType: 'JSON',
              /* remind that 'data' is the response of the AjaxController */
              success: function () { 
                $(location).attr('href', 'https://misteristavo.lt/uzsakymas-pavyko') 
              }
            }); 
       });    
      },

      onCancel: function(data, actions) {
        /* 
         * Buyer cancelled the payment 
         */
         $(location).attr('href', 'https://misteristavo.lt/uzsakymas-nepavyko')
      },

      onError: function(err) {
        /* 
         * An error occurred during the transaction 
         */

        $(location).attr('href', 'https://misteristavo.lt/uzsakymas-nepavyko')
      }
    }, '#paypal-button');
  </script>
  </div></center>
</section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>