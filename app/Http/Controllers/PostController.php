<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $this->data['posts'] = Post::where('user_id', auth()->id())->with('category')->latest('id')->get();
        return response()->json($this->data);
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
                                    $category = Category::where('user_id', auth()->id())->where('id', $value)->first();
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
            $fileName     = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME), '_') . '_'  . time() . '.' . $extension;
            $uploadedPath = Storage::putFileAs('', $file, $fileName);
            $post->image = $uploadedPath;
        }

        $post->user_id     = auth()->id();
        $post->category_id = $request->input('category_id');
        $post->title       = $request->input('title');
        $post->content     = $request->input('content');
        $post->save();

        return response()->json(['success' => 'Post saved.']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['post'] = Post::where('user_id', auth()->id())->where('id', $id)->with('category')->first();
        return response()->json($this->data);
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
                                    $category = Category::where('user_id', auth()->id())->where('id', $value)->first();
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

        $post = Post::where('user_id', auth()->id())->where('id', $id)->first();

        if ($post) {

            // image is uploaded
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                // get file extension
                $extension = $file->extension();

                // set file name and upload
                $fileName     = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME), '_') . '_'  . time() . '.' . $extension;
                $uploadedPath = Storage::putFileAs('', $file, $fileName);

                // delete old image if exist
                $post->image && Storage::delete($post->image);

                $post->image = $uploadedPath;
            }

            $post->user_id     = auth()->id();
            $post->category_id = $request->input('category_id');
            $post->title       = $request->input('title');
            $post->content     = $request->input('content');
            $post->save();

            return response()->json(['success' => 'Post saved.']);
        }

        return response()->json(['error' => 'Post not found.'], 404);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('user_id', auth()->id())->where('id', $id)->first();
        
        if($post) {
            // delete image if exist
            $post->image && Storage::delete($post->image);
            $post->delete();
            return response()->json(['success' => 'Post deleted.']);
        }

        return response()->json(['error' => 'Post not found.'], 404);
    }
}