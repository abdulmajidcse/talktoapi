@extends('layout.app')
@section('title' ,'Authentication')
@section('app_content')
    <div class="Home">
        <h1>#Authentication</h1>
        <ul>
            <li>
                <h6><a href="#introduction">Introduction</a></h6>
            </li>
            <li>
                <h6><a href="#Register">Register</a></h6>
            </li>
            <li>
                <h6><a href="#Login">Login</a></h6>
            </li>
            <li>
                <h6><a href="#Logout">Logout</a></h6>
            </li>
        </ul>
        <hr>

        <section id="Auth">
            <div class="container">
                <div id="introduction">
                    <h5 class="text-info">Authentication</h5>
                    <p>In this API we are going to see <b>Authentication</b>. To access authenticated API first, you have to create an account. After creating an account then you have to login. The login method returns a access token which you will use whenever send a request for authenticating API. You have to send this access token by query parameter.</p>
                </div>
                <h4>API Request:</h4>
                <hr>
                <!-- Header -->
                <x-docs.header/>
                <!-- / Header -->

                <!-- Login -->
                <x-docs.section id="Register">
                    <x-slot name="number">1</x-slot>
                    <x-slot name="url">{{ url('/api/register') }}</x-slot>
                    {{-- <x-slot name="title">title</x-slot> --}}
                    <x-slot name="request">
                    var formdata = new FormData();
    formdata.append("name", "AR Shahin");
    formdata.append("email", "shahin@mail.com");
    formdata.append("password", "12345678");
    formdata.append("password_confirmation", "12345678");

    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
        };

        fetch("{{ url('http://127.0.0.1:8000/api/register') }}", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
                    </x-slot>
                    <x-slot name="method">POST</x-slot>
                    <x-slot name="response">
{
    "success": true,
    "message": "Registration successfully!",
    "data": []
}
                    </x-slot>
                </x-docs.section>
            </div>
        </section>
    </div>
@stop
