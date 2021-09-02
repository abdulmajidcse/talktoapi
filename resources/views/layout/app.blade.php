<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    </style>
      <title>@yield('title') | TalkToApi | Docs</title>
  </head>
  <body>

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

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('script')
</body>
</html>
