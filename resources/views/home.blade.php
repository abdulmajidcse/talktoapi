<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .text-justify {
            text-align: justify;
        }
    </style>
    <title>Home - {{ env('APP_NAME') }}</title>
  </head>
  <body>

    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#home">{{ env('APP_NAME') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#todo">Todo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#authentication">Authentication</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#category">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#post">Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded bg-primary text-light" href="https://github.com/abdulmajidcse/talktoapi" target="_blank">Github</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>

  <!-- home -->
  <section id="home">
      <div class="container" style="padding-top: 55px;">
          <h3>Hello Developers!</h3>
          <p class="text-justify">{{ env('APP_NAME') }} is a Restfull API Application. It provide you real life API experience. If you are a Frontend Developer, welcome to here. You can create SPA Application (ReactJS, VueJS, AngularJS, SvelteJS App etc) using {{ env('APP_NAME') }} service. You can see the documentation below.</p>
          <p class="alert alert-primary text-justify">It's an open source application. You can see the application code on <a href="https://github.com/abdulmajidcse/talktoapi" class="badge bg-danger text-light text-decoration-none" target="_blank">Github</a> and also you can contribute, if you want! If you get any errors or issues, please send me a <a href="https://m.me/abdulmajidcse" class="badge bg-danger text-light text-decoration-none" target="_blank">message</a>.</p>
          <p class="text-justify">So, let's go to see how to use the Application.</p>
      </div>
  </section>

  <!-- todo -->
