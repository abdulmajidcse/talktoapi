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

  @include('layouts.includes.todo')
@endsection