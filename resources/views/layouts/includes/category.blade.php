<!-- todo -->
<section id="category" class="border-top border-primary">
    <div class="container" style="padding-top: 55px;">
        <h3>Blog Category</h3>
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