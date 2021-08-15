<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* .text-justify {
            text-align: justify;
        } */
        a{
          text-decoration: none
        }
    </style>
      <title>@yield('title') | TalkToApi | Docs</title>
  </head>
  <body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
           @includeIf('includes.sidebar')

            <div class="col-md-9 mt-5 p-3">
              @yield('app_content')
            </div> <!-- col-9 -->
        </div>
        </div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
