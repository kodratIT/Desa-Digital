<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEBGIS</title>
    
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
 <!--- FONT-ICONS CSS -->
 <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet">

   <!-- STYLE CSS -->
   
	<!-- Plugins CSS -->
    <link href="{{ url('assets/css/plugins.css') }}" rel="stylesheet">
   <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    <style>
        #map { 
            height: 100vh;
            margin: 0px;
            z-index: 0;
        }

      .box{
        height: 95vh;
        width: 400px;
        position: absolute;
        right: 0;
        z-index: 9999;  
        padding: 40px 40px 0px 40px;
        
      }

      .close{
        font-size: 20px;
        position: absolute;
        right: 0;
        top: 0;
        margin: 10px 20px;
      }

      .close:hover{
        cursor: pointer;
        color: gray;
      }

     input{
        font-size: 10px;
     }

     .toggle-element {
        display: none; /* Atur tampilan elemen sesuai kebutuhan, misalnya: block, inline, none, dll. */
    }
    .toggleBtn{
        position: fixed;
        z-index: 9999;
        right: 0;
        margin: 10px;
        display: block; /* Atur tampilan elemen sesuai kebutuhan, misalnya: block, inline, none, dll. */
        margin-bottom: 10px;
        background-color: blue;
    }
    .btnClose{
        color: red;
        font-size: 15px;
        cursor: pointer;
    }

    .btnDsb{
        display: block;
        position: fixed;
        margin: 10px;
        left: 0;
        bottom: 0;
        z-index: 999;
        color: black;
    }

    .btnDsb a {
        color: black;
    }
    </style>
</head>
<body>
    
    @yield('content')
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ url('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- leaflet js  -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>

  <!-- leaflet draw plugin  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>


        <!-- INTERNAL SELECT2 JS -->
        <script src="{{ url('assets/plugins/select2/select2.full.min.js') }}"></script>
  @yield('script')

</html>