<section id="todo" class="border-top border-primary">
  <div class="container" style="padding-top: 55px;">
      <h3>Todo List</h3>
      <p>Here is an example of Todo List. Without Authentication, you can complete a crud operation.</p>
      <h4>API Request:</h4>
      <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Details</th>
                <th scope="col">Method</th>
                <th scope="col">Response</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>
                  <p>URI: {{ url('todos') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var requestOptions = {
method: 'GET',
redirect: 'follow'
};

fetch("{{ url('todos') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>GET</td>
                <td>Get Todo List</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>
                  <p>URI: {{ url('todos') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("title", "This is a note.");
formdata.append("note", "Today note details");
formdata.append("comment", "not required.");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('todos') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>POST</td>
                <td>Create a Todo</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>
                  <p>URI: {{ url('todos') . '/{id}' }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var requestOptions = {
method: 'GET',
redirect: 'follow'
};

fetch("{{ url('todos/3') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>GET</td>
                <td>Get a Todo</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>
                  <p>URI: {{ url('todos') . '/{id}' }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("title", "This is a note update.");
formdata.append("note", "Today note details");
formdata.append("comment", "not required.");
formdata.append("_method", "put");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('todos/3') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>PUT</td>
                <td>Update a Todo</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>
                  <p>URI: {{ url('todos') . '/{id}' }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("_method", "delete");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('todos/3') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>DELETE</td>
                <td>Delete a Todo</td>
              </tr>
            </tbody>
        </table>
      </div>
  </div>
</section>

<!-- todo -->
<section id="authentication" class="border-top border-primary">
  <div class="container" style="padding-top: 55px;">
      <h3>Authentication</h3>
      <p>For Authentication you have to create an account, then you can login. You can't access Category and Post without authentication.</p>
      <h4>API Request:</h4>
      <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Details</th>
                <th scope="col">Method</th>
                <th scope="col">Response</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>
                  <p>URI: {{ url('register') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("name", "Abdul Majid");
formdata.append("email", "test@gmail.com");
formdata.append("password", "12345678");
formdata.append("password_confirmation", "12345678");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('register') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>POST</td>
                <td>Create an account</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>
                  <p>URI: {{ url('login') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("email", "test@gmail.com");
formdata.append("password", "12345678");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('login') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>POST</td>
                <td>Login your account and you can get an access_token. You have to use this access_token for authenticate Request.</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>
                  <p>URI: {{ url('user?token={access_token}') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var requestOptions = {
method: 'GET',
redirect: 'follow'
};

fetch("{{ url('user?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>GET</td>
                <td>Get authenticate user information.</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>
                  <p>URI: {{ url('logout?token={access_token}') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var requestOptions = {
method: 'POST',
redirect: 'follow'
};

fetch("{{ url('logout?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>POST</td>
                <td>Logout</td>
              </tr>
            </tbody>
        </table>
      </div>
  </div>
</section>

<!-- todo -->
<section id="category" class="border-top border-primary">
  <div class="container" style="padding-top: 55px;">
      <h3>Blog Category</h3>
      <p>You can access Blog Category API after login.</p>
      <h4>API Request:</h4>
      <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Details</th>
                <th scope="col">Method</th>
                <th scope="col">Response</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>
                  <p>URI: {{ url('categories?token={access_token}') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var requestOptions = {
method: 'GET',
redirect: 'follow'
};

fetch("{{ url('categories?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>GET</td>
                <td>Get Category List</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>
                  <p>URI: {{ url('categories?token={access_token}') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("name", "Laravel");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('categories?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>POST</td>
                <td>Create a Category</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>
                  <p>URI: {{ url('categories/{id}?token={access_token}') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var requestOptions = {
method: 'GET',
redirect: 'follow'
};

fetch("{{ url('categories/1?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>GET</td>
                <td>Get a Category</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>
                  <p>URI: {{ url('categories/{id}?token={access_token}') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("name", "Lumen Update");
formdata.append("_method", "put");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('categories/1?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>PUT</td>
                <td>Update a Category</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>
                  <p>URI: {{ url('categories/{id}?token={access_token}') }}</p>
                  <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("_method", "delete");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('categories/1?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
                </td>
                <td>DELETE</td>
                <td>Delete a Category</td>
              </tr>
            </tbody>
        </table>
      </div>
  </div>
</section>

<!-- todo -->
<section id="post" class="border-top border-primary">
  <div class="container" style="padding-top: 55px;">
      <h3>Blog Post</h3>
      <p>You can create a demo blog site using this API. But you must be login before access Blog Post.</p>
      <h4>API Request:</h4>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Details</th>
              <th scope="col">Method</th>
              <th scope="col">Response</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>
                <p>URI: {{ url('posts?token={access_token}') }}</p>
                <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var requestOptions = {
method: 'GET',
redirect: 'follow'
};

fetch("{{ url('posts?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
              </td>
              <td>GET</td>
              <td>Get Post List</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>
                <p>URI: {{ url('posts?token={access_token}') }}</p>
                <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("category_id", "3");
formdata.append("title", "This is a post title");
formdata.append("content", "This is post content.");
// image field are optional. You can get image from user form or skip image field.
formdata.append("image", fileInput.files[0], "/C:/Users/php/Pictures/color-testimage.png");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('posts?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
              </td>
              <td>POST</td>
              <td>Create a Post</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>
                <p>URI: {{ url('posts/{id}?token={access_token}') }}</p>
                <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var requestOptions = {
method: 'GET',
redirect: 'follow'
};

fetch("{{ url('posts/1?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
              </td>
              <td>GET</td>
              <td>Get a Post</td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>
                <p>URI: {{ url('posts/{id}?token={access_token}') }}</p>
                <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("category_id", "3");
formdata.append("title", "This is a post title Update.");
formdata.append("content", "This is post content Update.");
// image field are optional. You can get image from user form or skip image field.
formdata.append("image", fileInput.files[0], "/C:/Users/php/Pictures/color-update.png");
formdata.append("_method", "put");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('posts/1?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
              </td>
              <td>PUT</td>
              <td>Update a Post</td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>
                <p>URI: {{ url('posts/{id}?token={access_token}') }}</p>
                <span class="btn btn-sm btn-danger disabled">Example of JS Fetch:</span>

<pre class="bg-dark text-light p-2 rounded">
var formdata = new FormData();
formdata.append("_method", "delete");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('posts/1?token={access_token}') }}", requestOptions)
.then(response => response.text())
.then(result => console.log(result))
.catch(error => console.log('error', error));
</pre>
              </td>
              <td>DELETE</td>
              <td>Delete a Post</td>
            </tr>
          </tbody>
      </table>
      </div>
  </div>
</section>

  <footer class="bg-light text-center p-3">
    <p>{{ date('Y') }} &copy; Developed By <a href="https://facebook.com/abdulmajidcse" target="_blank">Abdul Majid</a></p>
  </footer>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>