<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{    
    /**
     * index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth('api')->id())->with('category')->latest('id')->get();
        return talkToApiResponse($posts);
    }
    
    /**
     * store
     * 
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();

        // image is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // get file extension
            $extension = $file->extension();

            // set file name and upload
            $fileName     = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME), '_') . '_'  . Str::random(10) . '.' . $extension;
            $uploadedPath = Storage::putFileAs(date('Y/m/d') . '/post', $file, $fileName);
            $post->image = $uploadedPath;
        }

        $post->user_id     = auth('api')->id();
        $post->category_id = $request->input('category_id');
        $post->title       = $request->input('title');
        $post->content     = $request->input('content');
        $post->save();

        return talkToApiResponse($post, 'Data Saved Successfully!', 201);
    }
    
    /**
     * show
     *
     * @param  mixed Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->user_id == auth('api')->id()) {
            return talkToApiResponse($post);
        }
        
        return abort(404);
    }
    
    /**
     * update
     *
     * @param  Illuminate\Http\Request $request
     * @param  mixed Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        if ($post->user_id == auth('api')->id()) {

            // image is uploaded
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                // get file extension
                $extension = $file->extension();

                // set file name and upload
                $fileName     = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME), '_') . '_'  . Str::random(10) . '.' . $extension;
                $uploadedPath = Storage::putFileAs(date('Y/m/d') . '/post', $file, $fileName);

                // delete old image if exist
                $imageDeletePath = Str::replaceFirst(Storage::url(''), '', $post->image);
                Storage::delete($imageDeletePath);

                $post->image = $uploadedPath;
            }

            $post->user_id     = auth('api')->id();
            $post->category_id = $request->input('category_id');
            $post->title       = $request->input('title');
            $post->content     = $request->input('content');
            $post->save();

            return talkToApiResponse($post, 'Data Updated Successfully!', 202);
        }

        return abort(404);
    }
    
    /**
     * destroy
     *
     * @param  mixed Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        if ($post->user_id == auth('api')->id()) {
            // delete old image if exist
            $imageDeletePath = Str::replaceFirst(Storage::url(''), '', $post->image);
            Storage::delete($imageDeletePath);
            $post->delete();
            return talkToApiResponse([], "Data Deleted Successfully!", 202);
        }

        return abort(404);
    }
}