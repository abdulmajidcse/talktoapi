<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('css')
    <style>
        /* .text-justify {
            text-align: justify;
        } */
        a{
          text-decoration: none
        }
        .border_right{
            border-right: 1px solid #ccc;
        }
        #scrollTop{
            height: 40px;
            width: 40px;
            background: #2c3e50e0;
            position: fixed;
            right: 2%;
            bottom: 2%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: .6s;
            border-radius: 2px;
            transition: .6s;
        }
       #scrollTop a{
        color: #fff;
        transition: .3s;
        transform: scale(1.3)
    }
        #scrollTop:hover a{
            margin-top: -5px;

        }
        #contact{
            height: 50px;
            width:50px;
            background: #3498db;
            position: fixed;
            right: 0;
            top: 80%;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            transition: .6s;
            animation-name:ANIMATION;
            animation-duration: 5s;
            animation-iteration-count: infinite
        }
        #contact:hover{
            cursor: pointer;
        }
        #contact >a{
            font-size: 20px;
            color: #ecf0f1;
        }
        @keyframes ANIMATION {
            0%   {transform: scale(1)}
            10%  {transform: scale(.9)}
            20%  {transform: scale(.8)}
            30%  {transform: scale(.7)}
            40%  {transform: scale(.8)}
            50%  {transform: scale(.9)}
            60%  {transform: scale(.95)}
            70%  {transform: scale(.9)}
            80%  {transform: scale(.8)}
            90%  {transform: scale(.9)}
            100% {transform: scale(.98)}
        }
    </style>
      <title>@yield('title') | TalkToApi | Docs</title>
  </head>
  <body id="app">

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
           @includeIf('includes.sidebar')

            <div class="col-md-9 mt-5 px-3">
              @yield('app_content')
              <footer class="bg-light text-center py-3 ">
                <p>{{ date('Y') }} &copy; Developed By <a href="https://facebook.com/abdulmajidcse" target="_blank">Abdul Majid</a> & <a href="https://tutspack.com/" target="_blank">Shahin</a></p>
              </footer>
            </div> <!-- col-9 -->

        </div>
        </div>
<!-- Scroll Top -->
<x-scroll-top/>

@if (url()->current() !== route('web.contact'))
<x-contact-component/>
@endif

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@stack('script')
</body>
</html>
