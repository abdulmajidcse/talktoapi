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
                <h6><a href="#MyProfile">My Profile</a></h6>
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
                    <p>In this API we are going to see <b>Authentication</b>. To access authenticated API first, you have to create an account. After creating an account then you have to login. The login method returns an access token which you will use whenever send a request for authenticating API. You have to send this access token by query parameter.</p>
                    <x-reactjs-example />
                </div>
                <h4>API Request:</h4>
                <hr>
                <!-- Header -->
                <x-docs.header/>
                <!-- / Header -->

                <!-- Register -->
                <x-docs.section id="Register">
                    <x-slot name="number">1</x-slot>
                    <x-slot name="url">{{ talktoapiUrl('register') }}</x-slot>
                    <x-slot name="request">
var formdata = new FormData();
formdata.append("name", "AR Shahin");
formdata.append("email", "shahin@mail.com");
formdata.append("password", "12345678");
formdata.append("password_confirmation", "12345678");
<x-api-request-example apiUrl="{{ talktoapiUrl('register') }}" method="post" formDataIs="true" />
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

<hr>
                      <!-- Login -->
                      <x-docs.section id="Login">
                        <x-slot name="number">2</x-slot>
                        <x-slot name="url">{{ talktoapiUrl('login')  }}</x-slot>
                        {{-- <x-slot name="title">title</x-slot> --}}
                        <x-slot name="request">
var formdata = new FormData();
formdata.append("email", "ars@mail.com");
formdata.append("password", "12345678");
<x-api-request-example apiUrl="{{ talktoapiUrl('login') }}" method="post" formDataIs="true" />
                        </x-slot>
                        <x-slot name="method">POST</x-slot>
                        <x-slot name="response">
    {
        "success": true,
        "message": "Access Token generated successfully!",
        "data": {
            "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYzMDMwMjI5MSwiZXhwIjoxNjMwMzA1ODkxLCJuYmYiOjE2MzAzMDIyOTEsImp0aSI6IlU5MUtnYmpPOFh1VWd4VWkiLCJzdWIiOjMsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.D0RkG64WfpOPJxq1FqypMVNeB1SR6ceVz7bZ69kxCl8",
            "token_type": "bearer",
            "expires_in": 3600
        }
    }
                        </x-slot>
                    </x-docs.section>
                    <hr>
                     <!-- MyProfile -->
                     <x-docs.section id="MyProfile">
                        <x-slot name="number">3</x-slot>
                        <x-slot name="url">{{ talktoapiUrl('user?token={access_token}') }}</x-slot>
                        <x-slot name="request">
<x-api-request-example apiUrl="{{ talktoapiUrl('user?token={access_token}') }}" method="get"/>
                        </x-slot>
                        <x-slot name="method">GET</x-slot>
                        <x-slot name="response">
{
    "success": true,
    "message": "Data Retrieved Successfully!",
    "data": {
        "id": 3,
        "name": "AR Shahin",
        "email": "ars@mail.com",
        "created_at": "2021-08-30 05:08:33 AM",
        "updated_at": "2021-08-30 05:08:33 AM"
    }
}
                        </x-slot>
                    </x-docs.section>

<hr>
                    <!-- Logout -->
                    <x-docs.section id="Logout">
                        <x-slot name="number">4</x-slot>
                        <x-slot name="url">{{ talktoapiUrl('logout?token={access_token}')}}</x-slot>
                        <x-slot name="request">
<x-api-request-example apiUrl="{{ talktoapiUrl('logout?token={access_token}') }}" method="post" formDataIs="true" />
                        </x-slot>
                        <x-slot name="method">POST</x-slot>
                        <x-slot name="response">
{
    "success": true,
    "message": "Successfully logged out!",
    "data": []
}
                        </x-slot>
                    </x-docs.section>
            </div>
        </section>
    </div>
@stop
