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
                        <tr id="GET">
                          <th scope="row">1</th>
                          <td>
                            <p>URI: <code>http://127.0.0.1:8000/api/todos</code></p>
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
                          </td>
                          <td class="text-center"><span class="badge bg-success">GET</span></td>
                          <td>Get all Todo list which you have created.</td>
                        </tr>
                        <tr id="POST">
                          <th scope="row">2</th>
                          <td>
                            <p>URI: <code>http://127.0.0.1:8000/api/todos</code></p>
                            <span class="badge bg-primary" style="border-radius: 0"">Example of JS Fetch:</span>

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
                          </td>
                          <td class="text-center"><span class="badge bg-success">POST</span></td>
                          <td>Create a Todo list</td>
                        </tr>
                        <tr id="FETCH">
                          <th scope="row">3</th>
                          <td>
                            <p>URI: <code>http://127.0.0.1:8000/api/todos/{id}</code></p>
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
                          </td>
                          <td class="text-center"><span class="badge bg-success">GET</span></td>
                          <td>Get a Todo List</td>
                        </tr>
                        <tr id="PUT">
                          <th scope="row">4</th>
                          <td>
                            <p>URI: <code>http://127.0.0.1:8000/api/todos/{id}</code></p>
                            <span class="badge bg-primary" style="border-radius: 0">Example of JS Fetch:</span>

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
                          </td>
                          <td class="text-center"><span class="badge bg-success">PUT</span></td>
                          <td>Update a Todo List</td>
                        </tr>
                        <tr id="DELETE">
                          <th scope="row">5</th>
                          <td>
                            <p>URI: <code>http://127.0.0.1:8000/api/todos/{id}</code></p>
                            <span class="badge bg-primary" style="border-radius: 0">Example of JS Fetch:</span>

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
                          </td>
                          <td class="text-center"><span class="badge bg-success">DELETE</span></td>
                          <td>Delete a Todo List</td>
                        </tr>
                      </tbody>
                  </table>
                </div>
            </div>
          </section>
    </div>
@stop
