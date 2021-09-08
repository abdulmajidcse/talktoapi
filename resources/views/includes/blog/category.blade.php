<section id="blog">
    <div class="container">
       <div id="introduction">
            <h5 class="text-info">Category API</h5>
            <p>In this API we are going to see <b>Blog</b>. To access Blog API first, you have to login your account. If you don't have account,create an <a href="{{ route('web.authentication') }}">account</a>. In this blog api you can create category as well create post accorting to category.</p>
            <x-reactjs-example />
        </div>

       <h4>API Request:</h4>
       <hr>
       <!-- Header -->
       <x-docs.header/>
       <!-- / Header -->
       <!-- get all category -->
        <x-docs.section id="getCategories">
            <x-slot name="number">1</x-slot>
            <x-slot name="url">{{ talktoapiUrl('categories?token={access_token}') }}</x-slot>
            <x-slot name="request">
<x-api-request-example apiUrl="{{ talktoapiUrl('categories?token={access_token}') }}" method="get" />
            </x-slot>
            <x-slot name="method">GET</x-slot>
            <x-slot name="response">
{
"success": true,
"message": "Data Retrieved Successfully!",
"data": [
{
    "id": 1,
    "name": "Laravel",
    "created_at": "2021-09-02 01:09:05 PM",
    "updated_at": "2021-09-02 01:09:05 PM",
    "posts": []
}
]
}
            </x-slot>
        </x-docs.section>

<hr>
     <!-- post a category -->
     <x-docs.section id="postCategory">
        <x-slot name="number">2</x-slot>
        <x-slot name="url">{{ talktoapiUrl('categories?token={access_token}') }}</x-slot>
        <x-slot name="request">
var formdata = new FormData();
formdata.append("name", "Laravel");
<x-api-request-example apiUrl="{{ talktoapiUrl('categories?token={access_token}') }}" method="post" formDataIs="true" />
        </x-slot>
        <x-slot name="method">POST</x-slot>
        <x-slot name="response">
{
"success": true,
"message": "Data Saved Successfully!",
"data": {
"name": "Laravel",
"updated_at": "2021-09-02 01:09:05 PM",
"created_at": "2021-09-02 01:09:05 PM",
"id": 1
}
}
        </x-slot>
    </x-docs.section>

<hr>

     <!-- get a category -->
     <x-docs.section id="getCategory">
        <x-slot name="number">3</x-slot>
        <x-slot name="url">{{ talktoapiUrl('categories/{id}?token={access_token}') }}</x-slot>
        <x-slot name="request">
<x-api-request-example apiUrl="{{ talktoapiUrl('categories/{id}?token={access_token}') }}" method="get" />
        </x-slot>
        <x-slot name="method">GET</x-slot>
        <x-slot name="response">
{
    "success": true,
    "message": "Data Retrieved Successfully!",
    "data": {
        "id": 1,
        "name": "Laravel",
        "created_at": "2021-09-02 01:09:05 PM",
        "updated_at": "2021-09-02 01:09:05 PM",
        "posts": []
    }
}
        </x-slot>
    </x-docs.section>
<hr>

  <!-- update a category -->
  <x-docs.section id="putCategory">
    <x-slot name="number">4</x-slot>
    <x-slot name="url">{{ talktoapiUrl('categories/{id}?token={access_token}') }}</x-slot>
    {{-- <x-slot name="title">title</x-slot> --}}
    <x-slot name="request">
var formdata = new FormData();
formdata.append("name", "Lumen Update");
formdata.append("_method", "put");
<x-api-request-example apiUrl="{{ talktoapiUrl('categories/{id}?token={access_token}') }}" method="post" formDataIs="true" />
    </x-slot>
    <x-slot name="method">PUT</x-slot>
    <x-slot name="response">
{
    "success": true,
    "message": "Data Updated Successfully!",
    "data": {
    "name": "Lumen Update",
    "updated_at": "2021-09-02 01:09:05 PM",
    "created_at": "2021-09-02 01:09:05 PM",
    "id": 1
}
}
    </x-slot>
</x-docs.section>
<hr>
  <!-- detete a category -->
  <x-docs.section id="deleteCategory">
    <x-slot name="number">5</x-slot>
    <x-slot name="url">{{ talktoapiUrl('categories/{id}?token={access_token}') }}</x-slot>
    <x-slot name="request">
var formdata = new FormData();
formdata.append("_method", "delete");
<x-api-request-example apiUrl="{{ talktoapiUrl('categories/{id}?token={access_token}') }}" method="post" formDataIs="true" />
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
