@extends('layout.app')
@section('title' ,'To Do')
@section('app_content')
    <div class="To Do">
        <h1>#ToDo API</h1>
        <ul>
            <li>
                <h6><a href="#introduction">Introduction</a></h6>
            </li>
            <li>
                <h6><a href="#howToUse">API Request</a></h6>
                <ul>
                    <li>
                        <h6><a href="#GET">GET <span class="small">(Fetch all Todos)</span></a></h6>
                    </li>
                    <li>
                        <h6><a href="#POST">POST <span class="small">(Store a Todo)</span></a></h6>
                    </li>
                    <li>
                        <h6><a href="#FETCH">GET <span class="small">(Fetch a Todo)</span></a></h6>
                    </li>
                    <li>
                        <h6><a href="#PUT">PUT/PATCH <span class="small">(Update a Todo)</span></a></h6>
                    </li>
                    <li>
                        <h6><a href="#DELETE">DELETE <span class="small">(Delete a Todo)</span></a></h6>
                    </li>
                    <li>
                        <h6><a href="#PAGINATION">Pagination <span class="small">(Fetch all Todos with Paginaitons)</span></a></h6>
                    </li>
                    <li>
                        <h6><a href="#SEARCH">Search <span class="small">(Search Todo by Name))</span></a></h6>
                    </li>
                </ul>

            </li>

        </ul>
        <hr>

        <section id="todo">
            <div class="container">
                <div id="introduction">
                    <h5 class="text-info">Todo List</h5>
                    <p>This is an example API of ToDo list without authentications. Using this API you can do full <b>CRUD</b> operations as well <b>paginations</b> and <b>searching</b>.</p>
                </div>
                <h4>API Request:</h4>
                <hr>
                <!-- Header -->
               <x-docs.header/>
                <!-- / Header -->

                <!-- get row -->
                <div class="row " id="GET">
                    <div class="col-md-1 col-12 border_right">
                        <b>1</b>
                    </div>
                    <div class="col-12 col-md-6 border_right">
                        <p>URI: <code>{{ url('/api/todos') }}</code></p>
                        <span class="badge bg-primary" style="border-radius: 0">Example of JS Fetch:</span>
        <pre class="bg-dark text-light p-2">
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("http://127.0.0.1:8000/api/todos", requestOptions)
            .then(response =&gt; response.text())
            .then(result =&gt; console.log(result))
            .catch(error =&gt; console.log('error', error));
        </pre>
                    </div>
                    <div class="col-md-1 col-12 text-center border_right">
                        <span class="badge bg-success">GET</span>
                    </div>
                    <div class="col-md-4 col-12">
                        <pre>
{
    "success": true,
    "message": "Data Retrieved Successfully!",
    "data": [
        {
            "id": 7,
            "title": "Talk to api 2",
            "note": "Talk to api 2",
            "comment": "Talk to api 2",
            "created_at": "2021-08-30 04:08:21 AM",
            "updated_at": "2021-08-30 04:08:21 AM"
        },
        {
            "id": 6,
            "title": "Talk to api",
            "note": "Talk to api",
            "comment": "Talk to api",
            "created_at": "2021-08-30 04:08:40 AM",
            "updated_at": "2021-08-30 04:08:40 AM"
        }
    ]
}
                        </pre>
                    </div>
                </div>
<hr>
                <!-- post Row  -->
                <div class="row " id="POST">
                    <div class="col-md-1 col-12 border_right">
                        <b>2</b>
                    </div>
                    <div class="col-12 col-md-6 border_right">
                        <p>URI: <code>{{ url('http://127.0.0.1:8000/api/todos') }}</code></p>
                        <span class="badge bg-primary" style="border-radius: 0">Example of JS Fetch:</span>
                        <pre class="bg-dark text-light p-2 ">var formdata = new FormData();
    formdata.append("title", "This is a note.");
    formdata.append("note", "Today note details");
    formdata.append("comment", "not required.");

    var requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow'
    };

    fetch("http://127.0.0.1:8000/api/todos", requestOptions)
    .then(response =&gt; response.text())
    .then(result =&gt; console.log(result))
    .catch(error =&gt; console.log('error', error));
                            </pre>
                    </div>
                    <div class="col-md-1 col-12 text-center border_right">
                        <span class="badge bg-success">POST</span>
                    </div>
                    <div class="col-md-4 col-12">
                        <pre>
{
    "success": true,
    "message": "Data Saved Successfully!",
    "data": {
        "title": "Talk to api",
        "note": "Talk to api",
        "comment": "Talk to api",
        "updated_at": "2021-08-28 02:08:44 PM",
        "created_at": "2021-08-28 02:08:44 PM",
        "id": 5
    }
}
                        </pre>
                    </div>
                </div>
