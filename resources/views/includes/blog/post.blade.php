<section id="blog">
    <div class="container">
       <div id="postIntroduction">
        <h5 class="text-info">Post API</h5>
        <p>In this API we are going to see <b>Blog</b>. To access Blog API first, you have to login your account. If you don't have account,create an <a href="{{ route('web.authentication') }}">account</a>. In this blog api you can create post as well create post accorting to post. Before creating post you have to create couple of <a href="#introduction">category</a>.</p>
       </div>

       <h4>API Request:</h4>
       <hr>
       <!-- Header -->
       <x-docs.header/>
       <!-- / Header -->
       <!-- get all post -->
        <x-docs.section id="getPosts">
            <x-slot name="number">1</x-slot>
            <x-slot name="url">{{ url('/api/posts?token={access_token}') }}</x-slot>
            {{-- <x-slot name="title">title</x-slot> --}}
            <x-slot name="request">
var requestOptions = {
    method: 'GET',
    redirect: 'follow'
    };

fetch("{{ url('/api/Posts?token={access_token}') }}", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
            </x-slot>
            <x-slot name="method">GET</x-slot>
            <x-slot name="response">
{
    "success": true,
    "message": "Data Retrieved Successfully!",
    "data": [
        {
            "id": 1,
            "title": "This is a demo post",
            "image": null,
            "content": "Welcome to 'TalkToAPI'. It's a free app and open source where you can test api with your local development project. And also get real life API project experience",
            "created_at": "2021-09-03 04:09:44 AM",
            "updated_at": "2021-09-03 04:09:44 AM",
            "category": {
                "id": 2,
                "name": "Lumen",
                "created_at": "2021-09-03 04:09:24 AM",
                "updated_at": "2021-09-03 04:09:24 AM"
            }
        }
    ]
}
            </x-slot>
        </x-docs.section>

<hr>
     <!-- post a post -->
     <x-docs.section id="postCreate">
        <x-slot name="number">2</x-slot>
        <x-slot name="url">{{ url('/api/Posts?token={access_token}') }}</x-slot>
        {{-- <x-slot name="title">title</x-slot> --}}
        <x-slot name="request">
var formdata = new FormData();
formdata.append("category_id", "2");
formdata.append("title", "This is a demo post");
formdata.append("content", "Welcome to 'TalkToAPI'. It's a free app and open source where you can test api with your local development project. And also get real life API project experience");
// image field are optional. You can get image from user form or skip image field.
formdata.append("image", fileInput.files[0], "/C:/Users/php/Pictures/color-testimage.png");

var requestOptions = {
method: 'POST',
body: formdata,
redirect: 'follow'
};

fetch("{{ url('/api/posts?token={access_token}') }}", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
        </x-slot>
        <x-slot name="method">POST</x-slot>
        <x-slot name="response">
{
    "success": true,
    "message": "Data Saved Successfully!",
    "data": {
        "title": "This is a demo post",
        "content": "Welcome to 'TalkToAPI'. It's a free app and open source where you can test api with your local development project. And also get real life API project experience",
        "updated_at": "2021-09-03 04:09:44 AM",
        "created_at": "2021-09-03 04:09:44 AM",
        "id": 1
    }
}
        </x-slot>
    </x-docs.section>

<hr>

     <!-- get a post -->
     <x-docs.section id="getpost">
        <x-slot name="number">3</x-slot>
        <x-slot name="url">{{ url('/api/posts/{id}?token={access_token}') }}</x-slot>
        {{-- <x-slot name="title">title</x-slot> --}}
        <x-slot name="request">
var requestOptions = {
    method: 'GET',
    redirect: 'follow'
    };

fetch("{{ url('/api/posts/{id}?token={access_token}') }}", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
        </x-slot>
        <x-slot name="method">GET</x-slot>
        <x-slot name="response">
{
    "success": true,
    "message": "Data Retrieved Successfully!",
    "data": {
        "id": 1,
        "title": "This is a demo post",
        "image": null,
        "content": "Welcome to 'TalkToAPI'. It's a free app and open source where you can test api with your local development project. And also get real life API project experience",
        "created_at": "2021-09-03 04:09:44 AM",
        "updated_at": "2021-09-03 04:09:44 AM"
    }
}
        </x-slot>
    </x-docs.section>
<hr>

  <!-- update a post -->
  <x-docs.section id="putpost">
    <x-slot name="number">4</x-slot>
    <x-slot name="url">{{ url('/api/posts?token={access_token}') }}</x-slot>
    {{-- <x-slot name="title">title</x-slot> --}}
    <x-slot name="request">
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


fetch("{{ url('/api/Posts?token={access_token}') }}", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
    </x-slot>
    <x-slot name="method">PUT</x-slot>
    <x-slot name="response">
{
    "success": true,
    "message": "Data Saved Successfully!",
    "data": {
        "title": "This is a demo post update",
        "content": "Welcome to 'TalkToAPI'. It's a free app and open source where you can test api with your local development project. And also get real life API project experience",
        "updated_at": "2021-09-03 04:09:44 AM",
        "created_at": "2021-09-03 04:09:44 AM",
        "id": 1
    }
}
    </x-slot>
</x-docs.section>
<hr>
  <!-- detete a post -->
  <x-docs.section id="deletePost">
    <x-slot name="number">5</x-slot>
    <x-slot name="url">{{ url('/api/posts/{id}?token={access_token}') }}</x-slot>
    {{-- <x-slot name="title">title</x-slot> --}}
    <x-slot name="request">
        var formdata = new FormData();
formdata.append("_method", "delete");

    var requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow'
    };


fetch("{{ url('/api/posts/{id}?token={access_token}') }}", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
    </x-slot>
    <x-slot name="method">DELETE</x-slot>
    <x-slot name="response">
{
    "success": true,
    "message": "Data Deleted Successfully!",
    "data": []
}
    </x-slot>
</x-docs.section>
<hr>
    </div> <!-- container -->
    </div>
</section>
