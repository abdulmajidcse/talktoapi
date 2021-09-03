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
                    <li><a href="#getCategory">GET <small>(Fetch single Category)</small></a></li>
                    <li><a href="#putCategory">PUT <small>(Update a Category)</small></a></li>
                    <li><a href="#deleteCategory">DELETE <small>(Delete a Category)</small></a></li>
                </ul>
            </li>
            <li>
                <h6><a href="#postIntroduction">Post(Blog)</a></h6>
                <ul>
                    <li><a href="#getPosts">GET <small>(Fetch all Post)</small></a></li>
                    <li><a href="#postCreate">POST <small>(Create a Post)</small></a></li>
                    <li><a href="#getPost">GET <small>(Fetch single Post)</small></a></li>
                    <li><a href="#putPost">PUT <small>(Update a Post)</small></a></li>
                    <li><a href="#deletePost">DELETE <small>(Delete a Post)</small></a></li>
                </ul>
            </li>
        </ul>
        <hr>
        <!-- Category -->
        @includeIf('includes.blog.category')

        <!-- Blog -->
        @includeIf('includes.blog.post')
    </div>
@stop
