<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        $this->validate($request, [
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
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('user_id', auth('api')->id())->where('id', $id)->with('category')->first();
        if ($post) {
            return talkToApiResponse($post);
        }
        
        return talkToApiResponse([], 'Data Not Found!', 404, false);
    }
    
    /**
     * update
     *
     * @param  Illuminate\Http\Request $request
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
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

        $post = Post::where('user_id', auth('api')->id())->where('id', $id)->first();

        if ($post) {

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

        return talkToApiResponse([], 'Data Not Found!', 404, false);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('user_id', auth('api')->id())->where('id', $id)->first();
        
        if($post) {
            // delete old image if exist
            $imageDeletePath = Str::replaceFirst(Storage::url(''), '', $post->image);
            Storage::delete($imageDeletePath);
            $post->delete();
            return talkToApiResponse([], "Data Deleted Successfully!", 202);
        }

        return talkToApiResponse([], 'Data Not Found!', 404, false);
    }
}