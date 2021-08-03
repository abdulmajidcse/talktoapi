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