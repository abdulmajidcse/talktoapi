@extends('layouts.app')

@section('content')
    <!-- home -->
    <section id="home">
        <div class="container mt-3">
            <h3>Hello Developers!</h3>
            <p class="text-justify">{{ env('APP_NAME') }} is a Restfull API Application. It provide you real life API experience. If you are a Frontend Developer, welcome to here. You can create SPA Application (ReactJS, VueJS, AngularJS, SvelteJS App etc) using {{ env('APP_NAME') }} service. You can see the documentation below.</p>
            <p class="text-justify">It's an open source application. You can see the application code on <a href="https://github.com/abdulmajidcse/talktoapi" target="_blank">Github</a> and also you can contribute, if you want!</p>
            <p class="text-justify">So, let's go to see how to use the Application.</p>
        </div>
    </section>

    <!-- todo -->
    <section id="todo" class="border-top border-primary">
        <div class="container mt-3">
            <h3>Todo List</h3>
            <p>First of all, we will create a Todo List.</p>
            <h4>API Request:</h4>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">URI</th>
                    <th scope="col">Method</th>
                    <th scope="col">Response</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>{{ url('todos') }}</td>
                    <td>GET</td>
                    <td>Get Todo List</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>{{ url('todos') }}</td>
                    <td>POST</td>
                    <td>Create a Todo</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>{{ url('todos') . '/{id}' }}</td>
                    <td>GET</td>
                    <td>Get a Todo</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>{{ url('todos') . '/{id}' }}</td>
                    <td>PUT</td>
                    <td>Update a Todo</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>{{ url('todos') . '/{id}' }}</td>
                    <td>DELETE</td>
                    <td>Delete a Todo</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection