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