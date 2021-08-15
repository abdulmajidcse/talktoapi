@extends('layout.app')
@section('title' ,'Home')
@section('app_content')
    <div class="Home">
        <ul>
            <li>
                <h6><a href="#introduction">Introduction</a></h6>
            </li>
            <li>
                <h6><a href="#howToUse">How to use?</a></h6>
            </li>
            <li>
                <h6><a href="#versionAndDevelopers">Version and Developers</a></h6>
            </li>
        </ul>
        <hr>
        @includeIf('includes.introduction')
        @includeIf('includes.howToUse')
        @includeIf('includes.versionAndDevelopers')
    </div>
@stop
