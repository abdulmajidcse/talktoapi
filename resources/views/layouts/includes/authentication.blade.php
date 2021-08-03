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