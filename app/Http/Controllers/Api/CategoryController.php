<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{    
    /**
     * index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('user_id', auth('api')->id())->with('posts')->latest('id')->get();
        return talkToApiResponse($categories);
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
            'name' => 'required|string|unique:categories,name',
        ]);
        
        $category = Category::create([
            'user_id' => auth('api')->id(),
            'name'    => $request->input('name'),
        ]);

        return talkToApiResponse($category, 'Data Saved Successfully!', 201);
    }
    
    /**
     * show
     *
     * @param  mixed Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if ($category->user_id == auth('api')->id()) {
            return talkToApiResponse($category->with('posts'));
        }

        return abort(404);
    }
    
    /**
     * update
     *
     * @param  Illuminate\Http\Request $request
     * @param  mixed Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:categories,name,'.$category->id,
        ]);
        
        if($category->user_id == auth('api')->id()) {
            $category->update([
                'name' => $request->input('name'),
            ]);

            return talkToApiResponse($category, 'Data Updated Successfully!', 202);
        }

        return abort(404);
    }
    
    /**
     * destroy
     *
     * @param  mixed Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {   
        if($category->user_id == auth('api')->id()) {
            $category->delete();
            return talkToApiResponse([], "Data Deleted Successfully!", 202);
        }

        return abort(404);
    }
}