<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => ['required', 'integer',
                                function ($attribute, $value, $fail) {
                                    $category = Category::where('user_id', auth('api')->id())->where('id', $value)->first();
                                    if (! $category) {
                                        $fail('The category not found.');
                                    }
                                },
                            ],
            'title'       => 'required|string',
            'image'       => 'nullable|image|mimes:png,jpg,jpeg|max:4000',
            'content'     => 'required|string',
        ], [], [
            'category_id' => 'category',
        ]);

        if ($validator->fails()) {
            return talkToApiResponse($validator->getMessageBag(), '', 422, false);
        }

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
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => ['required', 'integer',
                                function ($attribute, $value, $fail) {
                                    $category = Category::where('user_id', auth('api')->id())->where('id', $value)->first();
                                    if (! $category) {
                                        $fail('The category not found.');
                                    }
                                },
                            ],
            'title'       => 'required|string',
            'image'       => 'nullable|image|mimes:png,jpg,jpeg|max:4000',
            'content'     => 'required|string',
        ], [], [
            'category_id' => 'category',
        ]);

        if ($validator->fails()) {
            return talkToApiResponse($validator->getMessageBag(), '', 422, false);
        }

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