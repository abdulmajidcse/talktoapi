<div class="col-md-3 bg-light" id="sideBar">
    <div class="text-center mt-5">
     <a href="{{ route('web.home') }}"><img src="{{ asset('assets/static-uploads/talk-to-api.png') }}" alt="{{ config('app.name') }}"></a>
    </div>
    <hr>
     <a class="btn btn-link text-left w-100" href="{{ route('web.home') }}">
         Getting Started
     </a>
     <a class="btn btn-link text-left w-100" href="{{ route('web.todos') }}">
        To Do Api
    </a>
    <a class="btn btn-link text-left w-100" href="{{ route('web.authentication') }}">
        Authentication
    </a>
    <a class="btn btn-link text-left w-100" href="{{ route('web.blog') }}">
        Blog
    </a>
 </div> <!-- col-3 -->
