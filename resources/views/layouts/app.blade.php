<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--3 dots code--}}
    <style>
        h6{
          color: #D85151
        }
        .h-scroll {
  min-height: 85vh; // Set this height to the appropriate size
  position: fixed;
  overflow-y: scroll; // Only add scroll to vertical column
}
.post-scroll {
  max-height: 85vh; // Set this height to the appropriate size
  position: fixed;
  overflow-y: scroll; // Only add scroll to vertical column
}
.promo-scroll {
  max-height: 85vh; // Set this height to the appropriate size
  position: fixed;
  overflow-y: scroll; // Only add scroll to vertical column
}
.user-scroll {
  max-height: 85vh; // Set this height to the appropriate size
  position: fixed;
  overflow-y: scroll; // Only add scroll to vertical column
}
.video-scroll {
  max-height: 68vh; // Set this height to the appropriate size
  position: fixed;
  overflow-y: scroll; // Only add scroll to vertical column
}
.audio-scroll {
  max-height: 68vh; // Set this height to the appropriate size
  position: fixed;
  overflow-y: scroll; // Only add scroll to vertical column
}
.quote-scroll {
  max-height: 68vh; // Set this height to the appropriate size
  position: fixed;
  overflow-y: scroll; // Only add scroll to vertical column
}
.photo-scroll {
  max-height: 68vh; // Set this height to the appropriate size
  position: fixed;
  overflow-y: scroll; // Only add scroll to vertical column
}
video{
    max-width: 100%
    height:auto;
}

.tabset > input[type="radio"] {
  position: absolute;
  left: -200vw;
}

.tabset .tab-panel {
  display: none;
}

.tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
.tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
.tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
.tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
.tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
.tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
  display: block;
}

/*
 Styling
*/
body {
  font: 16px/1.5em "Overpass", "Open Sans", Helvetica, sans-serif;
  color: #333;
  font-weight: 300;
}

.tabset > label {
  position: relative;
  display: inline-block;
  padding: 20px 20px 15px;
  border: 1px solid transparent;
  border-bottom: 0;
  cursor: pointer;
  font-weight: 600;
}

.tabset > label::after {
  content: "";
  position: absolute;
  left: 15px;
  bottom: 10px;
  width: 22px;
  height: 4px;
  background: white;
}

.tabset > label:hover,
.tabset > input:focus + label {
  color: #D85151;
}

.tabset > label:hover::after,
.tabset > input:focus + label::after,
.tabset > input:checked + label::after {
  background: #D85151;
}

.tabset > input:checked + label {
 
  
  margin-bottom: -1px;
}

.tab-panel {
  padding: 30px 0;
  border-top: 1px solid white;
}

/*
 Demo purposes only
*/
*,
*:before,
*:after {
  box-sizing: border-box;
}



.tabset {
  max-width: 65em;
}
    </style>

    
</head>
<body>
    <div id="app" style="body:80%;">
       
        @include('inc.navbar')
        <br>
        <br>
        <main class="py-4">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{--   <script>
        $('#exampleModaledit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('post')
  var cat_id = button.data('catid') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
 
  modal.find('.modal-body #post').val(recipient)
  modal.find('.modal-body #cat_id').val(cat_id)
})
    </script>--}}
 
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
      var config ={};
      config.placeholder = "Type here...";
        CKEDITOR.replace( "article-ckeditor",{
          height: 60
          
        } ,config);
        
    </script>
   
            
</body>
<footer>@envision</footer>
</html>