<hr>
                  <!-- FETCH Row  -->
                  <div class="row " id="FETCH">
                    <div class="col-md-1 col-12 border_right">
                        <b>3</b>
                    </div>
                    <div class="col-12 col-md-6 border_right">
                        <p>URI: <code>{{ url('http://127.0.0.1:8000/api/todos/{id}') }}</code></p>
                        <span class="badge bg-primary" style="border-radius: 0">Example of JS Fetch:</span>
                        <pre class="bg-dark text-light p-2 ">var requestOptions = {
        method: 'GET',
        redirect: 'follow'
        };

        fetch("http://127.0.0.1:8000/api/todos/3", requestOptions)
        .then(response =&gt; response.text())
        .then(result =&gt; console.log(result))
        .catch(error =&gt; console.log('error', error));
        </pre>
                    </div>
                    <div class="col-md-1 col-12 text-center border_right">
                        <span class="badge bg-success">GET</span>
                    </div>
                    <div class="col-md-4 col-12">
                        <pre>
{
    "success": true,
    "message": "Data Retrieved Successfully!",
    "data": {
        "id": 4,
        "title": "talk to api",
        "note": "talk to api",
        "comment": "talk to api",
        "created_at": "2021-08-09 08:08:12 PM",
        "updated_at": "2021-08-09 08:08:45 PM"
    }
}
                        </pre>
                    </div>
                </div>
                <hr>
                  <!-- PUT Row  -->
                  <div class="row " id="PUT">
                    <div class="col-md-1 col-12 border_right">
                        <b>4</b>
                    </div>
                    <div class="col-12 col-md-6 border_right">
                        <p>URI: <code>{{ url('http://127.0.0.1:8000/api/todos/{id}') }}</code></p>
                        <span class="badge bg-primary" style="border-radius: 0">Example of JS Update:</span>
                        <pre class="bg-dark text-light p-2 ">var formdata = new FormData();
    formdata.append("title", "This is a note update.");
    formdata.append("note", "Today note details");
    formdata.append("comment", "not required.");
    formdata.append("_method", "put");

    var requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow'
    };

    fetch("http://127.0.0.1:8000/api/todos/3", requestOptions)
    .then(response =&gt; response.text())
    .then(result =&gt; console.log(result))
    .catch(error =&gt; console.log('error', error));
    </pre>
                    </div>
                    <div class="col-md-1 col-12 text-center border_right">
                        <span class="badge bg-success">PUT</span>
                    </div>
                    <div class="col-md-4 col-12">
                        <pre>
{
    "success": true,
    "message": "Data Updated Successfully!",
    "data": {
        "id": 4,
        "title": "Talk to api",
        "note": "Talk to api",
        "comment": "Talk to api",
        "created_at": "2021-08-09 08:08:12 PM",
        "updated_at": "2021-08-28 02:08:01 PM"
    }
}
                        </pre>
                    </div>
                </div>

                <hr>
                <!-- DELETE Row  -->
                <div class="row " id="DELETE">
                  <div class="col-md-1 col-12 border_right">
                      <b>5</b>
                  </div>
                  <div class="col-12 col-md-6 border_right">
                      <p>URI: <code>{{ url('http://127.0.0.1:8000/api/todos/{id}') }}</code></p>
                      <span class="badge bg-primary" style="border-radius: 0">Example of JS Delete:</span>
                      <pre class="bg-dark text-light p-2 ">var formdata = new FormData();
    formdata.append("_method", "delete");

    var requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow'
    };

    fetch("http://127.0.0.1:8000/api/todos/3", requestOptions)
    .then(response =&gt; response.text())
    .then(result =&gt; console.log(result))
    .catch(error =&gt; console.log('error', error));
    </pre>
                  </div>
                  <div class="col-md-1 col-12 text-center border_right">
                      <span class="badge bg-success">DELETE</span>
                  </div>
                  <div class="col-md-4 col-12">
                      <pre>
{
    "success": true,
    "message": "Data Deleted Successfully!",
    "data": []
}
                      </pre>
                  </div>
              </div>

              <!-- Pagination -->
<hr>
              <div class="row" id="PAGINATION">
                  <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        Pagination API is Coming Soon!!
                      </div>
                  </div>
              </div>

                         <!-- Pagination -->
<hr>
<div class="row" id="SEARCH">
    <div class="col-12">
      <div class="alert alert-warning" role="alert">
        Search API is Coming Soon!!
        </div>
    </div>
</div>
            </div>
          </section>
    </div>
@stop
