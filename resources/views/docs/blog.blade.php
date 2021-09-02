@extends('layout.app')
@section('title' ,'Blog API')
@section('app_content')
    <div class="Home">

        <h1>#Blog API</h1>
        <ul>
            <li>
                <h6><a href="#introduction">Introduction</a></h6>
            </li>
            <li>
                <h6><a href="#category">Category</a></h6>
                <ul>
                    <li><a href="#getCategories">GET <small>(Fetch all Category)</small></a></li>
                    <li><a href="#postCategory">POST <small>(Create a Category)</small></a></li>
                    <li><a href="">GET <small>(Fetch single Category)</small></a></li>
                    <li><a href="">PUT <small>(Update a Category)</small></a></li>
                    <li><a href="">DELETE <small>(Delete a Category)</small></a></li>
                </ul>
            </li>
            <li>
                <h6><a href="#blogPost">Post(Blog)</a></h6>
            </li>
        </ul>
        <hr>
        <!-- Category -->
        @includeIf('includes.blog.category')
    </div>
@stop
